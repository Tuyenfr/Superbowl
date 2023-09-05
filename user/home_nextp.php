<?php require_once "../templates/header_home_nextp.php"; ?>

<br>
      <section class="container_matchs">

         <div class="aside_left">
            <?php include_once "../templates/aside_left_content.php"; ?>
         </div>

         <div class="table_equipe">

            <div class="sous_table">

               <?php

               require_once "../constants/matchs_encours_update.php";
               require_once "../constants/matchs_live.php";
               require_once "../constants/matchs_avenir_update.php";
               require_once "../constants/matchs_over_update.php";
               require_once "../constants/bets_update.php";

               try {
                  
                  require "../constants/pdo.php";

                  $statement = $pdo->query('SELECT * FROM matchs WHERE match_status = "terminé" ORDER BY match_date ASC, start_time ASC', PDO::FETCH_ASSOC);
                  $nbmatch = $statement->fetchAll();
                  $count = count($nbmatch);
                  $itemsPerPage = 7;
                  $nbPages = ceil($count / $itemsPerPage);

                  if (isset($_GET["page"])) {
                     $currentPage = $_GET["page"];
                     $limitX = ($currentPage * $itemsPerPage) - $itemsPerPage;
                     $limitY = $itemsPerPage;

                     foreach ($pdo->query('SELECT * FROM matchs WHERE match_status = "terminé" ORDER BY match_date DESC, start_time DESC LIMIT ' . $limitX . ', ' . $limitY . '', PDO::FETCH_ASSOC) as $match_name) {

                        $date =  $match_name['match_date'];
                        $dateUS = DateTime::createFromFormat('Y-m-d', $date);
                        $dateUSfull = date_format($dateUS, 'l d F Y');
                        $dateFRday = str_replace(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'], ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'], $dateUSfull);
                        $match_dateFR = str_replace(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'], ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'], $dateFRday);

               ?>
                        <div>
                           <table width="100%">
                              <tr>
                                 <td class="display_td" width="100%">
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

                                 <td calign="center" width="4%">

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
                           <a class="pages_liens" href="home.php">Page 1 &nbsp</a>
                        </li>
                        <?php
                        
                        for ($i = 2; $i <= $nbPages; $i++) { ?>

                        <li class="<?php if ($currentPage == $i) {echo 'bold';} ?>">
                           <a class="pages_liens" href='home_nextp.php?page=<?php echo $i; ?>'><?php echo $i; ?> &nbsp</a>
                        </li>
                        <?php } ?>
                        <li>&nbsp &nbsp &nbsp &nbsp &nbsp</li> <?php
                        echo '</ul>';

                        echo '<br>';
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
