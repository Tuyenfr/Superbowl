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

         $bet_match_id = $_POST['match_id'];
         $bet_team = $_POST['bet_team'];
         $bet_team1_name = $_POST['bet_team1_name'];
         $bet_team2_name = $_POST['bet_team2_name'];
         $bet_team1_odds = $_POST['bet_team1_odds'];
         $bet_team2_odds = $_POST['bet_team2_odds'];
         $bet_draw_odds = $_POST['bet_draw_odds'];
         $bet_team1 = $_POST['bet_team1'];
         $bet_draw = $_POST['bet_draw'];
         $bet_team2 = $_POST['bet_team2'];
         $bet_keepcurrentbet = $_POST['keepcurrentbet'];

         if ($bet_keepcurrentbet === "Oui") {
            header("location:home.php");
         } else {
            echo 'Mettre à jour mon pari : '.$bet_team1_name.' - '.$bet_team2_name;
            echo '<br>';
            echo 'Equipe gagnante actuelle : '.$bet_team;
            echo '<br>';
               if ($bet_team1 != 0) {
               echo 'Mise actuelle : '.$bet_team1;
               }
               elseif ($bet_draw != 0) {
                  echo 'Mise actuelle : '.$bet_draw;
                  }
                  elseif ($bet_team2 != 0) {
                     echo 'Mise actuelle : '.$bet_team2;
                     } ?>

                     <div>
                        <table width="100%">
                           <tr>
                              <td class="display_teamname" width="48%">
                                 <?php echo $bet_team1_name; ?>
                              </td>

                              <td class="display_teamname" width="4%">
                                 /
                              </td>

                              <td class="display_teamname" width="48%">
                                 <?php echo $bet_team2_name; ?>
                              </td>
                           </tr>

                           <tr>
                              <td class="display_betnumber" width="48%">
                                 1
                              </td>

                              <td class="display_betnumber" width="4%">
                                 N
                              </td>

                              <td class="display_betnumber" width="48%">
                                 2
                              </td>
                           </tr>

                           <tr>
                              <td align="center" width="48%">
                                 <a href="connexion.php"><button class="button_bet"><?php echo $bet_team1_odds; ?></button></a>
                              </td>

                              <td align="center" width="4%">
                                 <a href="connexion.php"><button class="button_bet"><?php echo $bet_draw_odds; ?></button></a>
                              </td>

                              <td align="center" width="48%">
                                 <a href="connexion.php"><button class="button_bet"><?php echo $bet_team2_odds; ?></button></a>
                              </td>
                           </tr>

                        </table>
                     </div>

                     <div>
                     <form method="POST" action="bet_update_confirmation.php">

                     <label class="label_bet_update" for="confirm_winning_team">Confirmez le choix de l'équipe gagnante</label>
                     <Select name="confirm_winning_team">
                        <option value="<?php echo $bet_team1_name;?>"><?php echo $bet_team1_name;?></option>
                        <option value="<?php echo $bet_team2_name;?>"><?php echo $bet_team2_name;?></option>
                     <br>

                     <label class="label_bet_update" for="new_bet">Confirmez la nouvelle mise</label>
                     <input type="text" name="new_bet" placeholder="Nouvelle mise">
                     <br>

                     <input type="hidden" name="match_id" value="<?php echo $bet_match_id; ?>">
                     <!-- RAJOUTER COTE EN COURS -->
                     <input type="submit" class="button_connexion" value="Valider et annuler mise précédente">

                     </form>
                     </div>
         <?php }

         ?>

      </div>
   </div>
</body>

</html>