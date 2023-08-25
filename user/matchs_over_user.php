<?php
session_start();
?>

<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv='refresh' content='60'>
   <title>SuperBowl-BET</title>
   <link rel="stylesheet" href="../CSS/style.css" type="text/css">
</head>

<body>
   <div class="flux">
      <header>
         <p class="logo"><a class="link_pages" href="home.php"><i>Super</i>Bowl-BET</a></p>
         <nav>
            <ul class="menu">
               <li><a class="link_pages" href="home.php">Lives</a></li>
               <li><a class="link_pages" href="matchs_tocome_user.php">Matchs à venir</a></li>
               <li class="bold"><a class="link_pages" href="matchs_over_user.php">Matchs terminés</a></li>
               <li><a class="link_pages" href="users_history.php">Mon compte</a></li>
            </ul>
         </nav>
      </header>
      <br>

      <section class="container_matchs">

         <div class="aside_left">

            <?php include_once "../templates/aside_left_content.php"; ?>

         </div>

         <div class="table_equipe">

            <div class="sous_table">

               <br>
               <h4> Matchs terminés</h4>

               <?php

               require_once "../constants/matchs_encours_update.php";
               require_once "../constants/matchs_avenir_update.php";
               require_once "../constants/matchs_over_update.php";
               require_once "../constants/bets_update.php";

               try {

                  $pdo = new PDO('mysql:host=localhost;dbname=superbowl', username: "root", password: "");

                  $statement = $pdo->query('SELECT * FROM matchs WHERE match_status = "terminé" ORDER BY match_date ASC, start_time ASC', PDO::FETCH_ASSOC);
                  $nbmatch = $statement->fetchAll();
                  $count = count($nbmatch);
                  $itemsPerPage = 10;
                  $nbPages = ceil($count / $itemsPerPage);

                  if ($count < 10) {

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
                  } else {

                     if (isset($_GET["page"])) {
                        $currentPage = $_GET["page"];
                        $limitX = ($currentPage * $itemsPerPage) - 10;
                        $limitY = $itemsPerPage - 1;

                        foreach ($pdo->query('SELECT * FROM matchs WHERE match_status = "terminé" ORDER BY match_date DESC, start_time DESC LIMIT ' . $limitX . ', ' . $limitY . '', PDO::FETCH_ASSOC) as $match_name) {
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
                        <?php } ?>

                        <ul class="pages_li">
                           <li>
                              <a class="pages_liens" href="matchs_over_user.php">Page 1 &nbsp</a>
                           </li>
                           <?php
                           for ($i = 2; $i <= $nbPages; $i++) { ?>
                              <li>
                                 <a class="pages_liens" href='matchs_over_user.php?page=<?php echo $i; ?>'><?php echo $i; ?> &nbsp</a>
                              </li>
                           <?php } ?>
                           <li>&nbsp &nbsp &nbsp &nbsp &nbsp</li> <?php
                                                                  echo '</ul>';
                                                                  echo '<br>';
                                                               } else {

                                                                  foreach ($pdo->query('SELECT * FROM matchs WHERE match_status = "terminé" ORDER BY match_date DESC, start_time DESC LIMIT 0, 9', PDO::FETCH_ASSOC) as $match_name) {
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
                           <?php } ?>

                           <ul class="pages_li">
                              <li>
                                 <a class="pages_liens" href="matchs_over_user.php">Page 1 &nbsp</a>
                              </li>
                              <?php
                                    for ($i = 2; $i <= $nbPages; $i++) { ?>
                                 <li>
                                    <a class="pages_liens" href='matchs_over_user.php?page=<?php echo $i; ?>'><?php echo $i; ?> &nbsp</a>
                                 </li>
                              <?php } ?>
                              <li>&nbsp &nbsp &nbsp &nbsp &nbsp</li> <?php
                                                                     echo '</ul>';
                                                                     echo '<br>';
                                                                  }
                                                               }
                                                            } catch (PDOException $e) {
                                                               echo 'pb de connexion';
                                                            }

                                                                     ?>
            </div>
         </div>

         <div class="aside_right">

            <?php include_once "../templates/aside_right_content.php"; ?>

         </div>

      </section>

      <?php require_once "../templates/footer.php"; ?>

   </div>
</body>

</html>