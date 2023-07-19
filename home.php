<?php
session_start();
?>

<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>SuperBowl-BET</title>
      <link rel="stylesheet" href="./CSS/style.css" type="text/css">
   </head>

   <body>
   <div class="flux">
      <header>
         <h1 class="logo"><a class="link_pages" href="home.php"><strong><i>Super</i>Bowl-BET</strong></a></h1>
      <nav> 
         <ul class="menu">
            <li class="strong"><a class="link_pages" href="home.php">Lives</li>
            <li><a class="link_pages" href="matchs_tocome_user.php">Matchs à venir</li>
            <li><a class="link_pages" href="matchs_over_user.php">Matchs terminés</li>
            <li><a class="link_pages" href="users_history.php">Mon compte</a></li>
         </ul>
      </nav>
      </header>
      <br>
      <br>
      
      <div style="text-align: center">
         <?php
         if (isset($_SESSION['user'])) {
         echo 'Bonjour '.$_SESSION['first_name'].' ! ';
         }
         ?>
      </div>   

      <section class="container_matchs">
      
      <div class="table_equipe">
   <?php

   require "./constants/matchs_avenir_update.php";
   require "./constants/matchs_encours_update.php";
   require "./constants/matchs_over_update.php";

   try{
      $pdo = new PDO('mysql:host=localhost;dbname=superbowl', username: "root", password: "");
         foreach ($pdo->query('SELECT * FROM matchs WHERE match_status = "en cours"', PDO::FETCH_ASSOC) as $match_name)
            {
               $date =  $match_name['match_date'];
               $dateUS = DateTime::createFromFormat('Y-m-d', $date);
               $dateUSfull = date_format($dateUS, 'l d F Y');
               $dateFRday= str_replace (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'], ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'], $dateUSfull);
               $match_dateFR = str_replace (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'], ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'], $dateFRday);

               ?>
               <div>
                  <table border="0" width="100%">
                     <tr class="display_td" width="100%">
                        <td>
                           <?php echo $match_dateFR;?>
                        </td>
                     </tr>

                     <tr class="display_td" width="100%">
                        <td>
                           <?php echo substr($match_name['start_time'], 0, -3). ' - ' .substr($match_name['end_time'], 0, -3);?>
                        </td>
                     </tr>
                  </table>
               </div>   
               
               <div>
                  <table border="0" width="100%" align="center">
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
                        </form>
                     </td>

                     <td class="display_betnumber" width="10%">
                        N
                        </form>
                     </td>

                     <td class="display_betnumber" width="45%">
                        2
                        </form>
                     </td>
                     </tr>

                     <tr>
                     <td class="display_betnumber" width="45%">
                        <form action="cart.php" method="GET">
                        <input type="hidden" name="team1_odds" value="<?php echo $match_name['team1_odds']; ?>">
                        <input type="hidden" name="team1_name" value="<?php echo $match_name['team1_name']; ?>">
                        <input type="hidden" name="team2_name" value="<?php echo $match_name['team2_name']; ?>">
                        <input type="hidden" name="match_id" value="<?php echo $match_name['match_id']; ?>">
                        <input type="hidden" name="match_date" value="<?php echo $match_name['match_date']; ?>">
                        <input class="button_bet" type="submit" value="<?php echo $match_name['team1_odds']; ?>">
                        </form>
                     </td>

                     <td class="display_betnumber" width="10%">
                        <form action="cart.php" method="GET">
                        <input type="hidden" name="draw_odds" value="<?php echo $match_name['draw_odds']; ?>">
                        <input type="hidden" name="team1_name" value="<?php echo $match_name['team1_name']; ?>">
                        <input type="hidden" name="team2_name" value="<?php echo $match_name['team2_name']; ?>">
                        <input type="hidden" name="match_id" value="<?php echo $match_name['match_id']; ?>">
                        <input type="hidden" name="match_date" value="<?php echo $match_name['match_date']; ?>">
                        <input class="button_bet" type="submit" value="<?php echo $match_name['draw_odds']; ?>">
                        </form>
                     </td>

                     <td class="display_betnumber" width="45%">
                        <form action="cart.php" method="GET">
                        <input type="hidden" name="team2_odds" value="<?php echo $match_name['team2_odds']; ?>">
                        <input type="hidden" name="team1_name" value="<?php echo $match_name['team1_name']; ?>">
                        <input type="hidden" name="team2_name" value="<?php echo $match_name['team2_name']; ?>">
                        <input type="hidden" name="match_id" value="<?php echo $match_name['match_id']; ?>">
                        <input type="hidden" name="match_date" value="<?php echo $match_name['match_date']; ?>">
                        <input class="button_bet" type="submit" value="<?php echo $match_name['team2_odds']; ?>">
                        </form>
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
   </body>

   <footer>
      <p>Jouer comporte des risques</p>
      Mentions légales / © Copyright 2023 - Stania.com / Contact
   </footer>

   </html>