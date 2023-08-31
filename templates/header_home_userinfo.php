<?php
session_start();
?>

<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
               <li class="<?php if (basename($page) == "home.php") {echo 'bold';} ?>"><a class="link_pages" href="home.php">Accueil</li>
               <li class="<?php if (basename($page) == "user_history.php") {echo 'bold';} ?>"><a class="link_pages" href="user_history.php">Mes paris</li>
               <li class="<?php if (basename($page) == "user_balance.php") {echo 'bold';} ?>"><a class="link_pages" href="user_balance.php">Mon solde</li>
               <li class="<?php if (basename($page) == "user_info.php") {echo 'bold';} ?>"><a class="link_pages" href="user_info.php">Mes infos personnelles</a></li>
               <li ><a class="link_pages" href="../session_destroy.php">Déconnexion</a></li>
            </ul>
         </nav>
      </header>