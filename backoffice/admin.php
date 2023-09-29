<?php
session_start();
?>

<html>

<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv='refresh' content='120'>

      <link rel="apple-touch-icon" sizes="180x180" href="./Images/favicon/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="./Images/favicon/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="./Images/favicon/favicon-16x16.png">
      <link rel="manifest" href="./Images/favicon/site.webmanifest">

      <title>admin backoffice</title>
      <link rel="stylesheet" href="../CSS/style.css" type="text/css">
</head>

<body>

      <div class="flux">

            <header>
                  <h1 class="logo"><a class="link_pages" href="home.php"><i>Super</i>Bowl-BET</a></h1>

                  <nav>
                        <ul class="menu">
                              <li class="bold"><a class="link_pages" href="../index.php">Accueil</a></li>
                              <li><a class="link_pages" href="#matchs_management">Gestion matchs</a></li>
                              <li><a class="link_pages" href="#teams_management">Gestion équipes</a></li>
                              <li><a class="link_pages" href="#users_management">Gestion utilisateurs</a></li>
                              <li><a class="link_pages" href="../session_destroy.php">Déconnexion</a></li>
                        </ul>
                  </nav>

            </header>

            <?php

            require_once "../constants/matchs_encours_update.php";
            require_once "../constants/matchs_live.php";
            require_once "../constants/matchs_avenir_update.php";
            require_once "../constants/matchs_over_update.php";
            require_once "../constants/bets_update.php";

            ?>

            <div class="container_bo">
                  
                  <p class="title_form_pad10">Backoffice administrateur</p>

                  <h4 id="matchs_management">Gestion des matchs</h4>

                  <h5>Créer un nouveau match</h5>

                  <form action="new_match.php" method="POST">

                        <div> <label for="match_date">Date du match</label>
                              <input type="date" name="match_date" placeholder="Saisir la date">
                        </div>

                        <div> <label for="start_time">Heure début match</label>
                              <input type="time" name="start_time" placeholder="Saisir l'heure de début">
                        </div>

                        <div> <label for="end_time">Heure fin de match</label>
                              <input type="time" name="end_time" placeholder="Saisir l'heure de fin">
                        </div>

                        <div> <label for="team1_name">Sélectionner Equipe1</label>

                              <select name="team1_name">

                                    <?php
                                    try {

                                          require "../constants/pdo.php";

                                          foreach ($pdo->query('SELECT * FROM teams ORDER BY team_name ASC', PDO::FETCH_ASSOC) as $team) {
                                                $team_name = $team['team_name']; ?>

                                                <option value="<?php echo $team_name; ?>"><?php echo $team_name; ?></option>

                                    <?php }
                                    } catch (PDOException $e) {
                                          echo 'Impossible de se connecter à la base de données';
                                    }
                                    ?>
                              </select>

                        </div>

                        <div> <label for="team2_name">Sélectionner Equipe2</label>

                              <select name="team2_name">
                                    <?php
                                    try {

                                          require "../constants/pdo.php";

                                          foreach ($pdo->query('SELECT * FROM teams ORDER BY team_name ASC', PDO::FETCH_ASSOC) as $team) {
                                                $team_name = $team['team_name']; ?>

                                                <option value="<?php echo $team_name; ?>"><?php echo $team_name; ?></option>

                                    <?php }
                                    } catch (PDOException $e) {
                                          echo 'Impossible de se connecter à la base de données';
                                    }
                                    ?>
                              </select>

                        </div>

                        <input class="button_connexion" type="submit" value="Créer un nouveau match">

                  </form>



                  <h5>Commentaire match</h5>

                  <form action="match_comment.php" method="POST">

                        <select name="date_match_name">

                              <?php
                              try {

                                    require "../constants/pdo.php";

                                    foreach ($pdo->query('SELECT * FROM matchs WHERE admin_status = "open" ORDER BY match_date ASC', PDO::FETCH_ASSOC) as $match_open) {
                                          $date_match_name = $match_open['date_match_name'];

                              ?>

                                          <option value="<?php echo $date_match_name; ?>"><?php echo $date_match_name; ?></option>
                              <?php }
                              } catch (PDOException $e) {
                                    echo 'Impossible de se connecter à la base de données';
                              }
                              ?>
                        </select>

                        <!-- Mettre <br> pour le saut de ligne -->
                        <div> <label for="match_comment"></label>
                              <textarea type="text" name="match_comment" placeholder="Commentaire match"></textarea>
                        </div>

                        <input class="button_connexion" type="submit" value="Valider">
                  </form>

                  <h5>Mise à jour scores matchs en cours</h5>

                  <form action="live_scores.php" method="POST">

                        <select name="date_match_name">

                              <?php
                              try {

                                    require "../constants/pdo.php";

                                    foreach ($pdo->query('SELECT * FROM matchs WHERE match_status = "live" ORDER BY match_date ASC', PDO::FETCH_ASSOC) as $match_live) {
                                          $date_match_name = $match_live['date_match_name'];

                              ?>

                                          <option value="<?php echo $date_match_name; ?>"><?php echo $date_match_name; ?></option>
                              <?php }
                              } catch (PDOException $e) {
                                    echo 'Impossible de se connecter à la base de données';
                              }
                              ?>
                        </select>


                        <div> <label for="team1_score">Score Equipe1</label>
                              <input type="text" name="team1_score" placeholder="Score Equipe1">
                        </div>

                        <div> <label for="team2_score">Score Equipe2</label>
                              <input type="text" name="team2_score" placeholder="Score Equipe2">
                        </div>

                        <input class="button_connexion" type="submit" value="Mettre les scores live à jour">
                  </form>

                  <h5>Mise à jour scores matchs terminés</h5>

                  <form action="final_scores.php" method="POST">

                        <select name="date_match_name">

                              <?php
                              try {

                                    require "../constants/pdo.php";

                                    foreach ($pdo->query('SELECT * FROM matchs WHERE match_status = "terminé" AND admin_status = "open" ORDER BY match_date ASC', PDO::FETCH_ASSOC) as $match_over) {
                                          $date_match_name = $match_over['date_match_name'];

                              ?>

                                          <option value="<?php echo $date_match_name; ?>"><?php echo $date_match_name; ?></option>


                              <?php }
                              } catch (PDOException $e) {
                                    echo 'Impossible de se connecter à la base de données';
                              }
                              ?>

                        </select>

                        <div> <label for="team1_score">Score Equipe1</label>
                              <input type="text" name="team1_score" placeholder="Score Equipe1">
                        </div>

                        <div> <label for="team2_score">Score Equipe2</label>
                              <input type="text" name="team2_score" placeholder="Score Equipe2">
                        </div>

                        <div> <label for="team_winning_name">Equipe Gagnante</label>

                              <select name="team_winning_name">
                                    <?php
                                    try {

                                          require "../constants/pdo.php";

                                          foreach ($pdo->query('SELECT * FROM teams ORDER BY team_name ASC', PDO::FETCH_ASSOC) as $team) {
                                                $match_nul = 'Match nul';
                                                $team_name = $team['team_name']; ?>

                                                <option value="<?php echo $team_name; ?>"><?php echo $team_name; ?></option>

                                    <?php }
                                    } catch (PDOException $e) {
                                          echo 'Impossible de se connecter à la base de données';
                                    }
                                    ?>
                                    <option value="<?php echo $match_nul; ?>"><?php echo $match_nul; ?></option>
                              </select>
                        </div>

                        <input class="button_connexion" type="submit" value="Valider scores finaux">

                  </form>

                  <h4 id="teams_management">Gestion des équipes</h4>

                  <h5>Mise à jour cote globale équipe</h5>

                  <form action="team_odds_update.php" method="POST">

                        <div>
                              <label for="team_name">Sélectionner l'équipe</label>
                              <select name="team_name">

                                    <?php
                                    try {

                                          require "../constants/pdo.php";

                                          foreach ($pdo->query('SELECT * FROM teams ORDER BY team_name ASC', PDO::FETCH_ASSOC) as $team) {
                                                $team_name = $team['team_name']; ?>

                                                <option value="<?php echo $team_name; ?>"><?php echo $team_name; ?></option>

                                    <?php }
                                    } catch (PDOException $e) {
                                          echo 'Impossible de se connecter à la base de données';
                                    }
                                    ?>

                              </select>
                        </div>

                        <div> <label for="team_winning_odds">Nouvelle cote équipe match</label>
                              <input type="text" name="team_winning_odds" placeholder="Nouvelle cote">
                        </div>

                        <div> <input class="button_connexion" type="submit" value="Mettre à jour la cote"> </div>

                  </form>


                  <h5>Mise à jour commentaire Equipe</h5>

                  <form action="team_comment.php" method="POST">

                        <div>
                              <label for="team_name">Sélectionner l'équipe</label>
                              <select name="team_name">

                                    <?php
                                    try {

                                          require "../constants/pdo.php";

                                          foreach ($pdo->query('SELECT * FROM teams ORDER BY team_name ASC', PDO::FETCH_ASSOC) as $team) {
                                                $team_name = $team['team_name']; ?>

                                                <option value="<?php echo $team_name; ?>"><?php echo $team_name; ?></option>

                                    <?php }
                                    } catch (PDOException $e) {
                                          echo 'Impossible de se connecter à la base de données';
                                    }
                                    ?>

                              </select>
                        </div>

                        <div> <label for="comment">Nouveau commentaire équipe</label>
                              <input type="text" name="comment" placeholder="Nouveau commentaire">
                        </div>

                        <div> <input class="button_connexion" type="submit" value="Valider"> </div>

                  </form>

                  <h5>Mise à jour dernière actualité Equipe</h5>

                  <form action="news_update.php" method="POST">

                        <div>
                              <label for="team_name">Sélectionner l'équipe</label>
                              <select name="team_name">

                                    <?php
                                    try {

                                          require "../constants/pdo.php";

                                          foreach ($pdo->query('SELECT * FROM teams ORDER BY team_name ASC', PDO::FETCH_ASSOC) as $team) {
                                                $team_name = $team['team_name']; ?>

                                                <option value="<?php echo $team_name; ?>"><?php echo $team_name; ?></option>

                                    <?php }
                                    } catch (PDOException $e) {
                                          echo 'Impossible de se connecter à la base de données';
                                    }
                                    ?>

                              </select>
                        </div>

                        <div> <label for="latest_news">Nouvelle cote équipe match</label>
                              <input type="text" name="latest_news" placeholder="Dernière actualité">
                        </div>

                        <div> <input class="button_connexion" type="submit" value="Valider"> </div>

                  </form>



                  <h5>Rajouter une nouvelle équipe</h5>

                  <form action="new_team.php" method="POST">

                        <div> <label for="team_name">Nouvelle équipe</label>
                              <input type="text" name="team_name" placeholder="Nom nouvelle équipe">
                        </div>

                        <div> <label for="team_winning_odds">Cote équipe matchs</label>
                              <input type="text" name="team_winning_odds" placeholder="Cote équipe">
                        </div>

                        <div> <label for="player1">Nom joueur 1</label>
                              <input type="text" name="player1" placeholder="Nom joueur 1">
                        </div>

                        <div> <label for="player2">Nom joueur 2</label>
                              <input type="text" name="player2" placeholder="Nom joueur 2">
                        </div>

                        <div> <label for="player3">Nom joueur 3</label>
                              <input type="text" name="player3" placeholder="Nom joueur 3">
                        </div>

                        <div> <label for="player4">Nom joueur 4</label>
                              <input type="text" name="player4" placeholder="Nom joueur 4">
                        </div>

                        <div> <label for="player5">Nom joueur 5</label>
                              <input type="text" name="player5" placeholder="Nom joueur 5">
                        </div>

                        <div> <label for="player6">Nom joueur 6</label>
                              <input type="text" name="player6" placeholder="Nom joueur 6">
                        </div>

                        <div> <label for="player7">Nom joueur7</label>
                              <input type="text" name="player7" placeholder="Nom joueur 7">
                        </div>

                        <div> <label for="player8">Nom joueur 8</label>
                              <input type="text" name="player8" placeholder="Nom joueur 8">
                        </div>

                        <div> <label for="player9">Nom joueur 9</label>
                              <input type="text" name="player9" placeholder="Nom joueur 9">
                        </div>

                        <div> <label for="player10">Nom joueur 10</label>
                              <input type="text" name="player10" placeholder="Nom joueur 10">
                        </div>

                        <div> <label for="player11">Nom joueur 11</label>
                              <input type="text" name="player11" placeholder="Nom joueur 11">
                        </div>

                        <input class="button_connexion" type="submit" value="Rajouter une nouvelle équipe">

                  </form>


                  <h4 id="users_management">Gestion des utilisateurs</h4>

                  <h5>Créer un nouvel utilisateur</h5>

                  <form action="form_admin.php" method="POST">

                        <div> <label for="first_name">Prénom</label>
                              <input type="text" name="first_name" placeholder="Saisir le prénom">
                        </div>

                        <div> <label for="last_name">Nom</label>
                              <input type="text" name="last_name" placeholder="Saisir le nom">
                        </div>

                        <div> <label for="birth_date">Date de naissance</label>
                              <input type="date" name="birth_date" placeholder="Saisir date de naissance">
                        </div>

                        <div> <label for="email">Email</label>
                              <input type="email" name="email" placeholder="Saisir l'email">
                        </div>

                        <div> <label for="password">Mot de passe</label>
                              <input type="text" name="password" placeholder="Saisir mot de passe">
                        </div>

                        <div>
                              <label for="role">Rôle utilisateur</label>
                              <select name="role">
                                    <option value="user">user</option>
                                    <option value="admin">admin</option>
                                    <option value="commentateur">commentateur</option>
                              </select>
                        </div>

                        <div><input class="button_connexion" type="submit" value="Créer le nouvel utilisateur"></div>

                  </form>

                  <h5>Changer le rôle de l'utilisateur</h5>

                  <form action="role_reset_admin.php" method="POST">

                        <div> <label for="first_name">Prénom utilisateur</label>
                              <input type="text" name="first_name" placeholder="Saisir le prénom">
                        </div>

                        <div> <label for="last_name">Nom utilisateur</label>
                              <input type="text" name="last_name" placeholder="Saisir le nom">
                        </div>

                        <div> <label for="email">Email utilisateur</label>
                              <input type="email" name="email" placeholder="Saisir l'email">
                        </div>

                        <div>
                              <label for="role_reset">Nouveau rôle utilisateur</label>
                              <select name="role_reset">
                                    <option value="user">user</option>
                                    <option value="admin">admin</option>
                                    <option value="commentator">commentator</option>
                              </select>
                        </div>

                        <div>
                              <input class="button_connexion" type="submit" value="Changer le rôle">
                        </div>
                  </form>

                  <h5>Changer le mot de passe de l'utilisateur</h5>

                  <form action="password_reset_admin.php" method="POST">

                        <div> <label for="first_name">Prénom utilisateur</label>
                              <input type="text" name="first_name" placeholder="Saisir le prénom">
                        </div>

                        <div> <label for="last_name">Nom utilisateur</label>
                              <input type="text" name="last_name" placeholder="Saisir le nom">
                        </div>

                        <div> <label for="email">Email utilisateur</label>
                              <input type="email" name="email" placeholder="Saisir l'email">
                        </div>

                        <div> <label for="password_reset">Nouveau mot de passe</label>
                              <input type="text" name="password_reset" placeholder="Nouveau mot de passe">
                        </div>

                        <div> </div><input class="button_connexion" type="submit" value="Changer le mot de passe">
            </div>
            </form>
      </div>
      </div>
</body>

</html>