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

      $date_match_name = $_POST['date_match_name'];
      $match_comment = $_POST['match_comment'];

         try {
         
         $pdo = new PDO('mysql:host=localhost;dbname=superbowl','root', '');
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         $matchcomment = $pdo->prepare('UPDATE matchs SET match_comment = :match_comment WHERE date_match_name = :date_match_name');
         $matchcomment->bindValue(':match_comment', $match_comment);
         $matchcomment->bindValue(':date_match_name', $date_match_name);
   
         if ($matchcomment->execute())

         {
            echo 'Le commentaire du match '.$date_match_name.' a bien été enregistré.'.'<br>';
   
            echo '<br>';
            echo '<button class="button_connexion"><a class="link_pages" href="admin.php">Retour à la page administrateur</a></button>';
         } else {
            echo 'Impossible d\'enregistrer le nouveau commentaire';
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