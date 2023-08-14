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
         $comment = $_POST['comment'];

         try {

            $pdo = new PDO('mysql:host=localhost;dbname=superbowl', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $newcomment = $pdo->prepare('UPDATE teams SET comment = :comment WHERE team_name = :team_name');
            $newcomment->bindValue(':team_name', $team_name);
            $newcomment->bindValue(':comment', $comment);

            if ($newcomment->execute()) {

               echo 'Le nouveau commentaire de l\'équipe ' . $team_name . ' a bien été enregistré.' . '<br>';
               echo '<br>';
               echo '<button class="button_connexion"><a class="link_pages" href="admin.php">Retour à la page administrateur</a></button>';
            } else {
               echo 'Impossible d\'enregistrer le nouveau commentaire';
            }
         } catch (PDOException $e) {
            echo 'Impossible de se connecter à la base de données';
         }

         ?>
      </div>
   </div>
</body>

</html>