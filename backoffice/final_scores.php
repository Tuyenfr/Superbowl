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
         <h1 class="logo"><a class="link_pages" href="admin.php"><i>Super</i>Bowl-BET</a></h1>
      </header>
   
      <div class="container_connexion">

      <?php

      $team1_score = $_POST['team1_score'];
      $team2_score = $_POST['team2_score'];
      $date_match_name = $_POST['date_match_name'];
      $team_winning_name = $_POST['team_winning_name'];
      $match_id = $_POST['match_id'];
      $admin_status = 'closed';

         try {
         
         $pdo = new PDO('mysql:host=localhost;dbname=superbowl','root', '');
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         $finalscores = $pdo->prepare('UPDATE matchs SET team1_score = :team1_score, team2_score = :team2_score, team_winning_name = :team_winning_name, admin_status = :admin_status WHERE date_match_name = :date_match_name');
         $finalscores->bindValue(':date_match_name', $date_match_name);
         $finalscores->bindValue(':team1_score', $team1_score);
         $finalscores->bindValue(':team2_score', $team2_score);
         $finalscores->bindValue(':team_winning_name', $team_winning_name);
         $finalscores->bindValue(':admin_status', $admin_status);

         if ($finalscores->execute())

         {  
            echo 'Le score final du match '.$date_match_name.' a bien été enregistré.'.'<br>';
   
            echo '<br>';
            echo '<button class="button_connexion"><a class="link_pages" href="admin.php">Retour à la page administrateur</a></button>';
         } else {
            echo 'Impossible d\'enregistrer les nouveaux scores';
         }

      }
      catch (PDOException $e) {
         echo 'Impossible de se connecter à la base de données';
      }

      try {

         $pdo = new PDO('mysql:host=localhost;dbname=superbowl','root', '');
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         foreach ($pdo->query('SELECT * FROM bets WHERE match_id = $match_id, PDO::FETCH_ASSOC') as $bet_status) {
            $potential_gain = $bet_status['potential_gain'];
         }

         $betUpdateGain = $pdo->prepare('UPDATE bets SET bet_status = "Gagné", bet_gain = :potential_gain  WHERE match_id = :match_id AND team_name_bet = :team_winning_name');
         $betUpdateGain->bindValue(':match_id', $match_id);
         $betUpdateGain->bindValue(':team_winning_name', $team_winning_name);
         $betUpdateGain->bindValue(':potential_gain', $potential_gain);

         if ($betUpdateGain->execute())
         { 
            echo 'Le pari a été mis à jour avec le statut Gagné';}

            else {
               echo 'Impossible de mettre à jour le pari';
            }

      } catch (PDOException $e) {
         echo 'Impossible de se connecter à la base de données2';
      }

      try {

         $pdo = new PDO('mysql:host=localhost;dbname=superbowl','root', '');
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         $betUpdateLost = $pdo->prepare('UPDATE bets SET bet_status = "Perdu" WHERE match_id = :match_id AND team_name_bet != :team_winning_name');
         $betUpdateLost->bindValue(':match_id', $match_id);
         $betUpdateLost->bindValue(':team_winning_name', $team_winning_name);

         if ($betUpdateLost->execute())
         { echo 'Le pari a été mis à jour avec le statut Perdu';}

            else {
               echo 'Impossible de mettre à jour le pari';
            }

      } catch (PDOException $e) {
         echo 'Impossible de se connecter à la base de données3';
      }


      ?>

      </div>
   </div>
   </body>
</html>