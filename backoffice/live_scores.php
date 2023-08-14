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

         try {

            $pdo = new PDO('mysql:host=localhost;dbname=superbowl', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $newscores = $pdo->prepare('UPDATE matchs SET team1_score = :team1_score, team2_score = :team2_score WHERE date_match_name = :date_match_name');
            $newscores->bindValue(':date_match_name', $date_match_name);
            $newscores->bindValue(':team1_score', $team1_score);
            $newscores->bindValue(':team2_score', $team2_score);

            if ($newscores->execute()) {
               echo 'Le score du match ' . $date_match_name . ' a bien été enregistré.' . '<br>';

               echo '<br>';
               echo '<button class="button_connexion"><a class="link_pages" href="admin.php">Retour à la page administrateur</a></button>';
            } else {
               echo 'Impossible d\'enregistrer les nouveaux scores';
            }
         } catch (PDOException $e) {
            echo 'Impossible de se connecter à la base de données';
         }

         ?>

      </div>
   </div>
</body>

</html>