<p align="center" style="font-size: 14px">
  <?php
  if (isset($_SESSION['user'])) {
    echo 'Bienvenue ' . $_SESSION['first_name'] . ' ! ';
  }
  ?>
</p>

<div class="aside_right_card1">
  <div>Solde actuel :

    <?php

    try {

      if (isset($_SESSION['user'])) {
        $user_id = $_SESSION['user_id'];
      }

      $pdo = new PDO('mysql:host=localhost;dbname=superbowl', 'root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $balance = $pdo->prepare('SELECT user_balance FROM users WHERE user_id = :user_id');
      $balance->bindValue(':user_id', $user_id);
      if ($balance->execute()) {
        $user_balance = $balance->fetchColumn();
        echo $user_balance . ' €';
      }
    } catch (PDOException $e) {
      echo 'Impossible de se connecter à la base de données';
    }

    ?>
  </div>
  
  <a class="link_aside_right" href="../user/user_balance.php">Voir détails</a>

  ________________
  <br>
  <br>
  <div>Pari(s) en cours :

    <?php

    try {

      if (isset($_SESSION['user'])) {
        $user_id = $_SESSION['user_id'];
      }

      $pdo = new PDO('mysql:host=localhost;dbname=superbowl', 'root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $bets = $pdo->prepare('SELECT * FROM bets WHERE user_id = :user_id AND bet_status = "En cours"');
      $bets->bindValue(':user_id', $user_id);
      if ($bets->execute()) {
        $bets_nr = $bets->fetchAll();
        $count = count($bets_nr);
        echo $count;
      }
    } catch (PDOException $e) {
      echo 'Impossible de se connecter à la base de données';
    }

    ?>
  </div>

  <a class="link_aside_right" href="../user/user_history.php">Voir détails</a>

</div>

<div class="aside_right_videos" style="text-align: center; font-size: 14px">
  <p>Vidéos</p>
  <a href="https://www.youtube.com/watch?v=HjBo--1n8lI" target="_blank"><img width="95%" src="../Images/Rihanna.jpeg" alt="photo Rihanna"></a>
  <div style="font-size: 12px; font-style: italic">Cérémonie d'ouverture 2023 par Rihanna</div>
</div>

<div class="aside_right_videos" style="text-align: center; font-size: 14px">
  <p>Articles</p>
  <a href="https://frenchdistrict.com/articles/super-bowl-finale-sport-us-football-americain/" target="_blank"><img width="95%" src="../Images/article-foot-americain.png" alt="photo Rihanna"></a>
  <div style="font-size: 12px; font-style: italic">Tout savoir sur le Super Bowl</div>

  <br>
  <a href="https://www.france24.com/fr/info-en-continu/20230213-%F0%9F%94%B4-football-am%C3%A9ricain-les-chiefs-remportent-le-super-bowl-aux-d%C3%A9pens-des-eagles" target="_blank"><img width="95%" src="../Images/finale-LVII.webp" alt="finale Super Bowl 2023"></a>
  <div style="font-size: 12px; font-style: italic">Victoire des Chiefs de Kansas City</div>
</div>