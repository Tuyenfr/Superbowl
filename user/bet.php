<?php require_once "../templates/header_home_norefresh.php"; ?>

      <div class="container_connexion">
         <br>
         <br>

         <?php

         $user_id = $_POST['user_id'];
         $match_id = $_POST['match_id'];

         try {
            
            require "../constants/pdo.php";

            foreach ($pdo->query('SELECT * FROM bets WHERE user_id = ' .$user_id. ' AND match_id = ' .$match_id. '', PDO::FETCH_ASSOC) as $bet) {
               $bet_match_id = $bet['match_id'];
               $bet_team = $bet['team_name_bet'];
               $bet_team1_name = $bet['team1_name'];
               $bet_team2_name = $bet['team2_name'];
               $bet_team1_odds = $bet['team1_odds'];
               $bet_team2_odds = $bet['team2_odds'];
               $bet_draw_odds = $bet['draw_odds'];
               $bet_team1 = $bet['team1_bet'];
               $bet_draw = $bet['draw_bet'];
               $bet_team2 = $bet['team2_bet'];

            }

               if (isset($bet_match_id)) {
                  echo 'Vous avez déjà parié sur ce match.';
                  echo '<br>';
                  echo '<br>';
               ?>

                  <form method="POST" action="bet_update.php">

                     <label class="label_bet_update" for="keepcurrentbet">Souhaitez-vous conserver la mise actuelle ?</label>
                     <select name="keepcurrentbet">
                        <option value="Oui">Oui</option>
                        <option value="Non">Non</option>
                     </select>
                     <div>
                        <br>
                        <input type="hidden" name="match_id" value="<?php echo $bet_match_id; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <input type="hidden" name="bet_team" value="<?php echo $bet_team; ?>">
                        <input type="hidden" name="bet_team1_name" value="<?php echo $bet_team1_name; ?>">
                        <input type="hidden" name="bet_team2_name" value="<?php echo $bet_team2_name; ?>">
                        <input type="hidden" name="bet_team1_odds" value="<?php echo $bet_team1_odds; ?>">
                        <input type="hidden" name="bet_team2_odds" value="<?php echo $bet_team2_odds; ?>">
                        <input type="hidden" name="bet_draw_odds" value="<?php echo $bet_draw_odds; ?>">
                        <input type="hidden" name="bet_team1" value="<?php echo $bet_team1; ?>">
                        <input type="hidden" name="bet_draw" value="<?php echo $bet_draw; ?>">
                        <input type="hidden" name="bet_team2" value="<?php echo $bet_team2; ?>">
                        <input class="button_connexion" type="submit" value="Validez mon choix">
                     </div>
                  </form>

         <?php
               } elseif (isset($_POST['team1_odds']) && !empty($_POST['team1_odds'])) {

                  $bet_date = $_POST['bet_date'];
                  $user_id = $_POST['user_id'];
                  $match_id = $_POST['match_id'];
                  $match_date = $_POST['match_date'];
                  $team1_name = $_POST['team1_name'];
                  $team2_name = $_POST['team2_name'];
                  $team1_odds = $_POST['team1_odds'];
                  $team1_bet = $_POST['team1_bet'];

                  $potential_gain = $team1_odds * $team1_bet;
                  $team_name_bet = $team1_name;
                  $date_match_name = $match_date . " " . $team1_name . " - " . $team2_name;
                  $bet_status = 'En cours';
                  $bet_admin_status = "open";

                  try {
                     
                     require "../constants/pdo.php";

                     $statement = $pdo->prepare('INSERT INTO bets(bet_date, user_id, match_id, match_date, team1_name, team2_name,date_match_name, team1_odds, team_name_bet, team1_bet, bet_status, potential_gain, bet_admin_status) VALUES (:bet_date, :user_id, :match_id, :match_date, :team1_name, :team2_name, :date_match_name, :team1_odds, :team_name_bet, :team1_bet, :bet_status, :potential_gain, :bet_admin_status)');
                     $statement->bindValue(':bet_date', $bet_date);
                     $statement->bindValue(':user_id', $user_id);
                     $statement->bindValue(':match_date', $match_date);
                     $statement->bindValue(':match_id', $match_id);
                     $statement->bindValue(':team1_name', $team1_name);
                     $statement->bindValue(':team2_name', $team2_name);
                     $statement->bindValue(':date_match_name', $date_match_name);
                     $statement->bindValue(':team_name_bet', $team_name_bet);
                     $statement->bindValue(':team1_odds', $team1_odds);
                     $statement->bindValue(':team1_bet', $team1_bet);
                     $statement->bindValue(':bet_status', $bet_status);
                     $statement->bindValue(':potential_gain', $potential_gain);
                     $statement->bindValue(':bet_admin_status', $bet_admin_status);

                     if ($statement->execute()) {

                        echo 'Votre pari est bien enregistré !';
                        echo '<br>';
                        echo '<br>';
                        echo 'Votre gain potentiel est de : ' . $potential_gain . ' euros';
                        echo '<br>';
                        echo '<br>';

                        require "../constants/pdo.php";

                        foreach ($pdo->query('SELECT * FROM users WHERE user_id =' . $user_id . '', PDO::FETCH_ASSOC) as $currentbalance) {
                           $currentbalance['user_balance'] -= $team1_bet;
                           $newcurrentbalance = $currentbalance['user_balance'];
                           echo 'Votre nouveau solde est de : ' . $newcurrentbalance . ' euros';

                           $newbalance = $pdo->prepare('UPDATE users SET user_balance = :balance WHERE user_id =' . $user_id . '');
                           $newbalance->bindValue(':balance', $newcurrentbalance);
                           $newbalance->execute();

                           require "../constants/pdo.php";

                           $credit = "0";
                           $transaction_description = "Mise pari";

                           $newtransaction = $pdo->prepare('INSERT INTO users_balance (user_id, transaction_date, transaction_description, credit, debit, user_balance) VALUES (:user_id, :bet_date, :transaction_description, :credit, :team1_bet, :newcurrentbalance)');
                           $newtransaction->bindValue(':user_id', $user_id);
                           $newtransaction->bindValue(':bet_date', $bet_date);
                           $newtransaction->bindValue(':transaction_description', $transaction_description);
                           $newtransaction->bindValue(':credit', $credit);
                           $newtransaction->bindValue(':team1_bet', $team1_bet);
                           $newtransaction->bindValue(':newcurrentbalance', $newcurrentbalance);
                           $newtransaction->execute();
                        }

                        echo '<br>';
                        echo '<br>';

                        echo '<button class="button_connexion"><a class="link_pages" href="home.php">Retour à la page d\'accueil</a></button>';
                     } else {
                        echo 'Impossible d\'enregistrer le pari';
                     }
                  } catch (PDOException $e) {
                     echo 'Impossible de se connecter à la base de données';
                  }
               } elseif (isset($_POST['team2_odds']) && !empty($_POST['team2_odds'])) {

                  $bet_date = $_POST['bet_date'];
                  $user_id = $_POST['user_id'];
                  $match_id = $_POST['match_id'];
                  $match_date = $_POST['match_date'];
                  $team1_name = $_POST['team1_name'];
                  $team2_name = $_POST['team2_name'];
                  $team2_odds = $_POST['team2_odds'];
                  $team2_bet = $_POST['team2_bet'];

                  $potential_gain = $team2_odds * $team2_bet;
                  $date_match_name = $match_date . " " . $team1_name . " - " . $team2_name;
                  $team_name_bet = $team2_name;
                  $bet_status = 'En cours';
                  $bet_admin_status = "open";

                  try {
                     
                     require "../constants/pdo.php";

                     $statement = $pdo->prepare('INSERT INTO bets(bet_date, user_id, match_id, match_date, team1_name, team2_name, date_match_name, team2_odds, team_name_bet, team2_bet, bet_status, potential_gain, bet_admin_status) VALUES (:bet_date, :user_id, :match_id, :match_date, :team1_name, :team2_name, :date_match_name, :team2_odds, :team_name_bet, :team2_bet, :bet_status, :potential_gain, :bet_admin_status)');
                     $statement->bindValue(':bet_date', $bet_date);
                     $statement->bindValue(':user_id', $user_id);
                     $statement->bindValue(':match_date', $match_date);
                     $statement->bindValue(':match_id', $match_id);
                     $statement->bindValue(':team1_name', $team1_name);
                     $statement->bindValue(':team2_name', $team2_name);
                     $statement->bindValue(':date_match_name', $date_match_name);
                     $statement->bindValue(':team_name_bet', $team_name_bet);
                     $statement->bindValue(':team2_odds', $team2_odds);
                     $statement->bindValue(':team2_bet', $team2_bet);
                     $statement->bindValue(':bet_status', $bet_status);
                     $statement->bindValue(':potential_gain', $potential_gain);
                     $statement->bindValue(':bet_admin_status', $bet_admin_status);

                     if ($statement->execute()) {

                        echo 'Votre pari est bien enregistré !';
                        echo '<br>';
                        echo '<br>';
                        echo 'Votre gain potentiel est de : ' . $potential_gain . ' euros';
                        echo '<br>';
                        echo '<br>';

                        require "../constants/pdo.php";

                        foreach ($pdo->query('SELECT * FROM users WHERE user_id =' . $user_id . '', PDO::FETCH_ASSOC) as $currentbalance) {
                           $currentbalance['user_balance'] -= $team2_bet;
                           $newcurrentbalance = $currentbalance['user_balance'];
                           echo 'Votre nouveau solde est de : ' . $newcurrentbalance . ' euros';

                           $newbalance = $pdo->prepare('UPDATE users SET user_balance = :balance WHERE user_id =' . $user_id . '');
                           $newbalance->bindValue(':balance', $newcurrentbalance);
                           $newbalance->execute();

                           require "../constants/pdo.php";

                           $credit = "0";
                           $transaction_description = "Mise pari";

                           $newtransaction = $pdo->prepare('INSERT INTO users_balance (user_id, transaction_date, transaction_description, credit, debit, user_balance) VALUES (:user_id, :bet_date, :transaction_description, :credit, :team2_bet, :newcurrentbalance)');
                           $newtransaction->bindValue(':user_id', $user_id);
                           $newtransaction->bindValue(':bet_date', $bet_date);
                           $newtransaction->bindValue(':transaction_description', $transaction_description);
                           $newtransaction->bindValue(':credit', $credit);
                           $newtransaction->bindValue(':team2_bet', $team2_bet);
                           $newtransaction->bindValue(':newcurrentbalance', $newcurrentbalance);
                           $newtransaction->execute();
                        }

                        echo '<br>';
                        echo '<br>';
                        echo '<button class="button_connexion"><a class="link_pages" href="home.php">Retour à la page d\'accueil</a></button>';
                     } else {
                        echo 'Impossible d\'enregistrer le pari';
                     }
                  } catch (PDOException $e) {
                     echo 'Impossible de se connecter à la base de données';
                  }
               } elseif (isset($_POST['draw_odds']) && !empty($_POST['draw_odds'])) {

                  $bet_date = $_POST['bet_date'];
                  $user_id = $_POST['user_id'];
                  $match_id = $_POST['match_id'];
                  $match_date = $_POST['match_date'];
                  $team1_name = $_POST['team1_name'];
                  $team2_name = $_POST['team2_name'];
                  $draw_odds = $_POST['draw_odds'];
                  $draw_bet = $_POST['draw_bet'];

                  $potential_gain = $draw_odds * $draw_bet;
                  $date_match_name = $match_date . " " . $team1_name . " - " . $team2_name;
                  $team_name_bet = 'Match nul';
                  $bet_status = 'En cours';
                  $bet_admin_status = "open";

                  try {

                     require "../constants/pdo.php";

                     $statement = $pdo->prepare('INSERT INTO bets(bet_date, user_id, match_id, match_date, team1_name, team2_name, date_match_name, draw_odds, team_name_bet, draw_bet, bet_status, potential_gain, bet_admin_status) VALUES (:bet_date, :user_id, :match_id, :match_date, :team1_name, :team2_name, :date_match_name, :draw_odds, :team_name_bet, :draw_bet, :bet_status, :potential_gain, :bet_admin_status)');
                     $statement->bindValue(':bet_date', $bet_date);
                     $statement->bindValue(':user_id', $user_id);
                     $statement->bindValue(':match_date', $match_date);
                     $statement->bindValue(':match_id', $match_id);
                     $statement->bindValue(':team1_name', $team1_name);
                     $statement->bindValue(':team2_name', $team2_name);
                     $statement->bindValue(':date_match_name', $date_match_name);
                     $statement->bindValue(':team_name_bet', $team_name_bet);
                     $statement->bindValue(':draw_odds', $draw_odds);
                     $statement->bindValue(':draw_bet', $draw_bet);
                     $statement->bindValue(':bet_status', $bet_status);
                     $statement->bindValue(':potential_gain', $potential_gain);
                     $statement->bindValue(':bet_admin_status', $bet_admin_status);

                     if ($statement->execute()) {

                        echo 'Votre pari est bien enregistré !';
                        echo '<br>';
                        echo '<br>';
                        echo 'Votre gain potentiel est de : ' . $potential_gain . ' euros';
                        echo '<br>';
                        echo '<br>';

                        require "../constants/pdo.php";

                        foreach ($pdo->query('SELECT * FROM users WHERE user_id =' . $user_id . '', PDO::FETCH_ASSOC) as $currentbalance) {
                           $currentbalance['user_balance'] -= $draw_bet;
                           $newcurrentbalance = $currentbalance['user_balance'];
                           echo 'Votre nouveau solde est de : ' . $newcurrentbalance . ' euros';

                           $newbalance = $pdo->prepare('UPDATE users SET user_balance = :balance WHERE user_id =' . $user_id . '');
                           $newbalance->bindValue(':balance', $newcurrentbalance);
                           $newbalance->execute();

                           require "../constants/pdo.php";

                           $credit = "0";
                           $transaction_description = "Mise pari";

                           $newtransaction = $pdo->prepare('INSERT INTO users_balance (user_id, transaction_date, transaction_description, credit, debit, user_balance) VALUES (:user_id, :bet_date, :transaction_description, :credit, :draw_bet, :newcurrentbalance)');
                           $newtransaction->bindValue(':user_id', $user_id);
                           $newtransaction->bindValue(':bet_date', $bet_date);
                           $newtransaction->bindValue(':transaction_description', $transaction_description);
                           $newtransaction->bindValue(':credit', $credit);
                           $newtransaction->bindValue(':draw_bet', $draw_bet);
                           $newtransaction->bindValue(':newcurrentbalance', $newcurrentbalance);
                           $newtransaction->execute();
                        }

                        echo '<br>';
                        echo '<br>';
                        echo '<button class="button_connexion"><a class="link_pages" href="home.php">Retour à la page d\'accueil</a></button>';
                     } else {
                        echo 'Impossible d\'enregistrer le pari';
                     }
                  } catch (PDOException $e) {
                     echo 'Impossible de se connecter à la base de données';
                  }
               }
            } catch (PDOException $e) {
            echo 'Impossible de se connecter à la base de données';
         }
         ?>
      </div>

      <?php require_once "../templates/footer.php"; ?>
