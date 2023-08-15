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
         <p class="logo"><a class="link_pages" href="index.php"><i>Super</i>Bowl-BET</a></p>

         <nav>
            <ul class="menu">
               <li class="bold"><a class="link_pages" href="index.php">Lives</a></li>
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

               <br>

               <h4>Matchs live</h4>

               <?php

               require_once "./constants/matchs_encours_update.php";
               require_once "./constants/matchs_live.php";
               require_once "./constants/matchs_avenir_update.php";
               require_once "./constants/matchs_over_update.php";
               require_once "./constants/bets_update.php";

               try {
                  $pdo = new PDO('mysql:host=localhost;dbname=superbowl', username: "root", password: "");

                  $statement = $pdo->query('SELECT * FROM matchs WHERE match_status = "live" ORDER BY start_time DESC', PDO::FETCH_ASSOC);
                  $nbmatch = $statement->fetchAll();

                  if (count($nbmatch) > 0) {

                     foreach ($nbmatch as $match_name) {

                        $date =  $match_name['match_date'];
                        $dateUS = DateTime::createFromFormat('Y-m-d', $date);
                        $dateUSfull = date_format($dateUS, 'l d F Y');
                        $dateFRday = str_replace(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'], ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'], $dateUSfull);
                        $match_dateFR = str_replace(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'], ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'], $dateFRday);

               ?>
                        <div>
                           <table width="100%" align="center">

                              <tr width="100%">
                                 <td class="display_td_notover">
                                    <?php echo $match_dateFR; ?>
                                 </td>
                              </tr>

                              <tr width="100%">
                                 <td class="display_td">
                                    <?php echo substr($match_name['start_time'], 0, -3) . ' - ' . substr($match_name['end_time'], 0, -3); ?>
                                 </td>
                              </tr>
                           </table>
                        </div>

                        <div>
                           <table width="100%">
                              <tr>
                                 <td class="display_teamname" width="48%">
                                    <?php echo $match_name['team1_name']; ?>
                                 </td>

                                 <td class="display_teamname" width="4%">
                                    /
                                 </td>

                                 <td class="display_teamname" width="48%">
                                    <?php echo $match_name['team2_name']; ?>
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
                                 <td align="center" width="48%">
                                    <button class="button_score_live"><?php echo $match_name['team1_score']; ?></button>
                                 </td>

                                 <td align="center" width="4%">
                                 </td>

                                 <td align="center" width="48%">
                                    <button class="button_score_live"><?php echo $match_name['team2_score']; ?></button>
                                 </td>
                              </tr>
                           </table>
                        </div>

                        <div class="modal_margin">
                           <a href="#<?php echo $match_name['match_name']; ?>" class="link_comment">Commentaires match</a>
                           <div id="<?php echo $match_name['match_name']; ?>" class="modal">
                              <div class="modal_content"><?php echo $match_name['match_comment']; ?></div>
                              <a href="#" class="modal_close">x</a>
                           </div>
                        </div>

                        <br>
               <?php }
                  } else {
                     echo 'Aucun match en cours';
                  }
               } catch (PDOException $e) {
                  echo 'pb de connexion';
               }
               ?>

               <h4>Matchs du jour</h4>

               <?php

               try {

                  $pdo = new PDO('mysql:host=localhost;dbname=superbowl', username: "root", password: "");
                  $statement = $pdo->query('SELECT * FROM matchs WHERE match_status = "en cours" ORDER BY match_date ASC, start_time ASC', PDO::FETCH_ASSOC);
                  $nbmatch = $statement->fetchAll();
                  if (count($nbmatch) > 0) {
                     foreach ($nbmatch as $match_name) {

                        $date =  $match_name['match_date'];
                        $dateUS = DateTime::createFromFormat('Y-m-d', $date);
                        $dateUSfull = date_format($dateUS, 'l d F Y');
                        $dateFRday = str_replace(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'], ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'], $dateUSfull);
                        $match_dateFR = str_replace(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'], ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'], $dateFRday);

               ?>
                        <div>
                           <table width="100%" align="center">

                              <tr width="100%">
                                 <td class="display_td_notover">
                                    <?php echo $match_dateFR; ?>
                                 </td>
                              </tr>

                              <tr width="100%">
                                 <td class="display_td">
                                    <?php echo substr($match_name['start_time'], 0, -3) . ' - ' . substr($match_name['end_time'], 0, -3); ?>
                                 </td>
                              </tr>
                           </table>
                        </div>

                        <div>
                           <table width="100%">
                              <tr>
                                 <td class="display_teamname" width="48%">
                                    <?php echo $match_name['team1_name']; ?>
                                 </td>

                                 <td class="display_teamname" width="4%">
                                    /
                                 </td>

                                 <td class="display_teamname" width="48%">
                                    <?php echo $match_name['team2_name']; ?>
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
                                 <td align="center" width="48%">
                                    <a href="connexion.php"><button class="button_bet"><?php echo $match_name['team1_odds']; ?></button></a>
                                 </td>

                                 <td align="center" width="4%">
                                    <a href="connexion.php"><button class="button_bet"><?php echo $match_name['draw_odds']; ?></button></a>
                                 </td>

                                 <td align="center" width="48%">
                                    <a href="connexion.php"><button class="button_bet"><?php echo $match_name['team2_odds']; ?></button></a>
                                 </td>
                              </tr>
                           </table>
                        </div>

                        <div class="modal_margin">
                           <a href="#<?php echo $match_name['match_name']; ?>" class="link_comment">Commentaires match</a>
                           <div id="<?php echo $match_name['match_name']; ?>" class="modal">
                              <div class="modal_content"><?php echo $match_name['match_comment']; ?></div>
                              <a href="#" class="modal_close">x</a>
                           </div>
                        </div>

                        <br>

               <?php }
                  } else {
                     echo 'Aucun match en cours';
                  }
               } catch (PDOException $e) {
                  echo 'pb de connexion';
               }

               ?>

               <h4>Matchs à venir</h4>

               <?php

               try {
                  $pdo = new PDO('mysql:host=localhost;dbname=superbowl', username: "root", password: "");
                  foreach ($pdo->query('SELECT * FROM matchs WHERE match_status = "à venir" ORDER BY match_date ASC, start_time ASC', PDO::FETCH_ASSOC) as $match_name) {
                     $date =  $match_name['match_date'];
                     $dateUS = DateTime::createFromFormat('Y-m-d', $date);
                     $dateUSfull = date_format($dateUS, 'l d F Y');
                     $dateFRday = str_replace(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'], ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'], $dateUSfull);
                     $match_dateFR = str_replace(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'], ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'], $dateFRday);

               ?>

                     <div>
                        <table width="100%">
                           <tr>
                              <td class="display_td_notover" width="100%">
                                 <?php echo $match_dateFR . ' - ' . 'Match' . ' ' . $match_name['match_status']; ?>
                              </td>
                           </tr>

                           <tr>
                              <td class="display_td" width="100%">
                                 <?php echo substr($match_name['start_time'], 0, -3) . ' - ' . substr($match_name['end_time'], 0, -3); ?>
                              </td>
                           </tr>
                        </table>
                     </div>

                     <div>
                        <table width="100%">
                           <tr>
                              <td class="display_teamname" width="48%">
                                 <?php echo $match_name['team1_name']; ?>
                              </td>

                              <td class="display_teamname" width="4%">
                                 /
                              </td>

                              <td class="display_teamname" width="48%">
                                 <?php echo $match_name['team2_name']; ?>
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
                              <td align="center" width="48%">
                                 <a href="connexion.php"><button class="button_bet"><?php echo $match_name['team1_odds']; ?></button></a>
                              </td>

                              <td align="center" width="4%">
                                 <a href="connexion.php"><button class="button_bet"><?php echo $match_name['draw_odds']; ?></button></a>
                              </td>

                              <td align="center" width="48%">
                                 <a href="connexion.php"><button class="button_bet"><?php echo $match_name['team2_odds']; ?></button></a>
                              </td>
                           </tr>
                        </table>
                     </div>

                     <div class="modal_margin">
                        <a href="#<?php echo $match_name['match_name']; ?>" class="link_comment">Commentaires match</a>
                        <div id="<?php echo $match_name['match_name']; ?>" class="modal">
                           <div class="modal_content"><?php echo $match_name['match_comment']; ?></div>
                           <a href="#" class="modal_close">x</a>
                        </div>
                     </div>

                     <br>

               <?php }
               } catch (PDOException $e) {
                  echo 'pb de connexion';
               }
               ?>

               <h4>Matchs terminés</h4>

               <?php

               try {
                  $pdo = new PDO('mysql:host=localhost;dbname=superbowl', username: "root", password: "");
                  foreach ($pdo->query('SELECT * FROM matchs WHERE match_status = "terminé" ORDER BY match_date DESC, start_time DESC', PDO::FETCH_ASSOC) as $match_name) {
                     $date =  $match_name['match_date'];
                     $dateUS = DateTime::createFromFormat('Y-m-d', $date);
                     $dateUSfull = date_format($dateUS, 'l d F Y');
                     $dateFRday = str_replace(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'], ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'], $dateUSfull);
                     $match_dateFR = str_replace(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'], ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'], $dateFRday);

               ?>
                     <div>
                        <table width="100%">
                           <tr width="100%">
                              <td class="display_td">
                                 <?php echo $match_dateFR . ' - ' . 'Match' . ' ' . $match_name['match_status']; ?>
                              </td>
                           </tr>

                           <tr width="100%">
                              <td class="display_td">
                                 <?php echo substr($match_name['start_time'], 0, -3) . ' - ' . substr($match_name['end_time'], 0, -3); ?>
                              </td>
                           </tr>
                        </table>
                     </div>

                     <div>
                        <table width="100%">
                           <tr>
                              <td class="display_teamname" width="48%">
                                 <?php echo $match_name['team1_name']; ?>
                              </td>

                              <td class="display_teamname" width="4%">
                                 /
                              </td>

                              <td class="display_teamname" width="48%">
                                 <?php echo $match_name['team2_name']; ?>
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
                              <td align="center" width="48%">
                                 <button class="button_score"><?php echo $match_name['team1_score']; ?></button>
                              </td>

                              <td align="center" width="4%">
                              </td>

                              <td align="center" width="48%">
                                 <button class="button_score"><?php echo $match_name['team2_score']; ?></button>
                              </td>
                           </tr>
                        </table>
                     </div>

                     <br>

               <?php }
               } catch (PDOException $e) {
                  echo 'pb de connexion';
               }

               ?>

            </div>
         </div>
      </section>

      <?php require_once "./templates/footer.php"; ?>

   </div>
</body>

</html>