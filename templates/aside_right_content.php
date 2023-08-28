<p align="center" style="font-size: 14px">
  <?php
  if (isset($_SESSION['user'])) {
    echo 'Bienvenue ' . $_SESSION['first_name'] . ' ! ';
  }
  ?>
</p>

<p class="aside_right_card1">Solde actuel :

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
</p>

<p class="aside_right_card2">Paris en cours :

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

</p>
