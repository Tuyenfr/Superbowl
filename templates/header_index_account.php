
<html lang="fr">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="apple-touch-icon" sizes="180x180" href="./Images/favicon/apple-touch-icon.png">
   <link rel="icon" type="image/png" sizes="32x32" href="./Images/favicon/favicon-32x32.png">
   <link rel="icon" type="image/png" sizes="16x16" href="./Images/favicon/favicon-16x16.png">
   <link rel="manifest" href="./Images/favicon/site.webmanifest">
   
   <title>Connexion</title>
   <link rel="stylesheet" href="./CSS/style.css" type="text/css">
</head>

<body>
   <div class="flux">
      <header>
         <p class="logo"><a class="link_pages" href="index.php"><i>Super</i>Bowl-BET</a></p>

         <nav>
            <ul class="menu">
            <?php $page = $_SERVER['SCRIPT_NAME'];?>
               <li class="<?php if (basename($page) == "index.php") {echo 'bold';} ?>"><a class="link_pages" href="index.php">Lives</a></li>
               <li class="<?php if (basename($page) == "matchs_tocome.php") {echo 'bold';} ?>"><a class="link_pages" href="matchs_tocome.php">Matchs à venir</a></li>
               <li class="<?php if (basename($page) == "matchs_over.php") {echo 'bold';} ?>"><a class="link_pages" href="matchs_over.php">Matchs terminés</a></li>
               <li class="<?php if (basename($page) == "index.php") {echo 'bold';} ?>"><a class="link_pages" href="index.php">Mon compte</a></li>
            </ul>
         </nav>
      </header>