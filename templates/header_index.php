<?php
session_start();
?>

<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv='refresh' content='60'>
   <title>SuperBowl-BET - Pari en ligne</title>
   <link rel="stylesheet" href="./CSS/style.css" type="text/css">
</head>

<body>

   <div class="flux">

      <header>
         <p class="logo"><a class="link_pages" href="index.php"><i>Super</i>Bowl-BET</a></p>

         <nav>
            <ul class="menu">
               <?php $page = $_SERVER['PHP_SELF'];?>
               <li class="<?php if (basename($page) == "index.php") {echo 'bold';} ?>"><a class="link_pages" href="index.php">Lives</a></li>
               <li class="<?php if (basename($page) == "matchs_tocome.php") {echo 'bold';} ?>"><a class="link_pages" href="matchs_tocome.php">Matchs à venir</a></li>
               <li class="<?php if (basename($page) == "matchs_over.php") {echo 'bold';} ?>"><a class="link_pages" href="matchs_over.php">Matchs terminés</a></li>
               <li class="<?php if (basename($page) == "about_superbowl.php") {echo 'bold';} ?>"><a class="link_pages" href="about_superbowl.php">A propos du Super Bowl</a></li>
               <li class="<?php if (basename($page) == "connexion.php") {echo 'bold';} ?>"><a class="link_pages" href="connexion.php" target="_blank">Connexion</a></li>
            </ul>
         </nav>
      </header>
      <br>
      <br>