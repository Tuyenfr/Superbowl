<?php
session_start();
?>

<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv='refresh' content='60'>
   <title>SuperBowl-BET - Pari en ligne</title>
   <link rel="stylesheet" href="../CSS/style.css" type="text/css">
</head>

<body>
   <div class="flux">
      <header>
         <p class="logo"><a class="link_pages" href="home.php"><i>Super</i>Bowl-BET</a></p>
         <nav>
            <ul class="menu">
            <?php $page = $_SERVER['SCRIPT_NAME'];?>
               <li class="<?php if (basename($page) == "home_nextp.php") {echo 'bold';} ?>"><a class="link_pages" href="home.php">Lives</a></li>
               <li class="<?php if (basename($page) == "matchs_tocome_user.php") {echo 'bold';} ?>"><a class="link_pages" href="matchs_tocome_user.php">Matchs à venir</a></li>
               <li class="<?php if (basename($page) == "matchs_over_user.php") {echo 'bold';} ?>"><a class="link_pages" href="matchs_over_user.php">Matchs terminés</a></li>
               <li class="<?php if (basename($page) == "users_history.php") {echo 'bold';} ?>"><a class="link_pages" href="users_history.php">Mon compte</a></li>
            </ul>
         </nav>
      </header>
      <br>