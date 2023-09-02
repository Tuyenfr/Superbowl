<?php
session_start();
?>

<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>New account</title>
   <link rel="stylesheet" href="./CSS/style.css" type="text/css">
</head>

<body>
   <div class="flux">
      <header>
         <p class="logo"><i>Super</i>Bowl-BET</p>
      </header>

      <div class="container_connexion">

         <br>

         <?php

         $first_name = $_POST['first_name'];
         $last_name = $_POST['last_name'];
         $birth_date = $_POST['birth_date'];
         $email = $_POST['email'];
         $password = $_POST['password'];
         $role = 'user';

         $datenow = date('Y');
         $dateuser = substr($birth_date, 0, -6);
         $age = ($datenow - $dateuser);

         if ($age < 18) {
            echo 'Vous n\'êtes pas autorisés à vous enregistrer.';
         } else {

            try {
               
               require "./constants/pdo.php";

               $statement = $pdo->prepare('INSERT INTO users(first_name, last_name, email, birth_date, password, role) VALUES (:first_name, :last_name, :email, :birth_date, :password, :role)');
               $statement->bindValue(':first_name', $first_name);
               $statement->bindValue(':last_name', $last_name);
               $statement->bindValue(':birth_date', $birth_date);
               $statement->bindValue(':email', $email);
               $statement->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
               $statement->bindValue(':role', $role);

               if ($statement->execute()) {
                  echo 'Bonjour ' . $first_name . ' , ' . '<br>';
                  echo '<br>';
                  echo 'Votre compte a bien été créé.' . '<br>';
                  echo '<br>';
                  echo 'Merci de vous être enregistré sur SuperBowl-BET !';
                  echo '<br>';
                  echo '<br>';
                  echo '<br>';
                  echo '<button class="button_connexion"><a class="link_pages" href="connexion.php">Retour à la page de connexion</a></button>';
               } else {
                  echo 'Impossible de créer l\'utilisateur';
               }
            } catch (PDOException $e) {
               echo 'Impossible de se connecter à la base de données';
            }
         }
         ?>
      </div>

      <?php require_once "./templates/footer.php"; ?>
