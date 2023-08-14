<?php
session_start();
?>

<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>SuperBowl-BET</title>
      <link rel="stylesheet" href="./CSS/style.css" type="text/css">
   </head>

   <body>
   <div class="flux">
      <header>
         <p class="logo"><a class="link_pages" href="home.php"><i>Super</i>Bowl-BET</a></p>
      <nav> 
         <ul class="menu">
            <li class="strong"><a class="link_pages" href="home.php">Lives</a></li>
            <li><a class="link_pages" href="matchs_tocome_user.php">Matchs à venir</a></li>
            <li><a class="link_pages" href="matchs_over_user.php">Matchs terminés</a></li>
            <li><a class="link_pages" href="users_history.php">Mon compte</a></li>
         </ul>
      </nav>
      </header>
      <br>

      <section class="container_matchs">

      <div class="aside_left">

      <?php include_once "./templates/aside_left_content.php"; ?>

      </div>
      
      <div class="table_equipe">

         <div class="sous_table">
      
      <h4> Matchs à venir</h4>

      <!-- require "./constants/matchs_live.php"; -->
   
      <?php
      
      require "./constants/matchs_encours_update.php";
      require "./constants/matchs_avenir_update.php";
      require "./constants/matchs_over_update.php";

      try{
      $pdo = new PDO('mysql:host=localhost;dbname=superbowl', username: "root", password: "");
      foreach ($pdo->query('SELECT * FROM matchs WHERE match_status = "à venir" ORDER BY match_date ASC, start_time ASC', PDO::FETCH_ASSOC) as $match_name)
      {
         $date =  $match_name['match_date'];
         $dateUS = DateTime::createFromFormat('Y-m-d', $date);
         $dateUSfull = date_format($dateUS, 'l d F Y');
         $dateFRday= str_replace (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'], ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'], $dateUSfull);
         $match_dateFR = str_replace (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'], ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'], $dateFRday);
      
      ?>

      <div>
         <table width="100%">
            <tr>
               <td class="display_td_notover" width="100%">
                  <?php echo $match_dateFR. ' - ' .'Match'.' '.$match_name['match_status'];?>
               </td>
            </tr>

            <tr>
               <td class="display_td" width="100%">
                  <?php echo substr($match_name['start_time'], 0, -3). ' - ' .substr($match_name['end_time'], 0, -3);?>
               </td>
            </tr>
         </table>
      </div>   
      
      <div>
         <table width="100%">
            <tr>
               <td class="display_teamname" width="48%">
               <?php echo $match_name['team1_name'];?>
               </td>

               <td class="display_teamname" width="4%">
               /
               </td>

               <td class="display_teamname" width="48%">
               <?php echo $match_name['team2_name'];?>
               </td>
            </tr>
      
            <tr>
            <td class="display_betnumber" width="48%">
               1
               </form>
            </td>

            <td class="display_betnumber" width="4%">
               N
               </form>
            </td>

            <td class="display_betnumber" width="48%">
               2
               </form>
            </td>
            </tr>

         <tr>
         <td align="center" width="48%">
            <form action="cart.php" method="GET">
            <input type="hidden" name="team1_odds" value="<?php echo $match_name['team1_odds']; ?>">
            <input type="hidden" name="team1_name" value="<?php echo $match_name['team1_name']; ?>">
            <input type="hidden" name="team2_name" value="<?php echo $match_name['team2_name']; ?>">
            <input type="hidden" name="match_id" value="<?php echo $match_name['match_id']; ?>">
            <input type="hidden" name="match_date" value="<?php echo $match_name['match_date']; ?>">
            <input class="button_bet" type="submit" value="<?php echo $match_name['team1_odds']; ?>">
            </form>
            </td>

            <td align="center" width="4%">
            <form action="cart.php" method="GET">
            <input type="hidden" name="draw_odds" value="<?php echo $match_name['draw_odds']; ?>">
            <input type="hidden" name="team1_name" value="<?php echo $match_name['team1_name']; ?>">
            <input type="hidden" name="team2_name" value="<?php echo $match_name['team2_name']; ?>">
            <input type="hidden" name="match_id" value="<?php echo $match_name['match_id']; ?>">
            <input type="hidden" name="match_date" value="<?php echo $match_name['match_date']; ?>">
            <input class="button_bet" type="submit" value="<?php echo $match_name['draw_odds']; ?>">
            </form>
            </td>

            <td align="center" width="48%">
            <form action="cart.php" method="GET">
            <input type="hidden" name="team2_odds" value="<?php echo $match_name['team2_odds']; ?>">
            <input type="hidden" name="team1_name" value="<?php echo $match_name['team1_name']; ?>">
            <input type="hidden" name="team2_name" value="<?php echo $match_name['team2_name']; ?>">
            <input type="hidden" name="match_id" value="<?php echo $match_name['match_id']; ?>">
            <input type="hidden" name="match_date" value="<?php echo $match_name['match_date']; ?>">
            <input class="button_bet" type="submit" value="<?php echo $match_name['team2_odds']; ?>">
            </form>
            </td>  
         </tr>
      </table>
   </div>

   <div>
         <a href="#<?php echo $match_name['match_name'];?>" class="link_comment">Commentaires match</a>
         <div id="<?php echo $match_name['match_name'];?>" class="modal">
            <div class="modal_content"><?php echo $match_name['match_comment'];?></div>
            <a href="#" class="modal_close">x</a>
         </div>
   </div>

   <br>
   <br>
   <?php }            
   }catch (PDOException $e) {
      echo 'pb de connexion';
      }
   ?>


         </div>
      </div>

      <div class="aside_right">

      <?php include_once "./templates/aside_right_content.php"; ?>

      </div>

      </section>
   
      <?php require_once "./templates/footer.php"; ?>
      
      </div>
   </body>
</html>