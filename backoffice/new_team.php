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
         $player1 = $_POST['player1'];
         $player2 = $_POST['player2'];
         $player3 = $_POST['player3'];
         $player4 = $_POST['player4'];
         $player5 = $_POST['player5'];
         $player6 = $_POST['player6'];
         $player7 = $_POST['player7'];
         $player8 = $_POST['player8'];
         $player9 = $_POST['player9'];
         $player10 = $_POST['player10'];
         $player11 = $_POST['player11'];

         try {

            require "../constants/pdo.php";

            $newteam = $pdo->prepare('INSERT INTO teams (team_name, team_winning_odds, player1, player2, player3, player4, player5, player6, player7, player8, player9, player10, player11) VALUES (:team_name, :team_winning_odds, :player1, :player2, :player3, :player4, :player5, :player6, :player7, :player8, :player9, :player10, :player11)');
            $newteam->bindValue(':team_name', $team_name);
            $newteam->bindValue(':team_winning_odds', $team_winning_odds);
            $newteam->bindValue(':player1', $player1);
            $newteam->bindValue(':player2', $player2);
            $newteam->bindValue(':player3', $player3);
            $newteam->bindValue(':player4', $player4);
            $newteam->bindValue(':player5', $player5);
            $newteam->bindValue(':player6', $player6);
            $newteam->bindValue(':player7', $player7);
            $newteam->bindValue(':player8', $player8);
            $newteam->bindValue(':player9', $player9);
            $newteam->bindValue(':player10', $player10);
            $newteam->bindValue(':player11', $player11);

            if ($newteam->execute()) {

               echo 'L\'équipe ' . $team_name . ' a bien été enregistrée.' . '<br>';
               echo '<br>';
               echo '<button class="button_connexion"><a class="link_pages" href="admin.php">Retour à la page administrateur</a></button>';
            } else {
               echo 'Impossible d\'enregistrer la nouvelle équipe';
            }
         } catch (PDOException $e) {
            echo 'Impossible de se connecter à la base de données';
         }

         ?>
      </div>
   </div>
</body>

</html>