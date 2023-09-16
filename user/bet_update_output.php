<?php require_once "../templates/header_home_norefresh.php"; ?>

<div class="container_connexion">

<br>

   <?php
   $bet_match_id = $_POST['match_id'];
   $bet_user_id = $_POST['user_id'];
   $bet_team = $_POST['confirm_winning_team'];
   $bet_new_amount = $_POST['new_bet'];
   $bet_team1_odds = $_POST['team1_odds'];
   $bet_draw_odds = $_POST['draw_odds'];
   $bet_team2_odds = $_POST['team2_odds'];
   $bet_team1_old = $_POST['team1_bet'];
   $bet_draw_old = $_POST['draw_bet'];
   $bet_team2_old = $_POST['team2_bet'];

   $bet_difference = $bet_new_amount - ($bet_team1_old + $bet_draw_old + $bet_team2_old);

   try {
      
      require "../constants/pdo.php";

      foreach ($pdo->query('SELECT * FROM bets WHERE match_id =' . $bet_match_id . '', PDO::FETCH_ASSOC) as $newbet) {
         $team1_name = $newbet['team1_name'];
         $team2_name = $newbet['team2_name'];
         $match_date = $newbet['match_date'];
         $matchdateUS = date_create_from_format('Y-m-d', $match_date);
         $matchdateFR = date_format($matchdateUS, 'd-m-Y');

         if ($bet_team === $team1_name) {

            $potential_gain_1 = $bet_new_amount * $bet_team1_odds;

            require "../constants/pdo.php";

            $bet_update_1 = $pdo->prepare('UPDATE bets SET team1_odds = :bet_team1_odds, draw_odds = "0", team2_odds = "0", team1_bet = :bet_new_amount, draw_bet = "0", team2_bet = "0", team_name_bet = :bet_team, potential_gain = :potential_gain_1 WHERE match_id = :bet_match_id');
            $bet_update_1->bindValue(':bet_team1_odds', $bet_team1_odds);
            $bet_update_1->bindValue(':bet_new_amount', $bet_new_amount);
            $bet_update_1->bindValue(':bet_team', $bet_team);
            $bet_update_1->bindValue(':potential_gain_1', $potential_gain_1);
            $bet_update_1->bindValue(':bet_match_id', $bet_match_id);

            if ($bet_update_1->execute()) {

               echo 'Votre nouveau pari pour le match ' . $team1_name . ' - ' . $team2_name . ' du ' . $matchdateFR . ' a bien été enregistré.';
               echo '<br>';
               echo '<br>';
               echo 'Votre gain potentiel est de : ' . $potential_gain_1 . ' €';
               echo '<br>';
               echo '<br>';
               
            } else {
               echo 'Impossible d\'enregistrer le nouveau pari.';
            }

         } elseif ($bet_team === $team2_name) {

            $potential_gain_2 = $bet_new_amount * $bet_team2_odds;

            require "../constants/pdo.php";

            $bet_update_2 = $pdo->prepare('UPDATE bets SET team1_odds = "0", draw_odds = "0", team2_odds = :bet_team2_odds, team1_bet = "0", draw_bet = "0", team2_bet = :bet_new_amount, team_name_bet = :bet_team, potential_gain = :potential_gain_2 WHERE match_id = :bet_match_id');
            $bet_update_2->bindValue(':bet_team2_odds', $bet_team2_odds);
            $bet_update_2->bindValue(':bet_new_amount', $bet_new_amount);
            $bet_update_2->bindValue(':bet_team', $bet_team);
            $bet_update_2->bindValue(':potential_gain_2', $potential_gain_2);
            $bet_update_2->bindValue(':bet_match_id', $bet_match_id);

            if ($bet_update_2->execute()) {

               echo 'Votre nouveau pari pour le match ' . $team1_name . ' - ' . $team2_name . ' du ' . $matchdateFR . ' a bien été enregistré.';
               echo '<br>';
               echo '<br>';
               echo 'Votre gain potentiel est de : ' . $potential_gain_2 . ' €';
               echo '<br>';
               echo '<br>';

            } else {
               echo 'Impossible d\'enregistrer le nouveau pari.';
            }
         } else {

            $potential_gain_0 = $bet_new_amount * $bet_draw_odds;

            require "../constants/pdo.php";

            $bet_update_0 = $pdo->prepare('UPDATE bets SET team1_odds = "0", draw_odds = :bet_draw_odds, team2_odds = "0", team1_bet = "0", draw_bet = :bet_new_amount, team2_bet = "0", team_name_bet = "Match nul", potential_gain = :potential_gain_0 WHERE match_id = :bet_match_id');
            $bet_update_0->bindValue(':bet_draw_odds', $bet_draw_odds);
            $bet_update_0->bindValue(':bet_new_amount', $bet_new_amount);
            $bet_update_0->bindValue(':potential_gain_0', $potential_gain_0);
            $bet_update_0->bindValue(':bet_match_id', $bet_match_id);

            if ($bet_update_0->execute()) {

               echo 'Votre nouveau pari pour le match ' . $team1_name . ' - ' . $team2_name . ' du ' . $matchdateFR . ' a bien été enregistré.';
               echo '<br>';
               echo '<br>';
               echo 'Votre gain potentiel est de : ' . $potential_gain_0 . ' €';
               echo '<br>';
               echo '<br>';
         
            } else {
               echo 'Impossible d\'enregistrer le nouveau pari.';
            }
         }
      }

      //MISE A JOUR SOLDE USER 

      require "../constants/pdo.php";

      $user_update = $pdo->prepare('SELECT * FROM users WHERE user_id =' . $bet_user_id . '');
      $user_update->execute();
      $current_user_balance = $user_update->fetchAll();

      foreach ($current_user_balance as $user_balance) {

      $new_user_balance = $user_balance['user_balance'] - $bet_difference;
      $transaction_date = date('Y-m-d');

      if ($bet_difference > 0) {

      $debit = $bet_difference;

      require "../constants/pdo.php";

      $user_balance_update = $pdo->prepare('INSERT INTO users_balance(transaction_date, transaction_description, user_id, debit, user_balance) VALUES (:transaction_date, "Mise à jour pari", :bet_user_id, :debit, :new_user_balance)');
      $user_balance_update->bindValue(':transaction_date', $transaction_date);
      $user_balance_update->bindValue(':debit', $debit);
      $user_balance_update->bindValue(':new_user_balance', $new_user_balance);
      $user_balance_update->bindValue(':bet_user_id', $bet_user_id);


      if ($user_balance_update->execute()) {

      require "../constants/pdo.php";

      $user_update = $pdo->prepare('UPDATE users SET user_balance = :new_user_balance WHERE user_id = :bet_user_id');
      $user_update->bindValue(':new_user_balance', $new_user_balance);
      $user_update->bindValue(':bet_user_id', $bet_user_id);

      if ($user_update->execute()) {
      
      echo "Votre nouveau solde est de : ".$new_user_balance;
      echo '<br>';
      echo '<br>';
      echo '<button class="button_connexion"><a class="link_pages" href="home.php">Retour à la page d\'accueil</a></button>';
            }
         }
      } elseif ($bet_difference < 0)  {

            $credit = - $bet_difference;
      
            require "../constants/pdo.php";
      
            $user_balance_update1 = $pdo->prepare('INSERT INTO users_balance(transaction_date, transaction_description, user_id, credit, user_balance) VALUES (:transaction_date, "Mise à jour pari", :bet_user_id, :credit, :new_user_balance)');
            $user_balance_update1->bindValue(':transaction_date', $transaction_date);
            $user_balance_update1->bindValue(':credit', $credit);
            $user_balance_update1->bindValue(':new_user_balance', $new_user_balance);
            $user_balance_update1->bindValue(':bet_user_id', $bet_user_id);

            if ($user_balance_update1->execute()) {
      
            require "../constants/pdo.php";
      
            $user_update1 = $pdo->prepare('UPDATE users SET user_balance = :new_user_balance WHERE user_id = :bet_user_id');
            $user_update1->bindValue(':new_user_balance', $new_user_balance);
            $user_update1->bindValue(':bet_user_id', $bet_user_id);
               
            if ($user_update1->execute()) {
            echo "Votre nouveau solde est de : ".$new_user_balance;
            echo '<br>';
            echo '<br>';
            echo '<button class="button_connexion"><a class="link_pages" href="home.php">Retour à la page d\'accueil</a></button>';
                  }
               }
            } else {
            echo "Votre solde reste inchangé";
            echo '<br>';
            echo '<br>';
            echo '<button class="button_connexion"><a class="link_pages" href="home.php">Retour à la page d\'accueil</a></button>';
         }
      }
   } catch (PDOException $e) {
      echo 'Impossible de se connecter à la base de données.';
   }
   ?>
</div>

<?php require_once "../templates/footer.php"; ?>
