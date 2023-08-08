<?php
session_start();
?>

<html>
   
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>user info</title>
      <link rel="stylesheet" href="./CSS/style.css" type="text/css">
   </head>

   <body>
   <div class="flux">
      <header>
         <p class="logo"><a class="link_pages" href="home.php"><strong><i>Super</i>Bowl-BET</strong></a></p>

         <nav> 
         <ul class="menu">
            <li><a class="link_pages" href="home.php">Accueil</li>
            <li><a class="link_pages" href="users_history.php">Mes paris</li>
            <li><a class="link_pages" href="users_balance.php">Mon solde</li>
            <li class="strong"><a class="link_pages" href="users_info.php">Mes infos personnelles</a></li>
            <li><a class="link_pages" href="session_destroy.php">Déconnexion</a></li>
         </ul>
      </nav>

      </header>
   
      <div class="container_connexion">

      <p class="title_form"> Mes informations personnelles</p>
      <br>

      <?php

      try {

         if(isset($_SESSION['user'])) {
            $user_id = $_SESSION['user_id'];
            }

      $pdo = new PDO('mysql:host=localhost;dbname=superbowl','root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         foreach ($pdo->query('SELECT * FROM users WHERE user_id = '.$user_id.'', PDO::FETCH_ASSOC) as $user_info) {
            
            $birthdate = $user_info['birth_date'];
            $birthdateUS = date_create_from_format('Y-m-d', $birthdate);
            $birthdateFR = date_format($birthdateUS, 'd-m-Y');
            
            ?>

         <table border="0" width="100%">
            <tr class="display_info">
               <td width="20%">Email de connexion :</td>
               <td width="20%"><?php echo $user_info['email']; ?></td>
               <td width="50%">
                  <form action="new_email.php" method="POST">
                     <input type="email" name="new_email" placeholder="Changer mon email">
                     <input type="submit" class="button_connexion" value="Changer mon email">
                  </form>
               </td>
            </tr>
            <tr class="display_info">
               <td>Date de naissance :</td>

               <td><?php echo $birthdateFR; ?></td>
               <td>
                  <form action="new_birthdate.php" method="POST"> 
                     <input type="date" name="new_birthdate" placeholder="Nouvelle date de naissance">
                     <input type="submit" class="button_connexion"  value="Changer ma date de naissance">
                  </form>
               </td>
            </tr>
            <tr class="display_info">
               <td>Mot de passe :</td>
               <td><button style="border: none">********</button></td>
               <td>
                  <form action="new_password.php" method="POST"> 
                     <input type="text" name="new_password" placeholder="Nouveau mot de passe">
                     <input class="button_connexion" type="submit" value="Changer mon mot de passe">
                  </form>
               </td>
            </tr>
         </table>
      <?php } 
      
      } catch (PDOException $e) {
         echo 'Impossible de se connecter à la base de données';
      }

      ?>
      </div>

      <footer>
      <p>Jouer comporte des risques</p>
      Mentions légales / © Copyright 2023 - Stania.com / Contact
      </footer>

      </div>
   </body>
</html>