<?php
session_start();
?>

<html>
   
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>New birthdate</title>
      <link rel="stylesheet" href="./CSS/style.css" type="text/css">
   </head>

   <body>
   <div class="flux">
      <header>
         <p class="logo"><a class="link_pages" href="home.php"><i>Super</i>Bowl-BET</a></p>
      </header>
   
      <div class="container_connexion">

      <?php

      $new_birthdate = $_POST['new_birthdate'];

      try {

         if(isset($_SESSION['user'])) {
            $user_id = $_SESSION['user_id'];
         }

      $pdo = new PDO('mysql:host=localhost;dbname=superbowl','root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $birthdatechange = $pdo->prepare('UPDATE users SET birth_date = :new_birthdate WHERE user_id = :user_id');
      $birthdatechange->bindValue(':new_birthdate', $new_birthdate);
      $birthdatechange->bindValue(':user_id', $user_id);

      if ($birthdatechange->execute()) {

         echo 'Votre nouvelle date de naissance a bien été enregistrée.'.'<br>';
         echo '<br>';
         echo '<button class="button_connexion"><a class="link_pages" href="home.php">Retour à la page d\'accueil</a></button>';
      } else {
         echo 'Impossible d\'enregistrer la nouvelle date de naissance';
      }
         }
      catch (PDOException $e) {
         echo 'Impossible de se connecter à la base de données';
      }

      ?>
      </div>

      <?php require_once "./templates/footer.php"; ?>
   
      </div>
   </body>
</html>