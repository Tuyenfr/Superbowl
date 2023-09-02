<?php
session_start();
?>

<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>New password</title>
   <link rel="stylesheet" href="../CSS/style.css" type="text/css">
</head>

<body>
   <div class="flux">
      <header>
         <p class="logo"><a class="link_pages" href="home.php"><i>Super</i>Bowl-BET</a></p>
      </header>

      <div class="container_connexion">

         <?php

         $new_password = $_POST['new_password'];

         try {

            if (isset($_SESSION['user'])) {
               $user_id = $_SESSION['user_id'];
            }

            require "../constants/pdo.php";

            $passwordchange = $pdo->prepare('UPDATE users SET password = :new_password WHERE user_id = :user_id');
            $passwordchange->bindValue(':new_password', password_hash($new_password, PASSWORD_BCRYPT));
            $passwordchange->bindValue(':user_id', $user_id);

            if ($passwordchange->execute()) {

               echo 'Votre nouveau mot de passe a bien été enregistré.' . '<br>';
               echo '<br>';
               echo '<button class="button_connexion"><a class="link_pages" href="home.php">Retour à la page d\'accueil</a></button>';
            } else {
               echo 'Impossible d\'enregistrer le nouveau mot de passe';
            }
         } catch (PDOException $e) {
            echo 'Impossible de se connecter à la base de données';
         }

         ?>
      </div>

      <?php require_once "../templates/footer.php"; ?>
