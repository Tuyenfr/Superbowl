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
         <h1 class="logo"><a class="link_pages" href="admin.php"><strong><i>Super</i>Bowl-BET</strong></a></h1>
      </header>
   
      <div class="container_connexion">

      <?php

      $team_name = $_POST['team_name'];
      $team_winning_odds = $_POST['team_winning_odds'];
   
      try {

      $pdo = new PDO('mysql:host=localhost;dbname=superbowl','root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         $newteam = $pdo->prepare('INSERT INTO teams (team_name, team_winning_odds) VALUES (:team_name, :team_winning_odds)');
         $newteam->bindValue(':team_name', $team_name);
         $newteam->bindValue(':team_winning_odds', $team_winning_odds);
      
         if ($newteam->execute()) {

         echo 'L\'équipe '.$team_name.' a bien été enregistrée.'.'<br>';
         echo '<br>';
         echo '<button class="button_connexion"><a class="link_pages" href="admin.php">Retour à la page administrateur</a></button>';
      } else {
         echo 'Impossible d\'enregistrer la nouvelle équipe';
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