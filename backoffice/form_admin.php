<?php
session_start();
?>

<html>
   
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>New account</title>
      <link rel="stylesheet" href="../CSS/style.css" type="text/css">
   </head>

   <body>
   <div class="flux">
      <header>
         <h1 class="logo"><a class="link_pages" href="admin.php"><i>Super</i>Bowl-BET</a></h1>
      </header>
   
      <div class="container_connexion">
      
      <br>

      <?php

      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $birth_date = $_POST['birth_date'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $role = $_POST['role'];

      $datenow = date('Y');
      $dateuser = substr($birth_date, 0, -6);
      $age = ($datenow - $dateuser);

      if ($age < 18) {
         echo 'Vous n\'êtes pas autorisés à enregistrer ce nouvel utilisateur.';
         echo '<br>';
         echo '<button class="button_connexion"><a class="link_pages" href="admin.php">Retour à la page administrateur</a></button>';

         } else {
      
      try {
      $pdo = new PDO('mysql:host=localhost;dbname=superbowl','root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $statement= $pdo->prepare('INSERT INTO users(first_name, last_name, email, birth_date, password, role) VALUES (:first_name, :last_name, :email, :birth_date, :password, :role)');
      $statement->bindValue(':first_name', $first_name);
      $statement->bindValue(':last_name', $last_name);
      $statement->bindValue(':birth_date', $birth_date);
      $statement->bindValue(':email', $email);
      $statement->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
      $statement->bindValue(':role', $role);

      if ($statement->execute()) {
         echo 'Le compte de '.$first_name.' '.$last_name.' a bien été créé.'.'<br>';
         echo '<br>';
         echo 'Il/Elle est enregistré(e) en tant que : '.$role;
         echo '<br>';
         echo '<br>';
         echo '<button class="button_connexion"><a class="link_pages" href="admin.php">Retour à la page administrateur</a></button>';

         }
         else {
         echo 'Impossible de créer l\'utilisateur';
         }
      } catch (PDOException $e) {
         echo 'Impossible de se connecter à la base de données';
      }
   }
      ?>
      </div>
   </div>
   </body>
</html>