<?php
session_start();
?>

<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about super bowl</title>
   <link rel="stylesheet" href="../CSS/style.css" type="text/css">
</head>

<body>

   <div class="flux">

      <header>
         <p class="logo"><a class="link_pages" href="home.php"><i>Super</i>Bowl-BET</a></p>

         <nav>
            <ul class="menu">
               <li><a class="link_pages" href=".user/home.php">Accueil</a></li>
               <li><a class="link_pages" href="#superbowl_history">Histoire du Super Bowl</a></li>
               <li><a class="link_pages" href="#superbowl_news">Actualités du Super Bowl</a></li>
               <li><a class="link_pages" href="#superbowl_results">Résultats antérieurs du Super Bowl</a></li>
            </ul>
         </nav>

      </header>

      <div class="container_about">

         <p class="title_form">A propos du Super Bowl</p>

         <h4 id="superbowl_history">Histoire du Super Bowl</h4>

         <div class="text_superbowl">
            <p>
               Le Super Bowl est la finale du championnat organisé par la National Football League (NFL), ligue américaine de football américain. Conclusion des séries éliminatoires, il oppose les vainqueurs des deux conférences de la ligue, l'American Football Conference (AFC) et la National Football Conference (NFC). Le match clôt une saison d'envirion cinq mois, allant de septembre à février.
            </p>

            <p>
               La rencontre a été créée à la suite de la fusion entre les lignes NFL et AFL au milieu des années 1960. Les deux championnats se sont mis d'accord pour que leurs champions respectifs s'affrontent lors d'une finale afin de déterminer le champion des Etats-Unis. La fusion est officielle en 1970 et, si chaque ligue est renommée en conférence, le match reste dans la NFL comme la rencontre qui détermine le champion de la saison.
            </p>

            <p>
               Les franchises les plus victorieuses du Super Bowl sont les Steelers de Pittsburgh et les Patriots de la Nouvelle-Angleterre avec 6 victoires.
            </p>

            <p>
               Le Super Bowl est <strong>l'événement sportif le plus regardé à la télévision aux Etats-Unis</strong>, et l'un des événéments sportifs les plus suivis au monde. Les chaînes de télévision profitent de la rencontre pour vendre des spots publicitaires à des prix records.
            </p>

         </div>

         <h4 id="superbowl_news">Actualités du Super Bowl</h4>

         <p class="text_superbowl">
            Le Super Bowl 2024 se déroulera le 11 février au Allegiant Stadium de Paradise, dans l'Etat du Nevada. Après Katy Perry, Bruno Mars, ou encore Rihanna, qui se produira lors de mi-temps du match ? Les paris sont lancés.
         </p>

         <h4 id="superbowl_results">Résultats antérieurs</h4>

         <p class="text_superbowl">A compléter</p>
         <p class="text_superbowl">A compléter</p>
         <p class="text_superbowl">A compléter</p>
         <p class="text_superbowl">A compléter</p>

      </div>

      <?php require_once "../templates/footer.php"; ?>

   </div>
</body>

</html>