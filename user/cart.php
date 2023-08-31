<?php require_once "../templates/header_home.php"; ?>

      <div class="container_useraccount">

         <p class="title_form_pad10">Mon panier</p>
         <br>

         <?php
         $pdo = new PDO('mysql:host=localhost;dbname=superbowl', 'root', '');
         $statementcount = $pdo->prepare('SELECT COUNT(credit) FROM users_balance');
         $statementcount->execute();
         ?>

         <div>

            <?php

            if (isset($_POST['team1_odds']) && !empty($_POST['team1_odds'])) {
               $team1_odds = $_POST['team1_odds'];
               $team1_name = $_POST['team1_name'];
               $team2_name = $_POST['team2_name'];
               $match_id = $_POST['match_id'];
               $match_date = $_POST['match_date'];

               $matchdateUS = date_create_from_format('Y-m-d', $match_date);
               $matchdateFR = date_format($matchdateUS, 'd-m-Y');

            ?>
               <div>
                  <table border="0" width="100%" align="center">
                     <tr>
                        <td width="40%" align="center">
                           <?php echo $matchdateFR; ?>
                        </td>

                        <td width="30%" align="center">
                           Vainqueur : <?php echo $team1_name; ?>
                        </td>

                        <td width="30%" align="center">
                           Mise
                        </td>
                     </tr>

                     <tr>
                        <td width="40%" align="center" class="display_teamname">
                           <?php echo $team1_name . ' - ' . $team2_name; ?>
                        </td>

                        <td width="30%" align="center">
                           <button class="button_bet"><?php echo $team1_odds; ?></button>
                           </form>
                        </td>

                        <td width="30%" align="center" style="padding-top: 5px;">
                           <form action="bet.php" method="POST">
                              <input type="hidden" name="team1_odds" value="<?php echo $team1_odds; ?>">
                              <input type="hidden" name="team1_name" value="<?php echo $team1_name; ?>">
                              <input type="hidden" name="team2_name" value="<?php echo $team2_name; ?>">
                              <input type="hidden" name="match_id" value="<?php echo $match_id; ?>">
                              <input type="hidden" name="match_date" value="<?php echo $match_date; ?>">
                              <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                              <input type="hidden" name="bet_date" value="<?php echo date('Y-m-d'); ?>">
                              <input type="text" name="team1_bet" style="width: 50px; font-size:12px">
                              <input class="button_bet" type="submit" value="Pariez">
                           </form>
                        </td>

                     </tr>
                  </table>
               </div>
               <br>
            <?php } elseif (isset($_POST['team2_odds']) && !empty($_POST['team2_odds'])) {
               $team2_odds = $_POST['team2_odds'];
               $team1_name = $_POST['team1_name'];
               $team2_name = $_POST['team2_name'];
               $match_id = $_POST['match_id'];
               $match_date = $_POST['match_date'];

               $matchdateUS = date_create_from_format('Y-m-d', $match_date);
               $matchdateFR = date_format($matchdateUS, 'd-m-Y');

            ?>
               <div>
                  <table border="0" width="100%" align="center">
                     <tr>
                        <td width="40%" align="center">
                           <?php echo $matchdateFR; ?>
                        </td>

                        <td width="30%" align="center">
                           Vainqueur : <?php echo $team2_name; ?>
                        </td>

                        <td width="30%" align="center">
                           Mise
                        </td>
                     </tr>

                     <tr>
                        <td width="40%" align="center" class="display_teamname">
                           <?php echo $team1_name . ' - ' . $team2_name; ?>
                        </td>

                        <td width="30%" align="center">
                           <button class="button_bet"><?php echo $team2_odds; ?></button>
                           </form>
                        </td>

                        <td width="30%" align="center" style="padding-top: 5px;">
                           <form action="bet.php" method="POST">
                              <input type="hidden" name="team2_odds" value="<?php echo $team2_odds; ?>">
                              <input type="hidden" name="team1_name" value="<?php echo $team1_name; ?>">
                              <input type="hidden" name="team2_name" value="<?php echo $team2_name; ?>">
                              <input type="hidden" name="match_id" value="<?php echo $match_id; ?>">
                              <input type="hidden" name="match_date" value="<?php echo $match_date; ?>">
                              <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                              <input type="hidden" name="bet_date" value="<?php echo date('Y-m-d'); ?>">
                              <input type="text" name="team2_bet" style="width: 50px; font-size:12px">
                              <input class="button_bet" type="submit" value="Pariez">
                           </form>
                        </td>

                     </tr>
                  </table>
               </div>
               <br>
            <?php } elseif (isset($_POST['draw_odds']) && !empty($_POST['draw_odds'])) {
               $draw_odds = $_POST['draw_odds'];
               $team1_name = $_POST['team1_name'];
               $team2_name = $_POST['team2_name'];
               $match_id = $_POST['match_id'];
               $match_date = $_POST['match_date'];

               $matchdateUS = date_create_from_format('Y-m-d', $match_date);
               $matchdateFR = date_format($matchdateUS, 'd-m-Y');

            ?>
               <div>
                  <table border="0" width="100%" align="center">
                     <tr>
                        <td width="40%" align="center">
                           <?php echo $matchdateFR; ?>
                        </td>

                        <td width="30%" align="center">
                           Vainqueur : Match nul
                        </td>

                        <td width="30%" align="center">
                           Mise
                        </td>
                     </tr>

                     <tr>
                        <td width="40%" align="center" class="display_teamname">
                           <?php echo $team1_name . ' - ' . $team2_name; ?>
                        </td>

                        <td width="30%" align="center">
                           <button class="button_bet"><?php echo $draw_odds; ?></button>
                           </form>
                        </td>

                        <td width="30%" align="center" style="padding-top: 5px;">
                           <form action="bet.php" method="POST">
                              <input type="hidden" name="draw_odds" value="<?php echo $draw_odds; ?>">
                              <input type="hidden" name="team1_name" value="<?php echo $team1_name; ?>">
                              <input type="hidden" name="team2_name" value="<?php echo $team2_name; ?>">
                              <input type="hidden" name="match_id" value="<?php echo $match_id; ?>">
                              <input type="hidden" name="match_date" value="<?php echo $match_date; ?>">
                              <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                              <input type="hidden" name="bet_date" value="<?php echo date('Y-m-d'); ?>">
                              <input type="text" name="draw_bet" style="width: 50px; font-size:12px">
                              <input class="button_bet" type="submit" value="Pariez">
                           </form>
                        </td>

                     </tr>
                  </table>
               </div>
               <br>
            <?php }

            ?>

         </div>

         <?php require_once "../templates/footer.php"; ?>
