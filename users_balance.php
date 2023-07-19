<?php
session_start();
?>

<html>
   
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>user balance</title>
      <link rel="stylesheet" href="./CSS/style.css" type="text/css">
   </head>

   <body>
   <div class="flux">
      <header>
         <h1 class="logo"><a class="link_pages" href="home.php"><strong><i>Super</i>Bowl-BET</strong></a></h1>

         <nav> 
         <ul class="menu">
            <li><a class="link_pages" href="home.php">Accueil</li>
            <li><a class="link_pages" href="users_history.php">Mes paris</li>
            <li class="strong"><a class="link_pages" href="users_balance.php">Mon solde</li>
            <li><a class="link_pages" href="users_info.php">Mes infos personnelles</a></li>
            <li><a class="link_pages" href="session_destroy.php">Déconnexion</a></li>
         </ul>
      </nav>

      </header>
   
      <div class="container_connexion">

      <p class="title_form"> Mon solde</p>

      <div align="center" style="font-size: smaller; color: cadetblue; font-weight:bold">

      <?php

      try {

      if(isset($_SESSION['user'])) {
      $user_id = $_SESSION['user_id'];
         }

      $pdo = new PDO('mysql:host=localhost;dbname=superbowl','root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $balance = $pdo->prepare('SELECT user_balance FROM users_balance WHERE user_id = :user_id');
      $balance->bindValue(':user_id', $user_id);
      if ($balance->execute()) {
            $user_balance = $balance->fetchColumn();
            echo 'Votre solde actuel est de : '.$user_balance.' euros';
      }

      } catch (PDOException $e) {
         echo 'Impossible de se connecter à la base de données';}

         ?>
      </div>

      <br>

      <table border="0" width="100%" align="center" style="font-weight: bold; color: rgb(70, 73, 75)">
            <tr>
               <td width="20%">Date</td>
               <td width="20%">Type transaction</td>
               <td width="20%">Credit</td>
               <td width="20%">Debit</td>
               <td width="20%">Solde</td>
            </tr>
      </table>

      <?php

      try {

         if(isset($_SESSION['user'])) {
            $user_id = $_SESSION['user_id'];
         }

      $pdo = new PDO('mysql:host=localhost;dbname=superbowl','root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          foreach ($pdo->query('SELECT * FROM users_balance WHERE user_id = '.$user_id.' ORDER BY transaction_id DESC', PDO::FETCH_ASSOC) as $transaction) 
         {
            $transactiondate = $transaction['transaction_date'];
            $transactiondateUS = date_create_from_format('Y-m-d', $transactiondate);
            $transactiondateFR = date_format($transactiondateUS, 'd-m-Y');

            ?>

         <table border="0" width="100%" align="center">
            <tr>
               <td width="20%"><?php echo $transactiondateFR; ?></td>
               <td width="20%"><?php echo $transaction['transaction_description']; ?></td>
               <td width="20%"><?php echo $transaction['credit']; ?></td>
               <td width="20%"><?php echo ' - '.$transaction['debit']; ?></td>
               <td width="20%"><?php echo $transaction['user_balance']; ?></td>
         </tr>
         </table>
      <?php } 
      
      } catch (PDOException $e) {
         echo 'Impossible de se connecter à la base de données';
      }

      ?>
      </div>
   </div>
   </body>
</html>