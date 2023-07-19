<?php
session_start();
?>

<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>SuperBowl-BET - Pari en ligne</title>
      <link rel="stylesheet" href="./CSS/style.css" type="text/css">
   </head>

   <body>
   <div class="flux">
      <header>
         <h1 class="logo"><a class="link_pages" href="index.php"><strong><i>Super</i>Bowl-BET</strong></h1>
      <nav> 
         <ul class="menu">
            <li class="strong"><a class="link_pages" href="index.php">Lives</li>
            <li><a class="link_pages" href="matchs_tocome.php">Matchs à venir</li>
            <li><a class="link_pages" href="matchs_over.php">Matchs terminés</li>
            <li><a class="link_pages" href="connexion.php" target="_blank">Connexion</a></li>
         </ul>
      </nav>
      </header>
      <br>

      <section class="container_matchs">

      <div class="table_equipe">

   <?php


   require "./constants/matchs_avenir_update.php";
   require "./constants/matchs_encours_update.php";
   require "./constants/matchs_over_update.php";

   try{
      $pdo = new PDO('mysql:host=localhost;dbname=superbowl', username: "root", password: "");
         foreach ($pdo->query('SELECT * FROM matchs WHERE match_status = "en cours" ORDER BY match_date ASC', PDO::FETCH_ASSOC) as $match_name)
            {
               $date =  $match_name['match_date'];
               $dateUS = DateTime::createFromFormat('Y-m-d', $date);
               $dateUSfull = date_format($dateUS, 'l d F Y');
               $dateFRday= str_replace (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'], ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'], $dateUSfull);
               $match_dateFR = str_replace (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'], ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'], $dateFRday);

               ?>
               <div>
                  <table border="0" width="100%" align="center">
                     
                     <tr width="100%">
                        <td class="display_td">                     
                           <?php echo $match_dateFR;?>
                        </td>
                     </tr>

                     <tr width="100%">
                        <td class="display_td">
                           <?php echo substr($match_name['start_time'], 0, -3). ' - ' .substr($match_name['end_time'], 0, -3);?>
                        </td>
                     </tr>
                  </table>
               </div>   
               
               <div>
                  <table border="0" width="100%">
                     <tr>
                        <td class="display_teamname">
                        <?php echo $match_name['team1_name'];?>
                        </td>

                        <td class="display_teamname">
                        /
                        </td>

                        <td class="display_teamname">
                        <?php echo $match_name['team2_name'];?>
                        </td>
                     </tr>
               
                     <tr>
                     <td class="display_betnumber" width="45%">
                        1
                     </td>

                     <td class="display_betnumber" width="10%">
                        N
                     </td>

                     <td class="display_betnumber" width="45%">
                        2
                     </td>
                     </tr>

                     <tr>
                     <td class="display_betnumber" width="45%">
                        <a href="connexion.php"><button class="button_bet"><?php echo $match_name['team1_odds']; ?></button></a>
                     </td>
                     <td class="display_betnumber" width="10%">
                        <a href="connexion.php"><button class="button_bet"><?php echo $match_name['draw_odds']; ?></button></a>
                     </td>
                     <td class="display_betnumber" width="45%">
                        <a href="connexion.php"><button class="button_bet"><?php echo $match_name['team2_odds']; ?></button></a>
                     </td>
                  </tr>
               </table>
            </div>
            <br>
            <?php }            
            }catch (PDOException $e) {
            echo 'pb de connexion';
            }
      ?>
      </div>

      </section>
   </div>
      </body>
      <footer>Copyright 2023 - Stania</footer>
</html>