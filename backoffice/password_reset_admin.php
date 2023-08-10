<?php
session_start();
?>

<html>
   
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>New password reset</title>
      <link rel="stylesheet" href="../CSS/style.css" type="text/css">
   </head>

   <body>
   <div class="flux">
      <header>
         <h1 class="logo"><a class="link_pages" href="admin.php"><i>Super</i>Bowl-BET</a></h1>
      </header>
   
      <div class="container_connexion">

      <?php

      $password_reset = $_POST['password_reset'];
      $email = $_POST['email'];
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
   
      try {

      $pdo = new PDO('mysql:host=localhost;dbname=superbowl','root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         $passwordreset = $pdo->prepare('UPDATE users SET password = :password_reset WHERE email = :email AND first_name = :first_name AND last_name = :last_name');
         $passwordreset->bindValue(':password_reset', password_hash($password_reset, PASSWORD_BCRYPT));
         $passwordreset->bindValue(':email', $email);
         $passwordreset->bindValue(':first_name', $first_name);
         $passwordreset->bindValue(':last_name', $last_name);

         if ($passwordreset->execute()) {

         echo 'Le nouveau mot de passe de '.$first_name.' '.$last_name.' a bien été enregistré.'.'<br>';
         echo '<br>';
         echo '<button class="button_connexion"><a class="link_pages" href="admin.php">Retour à la page administrateur</a></button>';
      } else {
         echo 'Impossible d\'enregistrer le nouveau mot de passe';
      }
   
         }
      catch (PDOException $e) {
         echo 'Impossible de se connecter à la base de données';
      }

      ?>
      </div>
   </div>
   </body>
</html>