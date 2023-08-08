<?php
session_start();
?>

<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>SuperBowl-BET - Pari en ligne</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
      <link rel="stylesheet" href="./CSS/style-test.css" type="text/css">
   </head>

   <body>
   
   <div class="flux">
      
      <header>
         <p class="logo"><a class="link_pages" href="index.php"><strong><i>Super</i>Bowl-BET</strong></a></p>
      
         <nav> 
            <ul class="menu">
               <li class="strong"><a class="link_pages" href="index.php">Lives</a></li>
               <li><a class="link_pages" href="matchs_tocome.php">Matchs à venir</a></li>
               <li><a class="link_pages" href="matchs_over.php">Matchs terminés</a></li>
               <li><a class="link_pages" href="about_superbowl.php">A propos du Super Bowl</a></li>
               <li><a class="link_pages" href="connexion.php" target="_blank">Connexion</a></li>
            </ul>
         </nav>
      </header>
      <br>
      <br>

      <section class="container_matchs_index">
         <div class="table_equipe_index">
            <div class="sous_table_index">
         
            <div class="teaser">Découvrez le plus grand tournoi de football américain et faites vos paris !</div>
            <a class="link_about_SB" href="about_superbowl.php" target="_blank">En savoir plus</a>

               <h4>Matchs du jour</h4>

      <!-- require "./constants/matchs_live.php"; -->

   <?php

   require "./constants/matchs_encours_update.php";
   require "./constants/matchs_avenir_update.php";
   require "./constants/matchs_over_update.php";

   try{
      $pdo = new PDO('mysql:host=localhost;dbname=superbowl', username: "root", password: "");

      $statement = $pdo->query('SELECT * FROM matchs WHERE match_status = "live" ORDER BY start_time DESC', PDO::FETCH_ASSOC);
         $nbmatch = $statement->fetchAll();
      
               foreach ($nbmatch as $match_name) {
   
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
                     <td class="display_betnumber" width="48%">
                        Score
                     </td>

                     <td class="display_betnumber" width="4%">
                        
                     </td>

                     <td class="display_betnumber" width="48%">
                        Score
                     </td>
                     </tr>

                     <tr>
                     <td class="display_betnumber" width="48%">
                        <button class="button_score_live"><?php echo $match_name['team1_score']; ?></button>
                     </td>
                     <td class="display_betnumber" width="4%">
                     
                     </td>
                     <td class="display_betnumber" width="48%">
                     <button class="button_score_live"><?php echo $match_name['team2_score']; ?></button>
                     </td>
                  </tr>
               </table>
            </div>
            <br>
            <br>
            <?php }   
      
            } catch (PDOException $e) {
            echo 'pb de connexion';
            }
            ?>

      <?php
      
      try{
      
         $pdo = new PDO('mysql:host=localhost;dbname=superbowl', username: "root", password: "");
         $statement = $pdo->query('SELECT * FROM matchs WHERE match_status = "en cours" ORDER BY match_date ASC', PDO::FETCH_ASSOC);
         $nbmatch = $statement->fetchAll();
            if (count($nbmatch) > 0) {
               foreach ($nbmatch as $match_name) {
   
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
                        <td class="display_betnumber" width="48%">
                           1
                        </td>

                        <td class="display_betnumber" width="4%">
                           N
                        </td>

                        <td class="display_betnumber" width="48%">
                           2
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
            <br>
            <?php }     

         }  else {echo 'Aucun match en cours';}

            } catch (PDOException $e) 
                  {echo 'pb de connexion';}
   
            ?>

         <h4>Matchs à venir</h4>
      
      <?php

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
                  </td>

                  <td class="display_betnumber" width="4%">
                     N
                  </td>

                  <td class="display_betnumber" width="48%">
                     2
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
      <br>

      <?php }            
      }catch (PDOException $e) {
         echo 'pb de connexion';
         }
      ?>
   
         <h4>Matchs terminés</h4>

   <?php

   try{
      $pdo = new PDO('mysql:host=localhost;dbname=superbowl', username: "root", password: "");
         foreach ($pdo->query('SELECT * FROM matchs WHERE match_status = "terminé" ORDER BY match_date DESC', PDO::FETCH_ASSOC) as $match_name)
         {
         $date =  $match_name['match_date'];
         $dateUS = DateTime::createFromFormat('Y-m-d', $date);
         $dateUSfull = date_format($dateUS, 'l d F Y');
         $dateFRday= str_replace (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'], ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'], $dateUSfull);
         $match_dateFR = str_replace (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'], ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'], $dateFRday);
                        
         ?>
         <div>
            <table border="0" width="100%">
               <tr width="100%">
                  <td class="display_td">
                     <?php echo $match_dateFR. ' - ' .'Match'.' '.$match_name['match_status'];?>
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
                  <td class="display_betnumber" width="48%">
                  Score
                  </td>

                  <td class="display_betnumber" width="4%">
                  </td>

                  <td class="display_betnumber" width="48%">
                  Score
                  </td>
               </tr>

               <tr>
                  <td class="display_betnumber" width="48%">
                     <button class="button_score"><?php echo $match_name['team1_score']; ?></button>
                  </td>

                  <td class="display_betnumber" width="4%">
                  </td>

                  <td class="display_betnumber" width="48%">
                     <button class="button_score"><?php echo $match_name['team2_score']; ?></button>
                  </td>
               </tr>
            </table>
         </div>
      <br>
      <br>

      <?php }            
      }catch (PDOException $e) {
      echo 'pb de connexion';}
      
      ?>

            </div>
         </div>
      </section>

      <footer>
      <p>Jouer comporte des risques</p>
      Mentions légales / © Copyright 2023 - Stania.com / Contact
      </footer>

      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
   </body>
</html>