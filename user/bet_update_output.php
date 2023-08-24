<?php
session_start();
?>

<html>

<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Cart</title>
 <link rel="stylesheet" href="../CSS/style.css" type="text/css">
</head>

<body>
 <div class="flux">

  <header>

   <p class="logo"><a class="link_pages" href="home.php"><i>Super</i>Bowl-BET</a></p>

   <nav>

    <ul class="menu">

     <li class="bold"><a class="link_pages" href="home.php">Lives</a></li>
     <li><a class="link_pages" href="matchs_tocome_user.php">Matchs à venir</a></li>
     <li><a class="link_pages" href="matchs_over.php">Matchs terminés</a></li>
     <li><a class="link_pages" href="users_history.php">Mon compte</a></li>
    </ul>

   </nav>

  </header>

  <div class="container_connexion">

   <?php
   $bet_match_id = $_POST['match_id'];
   $bet_team = $_POST['confirm_winning_team'];
   $bet_new_amount = $_POST['new_bet'];
   $bet_team1_odds = $_POST['team1_odds'];
   $bet_draw_odds = $_POST['draw_odds'];
   $bet_team2_odds = $_POST['team2_odds'];

   try {
    $pdo = new PDO('mysql:host=localhost;dbname=superbowl', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    foreach ($pdo->query('SELECT * FROM bets WHERE match_id =' . $bet_match_id . '', PDO::FETCH_ASSOC) as $newbet) {
     $team1_name = $newbet['team1_name'];
     $team2_name = $newbet['team2_name'];
     $match_date = $newbet['match_date'];
     $matchdateUS = date_create_from_format('Y-m-d', $match_date);
     $matchdateFR = date_format($matchdateUS, 'd-m-Y');

     if ($bet_team === $team1_name) {

      $potential_gain_1 = $bet_new_amount * $bet_team1_odds;

      $pdo = new PDO('mysql:host=localhost;dbname=superbowl', 'root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
      } else {
       echo 'Impossible d\'enregistrer le nouveau pari.';
      }
     } elseif ($bet_team === $team2_name) {

      $potential_gain_2 = $bet_new_amount * $bet_team2_odds;

      $pdo = new PDO('mysql:host=localhost;dbname=superbowl', 'root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
      } else {
       echo 'Impossible d\'enregistrer le nouveau pari.';
      }
     } else {

      $potential_gain_0 = $bet_new_amount * $bet_draw_odds;

      $pdo = new PDO('mysql:host=localhost;dbname=superbowl', 'root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
      } else {
       echo 'Impossible d\'enregistrer le nouveau pari.';
      }
     }
    }
   } catch (PDOException $e) {
    echo 'Impossible de se connecter à la base de données.';
   }
   ?>
  </div>

  <?php require_once "../templates/footer.php"; ?>

 </div>
</body>

</html>