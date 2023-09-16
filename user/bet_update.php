<?php require_once "../templates/header_home_norefresh.php"; ?>

      <div class="container_connexion">

         <?php

         $bet_match_id = $_POST['match_id'];
         $bet_user_id = $_POST['user_id'];
         $bet_team = $_POST['bet_team'];
         $bet_team1_name = $_POST['bet_team1_name'];
         $bet_team2_name = $_POST['bet_team2_name'];
         $bet_team1_odds = $_POST['bet_team1_odds'];
         $bet_team2_odds = $_POST['bet_team2_odds'];
         $bet_draw_odds = $_POST['bet_draw_odds'];
         $bet_team1 = $_POST['bet_team1'];
         $bet_draw = $_POST['bet_draw'];
         $bet_team2 = $_POST['bet_team2'];
         $bet_keepcurrentbet = $_POST['keepcurrentbet'];

         if ($bet_keepcurrentbet === "Oui") {
            header("location:home.php");

         } else {
            echo 'Mon pari actuel sur le match : ' . $bet_team1_name . ' - ' . $bet_team2_name;
            echo '<br>';
            echo 'Equipe gagnante actuelle : ' . $bet_team;
            echo '<br>';
            if ($bet_team1 != 0) {
               echo 'Mise actuelle : ' . $bet_team1.' €';
               echo '<br>';
               echo 'Cote actuelle : ' . $bet_team1_odds;
               echo '<br>';
               $gain_potentiel_1 = $bet_team1 * $bet_team1_odds;
               echo 'Gain potentiel actuel : ' . $gain_potentiel_1.' €';
            } elseif ($bet_draw != 0) {
               echo 'Mise actuelle : ' . $bet_draw.' €';
               echo '<br>';
               echo 'Cote actuelle : ' . $bet_draw_odds;
               echo '<br>';
               $gain_potentiel_0 = $bet_draw * $bet_draw_odds;
               echo 'Gain potentiel actuel : ' . $gain_potentiel_0.' €';
            } elseif ($bet_team2 != 0) {
               echo 'Mise actuelle : ' . $bet_team2.' €';
               echo '<br>';
               echo 'Cote actuelle : ' . $bet_team2_odds;
               echo '<br>';
               $gain_potentiel_2 = $bet_team2 * $bet_team2_odds;
               echo 'Gain potentiel actuel : ' . $gain_potentiel_2.' €';
            }

            echo '<br>';
            echo '<br>';
            echo 'Nouveau pari pour le match :';

            /* AU CAS OU UN JOUR LES COTES SERAIENT DYNAMIQUES */

            require "../constants/pdo.php";

            foreach ($pdo->query('SELECT * FROM matchs WHERE match_id =' . $bet_match_id . '', PDO::FETCH_ASSOC) as $currentodds) {
               $current_team1_odds = $currentodds['team1_odds'];
               $current_draw_odds = $currentodds['draw_odds'];
               $current_team2_odds = $currentodds['team2_odds'];
            }
         ?>
            <br>
            <br>
            <div>
               <table width="100%">
                  <tr>
                     <td class="display_teamname" width="48%">
                        <?php echo $bet_team1_name; ?>
                     </td>

                     <td class="display_teamname" width="4%">
                        /
                     </td>

                     <td class="display_teamname" width="48%">
                        <?php echo $bet_team2_name; ?>
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
                        <a href="connexion.php"><button class="button_bet"><?php echo $current_team1_odds; ?></button></a>
                     </td>

                     <td align="center" width="4%">
                        <a href="connexion.php"><button class="button_bet"><?php echo $current_draw_odds; ?></button></a>
                     </td>

                     <td align="center" width="48%">
                        <a href="connexion.php"><button class="button_bet"><?php echo $current_team2_odds; ?></button></a>
                     </td>
                  </tr>

               </table>
            </div>

            <br>

            <div>
               <form method="POST" action="bet_update_output.php">

                  <label class="label_bet_update" for="confirm_winning_team">Confirmez le choix de l'équipe gagnante</label>
                  <Select name="confirm_winning_team">
                     <option value="<?php echo $bet_team1_name; ?>"><?php echo $bet_team1_name; ?></option>
                     <option value="<?php echo $bet_team2_name; ?>"><?php echo $bet_team2_name; ?></option>
                     <option value="Match nul">Match nul</option>
                  </Select>
                  <br>
                  <br>
                  <label class="label_bet_update" for="new_bet">Confirmez la nouvelle mise : </label>
                  <input type="text" class="bet_input" name="new_bet" placeholder="mise">
                  <br>
                  <br>
                  <input type="hidden" name="match_id" value="<?php echo $bet_match_id; ?>">
                  <input type="hidden" name="user_id" value="<?php echo $bet_user_id; ?>">
                  <input type="hidden" name="team1_odds" value="<?php echo $current_team1_odds; ?>">
                  <input type="hidden" name="draw_odds" value="<?php echo $current_draw_odds; ?>">
                  <input type="hidden" name="team2_odds" value="<?php echo $current_team2_odds; ?>">
                  <input type="hidden" name="team1_bet" value="<?php echo $bet_team1; ?>">
                  <input type="hidden" name="draw_bet" value="<?php echo $bet_draw; ?>">
                  <input type="hidden" name="team2_bet" value="<?php echo $bet_team2; ?>">
                  <input type="submit" class="button_connexion" value="Confirmer et annuler mise précédente">

               </form>
            </div>
         <?php }

         ?>

      </div>

      <?php require_once "../templates/footer.php"; ?>
