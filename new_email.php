<?php
session_start();
?>

<html>
   
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>New_email</title>
      <link rel="stylesheet" href="./CSS/style.css" type="text/css">
   </head>

   <body>
   <div class="flux">
      <header>
         <p class="logo"><a class="link_pages" href="home.php"><strong><i>Super</i>Bowl-BET</strong></a></p>
      </header>
   
      <div class="container_connexion">

      <?php

      $new_email = $_POST['new_email'];

      try {

         if(isset($_SESSION['user'])) {
            $user_id = $_SESSION['user_id'];
         }

      $pdo = new PDO('mysql:host=localhost;dbname=superbowl','root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $emailchange = $pdo->prepare('UPDATE users SET email = :new_email WHERE user_id = :user_id');
      $emailchange->bindValue(':new_email', $new_email);
      $emailchange->bindValue(':user_id', $user_id);

      if ($emailchange->execute()) {

         echo 'Votre nouvelle adresse email a bien été enregistrée.'.'<br>';
         echo '<br>';
         echo '<button class="button_connexion"><a class="link_pages" href="home.php">Retour à la page d\'accueil</a></button>';
      } else {
         echo 'Impossible d\'enregistrer le nouvel email';
      }
         }
      catch (PDOException $e) {
         echo 'Impossible de se connecter à la base de données';
      }

      ?>
      </div>

      <footer>
      <p>Jouer comporte des risques</p>
      Mentions légales / © Copyright 2023 - Stania.com / Contact
      </footer>

      </div>
   </body>
</html>