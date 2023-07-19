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
         <h1 class="logo"><a class="link_pages" href="home.php"><strong><i>Super</i>Bowl-BET</strong></a></h1>
         <nav> 
         <ul class="menu">
            <li class="strong"><a class="link_pages" href="home.php">Lives</li>
            <li><a class="link_pages" href="matchs_tocome_user.php">Matchs à venir</li>
            <li><a class="link_pages" href="matchs_over.php">Matchs terminés</li>
            <li><a class="link_pages" href="users_history.php">Mon compte</a></li>
         </ul>
      </nav>
      </header>
   
      <div class="container_connexion">

         <p class="title_form">Mon panier</p>

         <br>
      
      <?php
         $pdo = new PDO('mysql:host=localhost;dbname=superbowl','root', '');
         $statementcount= $pdo->prepare('SELECT COUNT(credit) FROM users_balance');
         $statementcount->execute();
         ?>
         </p>
         <br>

         <div>

         <?php
         
         if (isset($_GET['team1_odds']) && !empty($_GET['team1_odds'])) {
         $team1_odds= $_GET['team1_odds'];
         $team1_name= $_GET['team1_name'];
         $team2_name= $_GET['team2_name'];
         $match_id= $_GET['match_id'];
         $match_date= $_GET['match_date'];
         ?>
         <div>
            <table border="0" width="100%" align="center">
               <tr width="100%">
                  <td width="40%">
                     <?php echo $match_date;?>
                  </td>

                  <td width="30%">
                     Vainqueur : <?php echo $team1_name;?>
                  </td>

                  <td width="30%">
                     Mise
                  </td>
               </tr>

               <tr>
                  <td class="display_teamname">
                     <?php echo $team1_name.' - '.$team2_name;?>
                  </td>

                  <td>
                  <button class="button_bet"><?php echo $team1_odds; ?></button>
                  </form>
                  </td>

                  <td style="padding-top: 5px;">
                  <form action="bet.php" method="POST">
                  <input type="hidden" name="team1_odds" value="<?php echo $team1_odds; ?>">
                  <input type="hidden" name="team1_name" value="<?php echo $team1_name; ?>">
                  <input type="hidden" name="team2_name" value="<?php echo $team2_name; ?>">
                  <input type="hidden" name="match_id" value="<?php echo $match_id; ?>">
                  <input type="hidden" name="match_date" value="<?php echo $match_date; ?>">
                  <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                  <input type="hidden" name="bet_date" value="<?php echo date('Y-m-d');?>">
                  <input type="text" name="team1_bet" style="width: 50px; font-size:12px">
                  <input class="button_bet" type="submit" value="Pariez">
                  </form>
                  </td>

            </tr>
         </table>
      </div>
      <br>
      <?php } 
      
      elseif (isset($_GET['team2_odds']) && !empty($_GET['team2_odds'])) {
         $team2_odds= $_GET['team2_odds'];
         $team1_name= $_GET['team1_name'];
         $team2_name= $_GET['team2_name'];
         $match_id= $_GET['match_id'];
         $match_date= $_GET['match_date'];
         ?>
         <div>
            <table border="0" width="100%" align="center">
               <tr width="100%">
                  <td width="40%">
                     <?php echo $match_date;?>
                  </td>

                  <td width="30%">
                     Vainqueur : <?php echo $team2_name;?>
                  </td>

                  <td width="30%">
                     Mise
                  </td>
               </tr>

               <tr>
                  <td class="display_teamname">
                     <?php echo $team1_name.' - '.$team2_name;?>
                  </td>

                  <td>
                  <button class="button_bet"><?php echo $team2_odds; ?></button>
                  </form>
                  </td>

                  <td style="padding-top: 5px;">
                  <form action="bet.php" method="POST">
                  <input type="hidden" name="team2_odds" value="<?php echo $team2_odds; ?>">
                  <input type="hidden" name="team1_name" value="<?php echo $team1_name; ?>">
                  <input type="hidden" name="team2_name" value="<?php echo $team2_name; ?>">
                  <input type="hidden" name="match_id" value="<?php echo $match_id; ?>">
                  <input type="hidden" name="match_date" value="<?php echo $match_date; ?>">
                  <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                  <input type="hidden" name="bet_date" value="<?php echo date('Y-m-d');?>">
                  <input type="text" name="team2_bet" style="width: 50px; font-size:12px">
                  <input class="button_bet" type="submit" value="Pariez">
                  </form>
                  </td>

            </tr>
         </table>
      </div>
      <br>
      <?php }
      
      elseif (isset($_GET['draw_odds']) && !empty($_GET['draw_odds'])) {
         $draw_odds= $_GET['draw_odds'];
         $team1_name= $_GET['team1_name'];
         $team2_name= $_GET['team2_name'];
         $match_id= $_GET['match_id'];
         $match_date= $_GET['match_date'];
         ?>
         <div>
            <table border="0" width="100%" align="center">
               <tr width="100%">
                  <td width="40%">
                     <?php echo $match_date;?>
                  </td>

                  <td width="30%">
                     Vainqueur : Match nul
                  </td>

                  <td width="30%">
                     Mise
                  </td>
               </tr>

               <tr>
                  <td class="display_teamname">
                     <?php echo $team1_name.' - '.$team2_name;?>
                  </td>

                  <td>
                  <button class="button_bet"><?php echo $draw_odds; ?></button>
                  </form>
                  </td>

                  <td style="padding-top: 5px;">
                  <form action="bet.php" method="POST">
                  <input type="hidden" name="draw_odds" value="<?php echo $draw_odds; ?>">
                  <input type="hidden" name="team1_name" value="<?php echo $team1_name; ?>">
                  <input type="hidden" name="team2_name" value="<?php echo $team2_name; ?>">
                  <input type="hidden" name="match_id" value="<?php echo $match_id; ?>">
                  <input type="hidden" name="match_date" value="<?php echo $match_date; ?>">
                  <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                  <input type="hidden" name="bet_date" value="<?php echo date('Y-m-d');?>">
                  <input type="text" name="draw_bet" style="width: 50px; font-size:12px">
                  <input class="button_bet" type="submit" value="Pariez">
                  </form>
                  </td>

            </tr>
         </table>
      </div>
      <br>
      <?php }
      

      ?>
      
      </div>
      </div>
      </body>

      <footer>
      <p>Jouer comporte des risques</p>
      Mentions légales / © Copyright 2023 - Stania.com / Contact
   </footer>
   
</html>