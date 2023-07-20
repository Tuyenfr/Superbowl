<?php
session_start();
?>

<html>
   
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>New password reset</title>
      <link rel="stylesheet" href="./CSS/style.css" type="text/css">
   </head>

   <body>
   <div class="flux">
      <header>
         <p class="logo"><strong><i>Super</i>Bowl-BET</strong></a></p>
      </header>
   
      <div class="container_connexion">

      <?php

      $password_reset = $_POST['password_reset'];
      $email = $_POST['email'];
      $birth_date = $_POST['birth_date'];
   
      try {

      $pdo = new PDO('mysql:host=localhost;dbname=superbowl','root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         $passwordreset = $pdo->prepare('UPDATE users SET password = :password_reset WHERE email = :email AND birth_date = :birth_date');
         $passwordreset->bindValue(':password_reset', password_hash($password_reset, PASSWORD_BCRYPT));
         $passwordreset->bindValue(':email', $email);
         $passwordreset->bindValue(':birth_date', $birth_date);

      if ($passwordreset->execute()) {

         echo 'Votre nouveau mot de passe a bien été enregistré.'.'<br>';
         echo '<br>';
         echo '<button class="button_connexion"><a class="link_pages" href="connexion.php">Retour à la page de connexion</a></button>';
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

   <footer>
      <p>Jouer comporte des risques</p>
      Mentions légales / © Copyright 2023 - Stania.com / Contact
   </footer>
   
</html>