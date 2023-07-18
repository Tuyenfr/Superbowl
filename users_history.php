<?php
session_start();
?>

<html>
   
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>user history</title>
      <link rel="stylesheet" href="./CSS/style.css" type="text/css">
   </head>

   <body>
   <div class="flux">
      <header>
         <h1 class="logo"><a class="link_pages" href="home.php"><strong><i>Super</i>Bowl-BET</strong></a></h1>

         <nav> 
         <ul class="menu">
            <li class="strong"><a class="link_pages" href="home.php">Accueil</li>
            <li><a class="link_pages" href="users_history.php">Mes paris</li>
            <li><a class="link_pages" href="users_balance.php">Mon solde</li>
            <li><a class="link_pages" href="users_info.php">Mes infos personnelles</a></li>
            <li><a class="link_pages" href="session_destroy.php">Déconnexion</a></li>
         </ul>
      </nav>

      </header>
   
      <div class="container_connexion">

      <p class="title_form"> Mes paris</p>

      <table border="0" width="100%" align="center" style="font-weight: bold; color: rgb(70, 73, 75)">
            <tr>
               <td width="10%">Date pari</td>
               <td width="30%">Match</td>
               <td width="10%">Date match</td>
               <td width="15%">Pari Vainqueur</td>
               <td width="8%">Cote</td>
               <td width="8%">Mise</td>
               <td width="10%">Statut</td>
               <td width="9%">Gain</td>
            </tr>
      </table>

      <?php

      try {

         if(isset($_SESSION['user'])) {
            $user_id = $_SESSION['user_id'];
         }

      $pdo = new PDO('mysql:host=localhost;dbname=superbowl','root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         foreach ($pdo->query('SELECT * FROM bets WHERE user_id = '.$user_id.' ORDER BY bet_id DESC', PDO::FETCH_ASSOC) as $bets) 
         
         {
            $betdate = $bets['bet_date'];
            $betdateUS = date_create_from_format('Y-m-d', $betdate);
            $betdateFR = date_format($betdateUS, 'd-m-Y');

            $matchdate = $bets['match_date'];
            $matchdateUS = date_create_from_format('Y-m-d', $matchdate);
            $matchdateFR = date_format($matchdateUS, 'd-m-Y');
            
            ?> 
            
         <table border="0" width="100%" align="center">
            <tr>
               <td width="10%"><?php echo $betdateFR; ?></td>
               <td width="30%"><?php echo $bets['team1_name'].' - '.$bets['team2_name']; ?></td>
               <td width="10%"><?php echo $matchdateFR; ?></td>
               <td width="15%"><?php echo $bets['team_name_bet']; ?></td>
               <td width="8%"><?php if ($bets['team1_odds'] != '0') {
                        echo $bets['team1_odds'];
                        } elseif ($bets['team2_odds'] != '0') {
                           echo $bets['team2_odds'];
                           } elseif ($bets['draw_odds'] != '0') {
                              echo $bets['draw_odds'];
                              }
                     ?>
               </td>
               <td width="8%"><?php if ($bets['team1_bet'] != '0') {
                        echo $bets['team1_bet'];
                        } elseif ($bets['team2_bet'] != '0') {
                           echo $bets['team2_bet'];
                           } elseif ($bets['draw_bet'] != '0') {
                              echo $bets['draw_bet'];
                              }
                     ?>
               </td>
               <td width="10%"><?php echo $bets['bet_status']; ?></td>
               <td width="9%"><?php echo $bets['bet_gain']; ?></td>
         </tr>
         </table>
      <?php }
      
      } catch (PDOException $e) {
         echo 'Impossible de se connecter à la base de données';
      }
      ?>
      </div>
   </div>
   </body>
</html>