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

         $team_name = $_POST['team_name'];
         $team_winning_odds = $_POST['team_winning_odds'];

         try {
            
            require "../constants/pdo.php";

            $newodd = $pdo->prepare('UPDATE teams SET team_winning_odds = :team_winning_odds WHERE team_name = :team_name');
            $newodd->bindValue(':team_name', $team_name);
            $newodd->bindValue(':team_winning_odds', $team_winning_odds);

            if ($newodd->execute()) {

               echo 'La nouvelle cote de l\'équipe ' . $team_name . ' a bien été enregistrée.' . '<br>';
               echo '<br>';
               echo '<button class="button_connexion"><a class="link_pages" href="admin.php">Retour à la page administrateur</a></button>';
            } else {
               echo 'Impossible d\'enregistrer la nouvelle cote';
            }
         } catch (PDOException $e) {
            echo 'Impossible de se connecter à la base de données';
         }

         ?>
      </div>
   </div>
</body>

</html>