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
         <p class="logo"><a class="link_pages" href="home.php"><strong><i>Super</i>Bowl-BET</strong></a></p>
      <nav> 
         <ul class="menu">
            <li class="strong"><a class="link_pages" href="home.php">Lives</a></li>
            <li><a class="link_pages" href="matchs_tocome_user.php">Matchs à venir</a></li>
            <li><a class="link_pages" href="matchs_over_user.php">Matchs terminés</a></li>
            <li><a class="link_pages" href="users_history.php">Mon compte</a></li>
         </ul>
      </nav>
      </header>
      <br>

      <section class="container_matchs">

      <div class="aside_left">

         <p>A propos du Super Bowl</p>
         
         <ul>
         <li><a class="link_list_about_sb" href="about_superbowl.php">Histoire du Super Bowl</a></li>
         <li><a class="link_list_about_sb" href="about_superbowl.php">Actualités du Super Bowl</a></li>
         <li><a class="link_list_about_sb" href="about_superbowl.php">Résultats des années antérieures</a></li>
         </ul>

         <p>Infos équipes</p>

         <?php

         try{
         $pdo = new PDO('mysql:host=localhost;dbname=superbowl', username: "root", password: "");
   
         foreach ($pdo->query('SELECT * FROM teams ORDER BY team_name ASC', PDO::FETCH_ASSOC) as $team)
         {
            ?>
            <form action="teams_info.php" method="POST">
            <ul>
               <li class="teams_list">
                  <input class="button_team" type="submit" name="team_name" value="<?php echo $team['team_name']; ?>">
               </li>
            </ul>
            </form>
         <?php }
      
         } catch (PDOException $e) {
            echo 'Accès aux données impossible';}
         ?>

      </div>
      
      <div class="table_equipe">

         <div class="sous_table">
      
      <h4> Matchs à venir</h4>
   
      <?php
      
      require "./constants/matchs_avenir_update.php";
      require "./constants/matchs_encours_update.php";
      require "./constants/matchs_over_update.php";

      try{
      $pdo = new PDO('mysql:host=localhost;dbname=superbowl', username: "root", password: "");
      foreach ($pdo->query('SELECT * FROM matchs WHERE match_status = "à venir" ORDER BY match_date ASC', PDO::FETCH_ASSOC) as $match_name)
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
                  <?php echo $match_dateFR. ' - ' .'Match'.' '.$match_name['match_status'];?>
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
            <td class="display_betnumber" width="48%">
               1
               </form>
            </td>

            <td class="display_betnumber" width="4%">
               N
               </form>
            </td>

            <td class="display_betnumber" width="48%">
               2
               </form>
            </td>
            </tr>

         <tr>
            <td class="display_betnumber" width="48%">
            <a href="connexion.php"><button class="button_bet"><?php echo $match_name['team1_odds']; ?></button></a>
            </td>

            <td class="display_betnumber" width="4%">
            <a href="connexion.php"><button class="button_bet"><?php echo $match_name['draw_odds']; ?></button></a>
            </td>

            <td class="display_betnumber" width="48%">
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
      </div>

      <div class="aside_right">

         <div align="center" style="font-size: 14px">
         <?php
         if (isset($_SESSION['user'])) {
         echo 'Bonjour '.$_SESSION['first_name'].' ! ';
         }
         ?>
         </div>

      </div>

      </section>
   </div>
   </body>

   <footer>
      <p>Jouer comporte des risques</p>
      Mentions légales / © Copyright 2023 - Stania.com / Contact
   </footer>

   </html>