<?php
session_start();
?>

<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cart</title>
   <link rel="stylesheet" href="./CSS/style.css" type="text/css">
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

         $bet_match_id = $POST['match_id'];
         $bet_team = $POST['bet_team'];
         $bet_team1 = $POST['bet_team1'];
         $bet_draw = $POST['bet_draw'];
         $bet_team2 = $POST['bet_team2'];
         $bet_maintain = $POST['maintain_mybet'];
         $bet_update = $POST['update_mybet'];

         if (isset($bet_maintain)) {
            header("location:home.php");
         } else {
            echo "Mettre à jour mon pari : $bet_team1 -  $bet_team2";
            echo '<br>';
            echo "Equipe gagnante actuelle : $bet_team";
            echo '<br>';
               if ($bet_team1 != 0) {
               echo "Mise actuelle : $bet_team1";
               }
               elseif ($bet_draw != 0) {
                  echo "Mise actuelle : $bet_draw";
                  }
                  elseif ($bet_team2 != 0) {
                     echo "Mise actuelle : $bet_team2";
                     } ?>
                     <form method="POST" action="bet_user_update_confirmation.php">

                     <label for="confirm_winning_team">Confirmez le choix de l'équipe gagnante</label>
                     <Select name="confirm_winning_team">
                        <option value="<?= $bet_team1;?>"><?= $bet_team1;?></option>
                        <option value="<?= $bet_team2;?>"><?= $bet_team2;?></option>
                     <br>

                     </form>


         <?php }

         ?>

      </div>
   </div>
</body>

</html>