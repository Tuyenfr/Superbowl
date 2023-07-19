<?php
session_start();
?>

<html>
   
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>New match</title>
      <link rel="stylesheet" href="../CSS/style.css" type="text/css">
   </head>

   <body>
   <div class="flux">
      <header>
         <h1 class="logo"><a class="link_pages" href="admin.php"><strong><i>Super</i>Bowl-BET</strong></a></h1>
      </header>
   
      <div class="container_connexion">

      <?php

      $match_date = $_POST['match_date'];
      $start_time = $_POST['start_time'];
      $end_time = $_POST['end_time'];
      $team1_name = $_POST['team1_name'];
      $team2_name = $_POST['team2_name'];
      $match_status = 'à venir';
      $match_name = $team1_name.' - '.$team2_name;

      $matchdateUS = date_create_from_format('Y-m-d', $match_date);
      $matchdateFR = date_format($matchdateUS, 'd-m-Y');
   
      try {

      $pdo = new PDO('mysql:host=localhost;dbname=superbowl','root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   
      $t1odds = $pdo->prepare('SELECT team_winning_odds FROM teams WHERE team_name = :team1_name');
         $t1odds->bindValue(':team1_name', $team1_name);
         if ($t1odds->execute()) {
            $team1_winning_odds = $t1odds->fetchColumn();
         }

      $t2odds = $pdo->prepare('SELECT team_winning_odds FROM teams WHERE team_name = :team2_name');
         $t2odds->bindValue(':team2_name', $team2_name);
         if ($t2odds->execute()) {
            $team2_winning_odds = $t2odds->fetchColumn();
         }

      }
      catch (PDOException $e) {
         echo 'Impossible de se connecter à la base de données teams';
         }
      
         $team1_odds = number_format((1 + $team1_winning_odds/($team1_winning_odds + $team2_winning_odds)),2);
         $team2_odds = number_format((1 + $team2_winning_odds/($team1_winning_odds+ $team2_winning_odds)),2);
         $draw_odds = CEIL(12 + ABS(($team1_winning_odds - $team2_winning_odds))); 
      
         try {

         $pdo1 = new PDO('mysql:host=localhost;dbname=superbowl','root', '');
         $pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         $newmatch = $pdo1->prepare('INSERT INTO matchs (match_date, start_time, end_time, team1_name, team2_name, match_name, team1_odds, draw_odds, team2_odds, match_status) VALUES (:match_date, :start_time, :end_time, :team1_name, :team2_name, :match_name, :team1_odds, :draw_odds, :team2_odds, :match_status)');
         $newmatch->bindValue(':match_date', $match_date);
         $newmatch->bindValue(':start_time', $start_time);
         $newmatch->bindValue(':end_time', $end_time);
         $newmatch->bindValue(':team1_name', $team1_name);
         $newmatch->bindValue(':team2_name', $team2_name);
         $newmatch->bindValue(':match_name', $match_name);
         $newmatch->bindValue(':team1_odds', $team1_odds);
         $newmatch->bindValue(':draw_odds', $draw_odds);
         $newmatch->bindValue(':team2_odds', $team2_odds);
         $newmatch->bindValue(':match_status', $match_status);

         if ($newmatch->execute()) {

         echo 'Le match '.$team1_name.' - '.$team2_name.' du '.$matchdateFR.' à '.$start_time.' a bien été enregistré.'.'<br>';
         echo '<br>';
         echo '<button class="button_connexion"><a class="link_pages" href="admin.php">Retour à la page administrateur</a></button>';
      } else {
         echo 'Impossible d\'enregistrer le nouveau match';
      }
   
         }
      catch (PDOException $e) {
         echo 'Impossible de se connecter à la base de données matchs';
      }

      ?>
      </div>
   </div>
   </body>
</html>