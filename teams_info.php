<?php
session_start();
?>

<html>
   
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>user info</title>
      <link rel="stylesheet" href="./CSS/style.css" type="text/css">
   </head>

   <body>
   <div class="flux">
      <header>
         <h1 class="logo"><a class="link_pages" href="home.php"><strong><i>Super</i>Bowl-BET</strong></a></h1>

         <nav> 
         <ul class="menu">
            <li><a class="link_pages" href="home.php">Accueil</li>
            <li><a class="link_pages" href="users_history.php">Mes paris</li>
            <li><a class="link_pages" href="users_balance.php">Mon solde</li>
            <li class="strong"><a class="link_pages" href="users_info.php">Mes infos personnelles</a></li>
            <li><a class="link_pages" href="session_destroy.php">Déconnexion</a></li>
         </ul>
      </nav>

      </header>
   
      <div class="container_connexion">

      <?php

      $team_name=$_POST['team_name'];

      try {

      $pdo = new PDO('mysql:host=localhost;dbname=superbowl','root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         $statement= $pdo->prepare('SELECT * FROM teams WHERE team_name = :team_name');
         $statement->bindValue(':team_name', $team_name);
         if ($statement->execute()) { ?>

            <p class="title_form"><?php echo $team_name; ?></p>

            <?php } 
      
         } catch (PDOException $e) {
               echo 'Impossible de se connecter à la base de données';
               }
      ?>

               <?php

               $team_name=$_POST['team_name'];

               try {
            
                  $pdo2 = new PDO('mysql:host=localhost;dbname=superbowl','root', '');
                  $pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                  $players = $pdo2->prepare('SELECT * FROM teams WHERE team_name = :team_name');
                  $players->bindValue(':team_name', $team_name);
                  $players->execute();
                  $team_info= $players->fetchAll();

                  foreach ($team_info as $infoteam)

                  { ?>

                  <p>Composition de l'équipe</p>
                  <ol>
                  <li><?php echo $infoteam['player1']; ?></li>
                  <li><?php echo $infoteam['player2']; ?></li>
                  <li><?php echo $infoteam['player3']; ?></li>
                  <li><?php echo $infoteam['player4']; ?></li>
                  <li><?php echo $infoteam['player5']; ?></li>
                  <li><?php echo $infoteam['player6']; ?></li>
                  <li><?php echo $infoteam['player7']; ?></li>
                  <li><?php echo $infoteam['player8']; ?></li>
                  <li><?php echo $infoteam['player9']; ?></li>
                  <li><?php echo $infoteam['player10']; ?></li>
                  <li><?php echo $infoteam['player11']; ?></li>
                  </ol>

                  <p>Commentaire</p>
                  <?php echo $infoteam['comment']; ?>

                  <p>Dernière actualité</p>
                  <?php echo $infoteam['latest_news']; ?>

                     <?php }
            
               } catch (PDOException $e) {
                  echo 'Impossible de se connecter à la base de données2';
                     }

               ?>

      <?php

      $team_name=$_POST['team_name'];

      try {

      $pdo3 = new PDO('mysql:host=localhost;dbname=superbowl','root', '');
      $pdo3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $team_matchs = $pdo3->prepare('SELECT * FROM matchs WHERE team1_name = :team_name OR team2_name = :team_name');
      $team_matchs->bindValue(':team_name', $team_name);
      $team_matchs->execute();
      $matchs_info= $team_matchs->fetchAll();

      foreach ($matchs_info as $infomatch)

      { ?>

      <p>Historique des matchs</p>
      <table>
      <tr>
         <td><?php echo $infomatch['match_date']; ?></td>
         <td>/ <?php echo $infomatch['team1_name']; ?></td>
         <td>-</td>
         <td><?php echo $infomatch['team2_name']; ?></td>
         <td>/ score</td>
         <td><?php echo $infomatch['team1_score']; ?></td>
         <td>-</td>
         <td><?php echo $infomatch['team2_score']; ?></td>
      </tr>
      </table>

      <?php }

} catch (PDOException $e) {
   echo 'Impossible de se connecter à la base de données2';
      }

?>
   </div>
   </body>

   <footer>
      <p>Jouer comporte des risques</p>
      Mentions légales / © Copyright 2023 - Stania.com / Contact
   </footer>

</html>