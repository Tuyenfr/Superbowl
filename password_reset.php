<?php
session_start();
?>

<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Password reset</title>
   <link rel="stylesheet" href="./CSS/style.css" type="text/css">
</head>

<body>
   <div class="flux">
      <header>
         <p class="logo"><a class="link_pages" href="index.php"><i>Super</i>Bowl-BET</a></p>

         <nav>
            <ul class="menu">
               <li><a class="link_pages" href="index.php">Lives</li>
               <li><a class="link_pages" href="matchs_tocome.php">Matchs à venir</li>
               <li><a class="link_pages" href="matchs_over.php">Matchs terminés</li>
               <li class="bold"><a class="link_pages" href="connexion.php" target="_blank">Connexion</a></li>
            </ul>
         </nav>

      </header>

      <div class="container_connexion">

         <p class="title_form">Ré-initialiser mon mot de passe</p>
         <br>

         <td>
            <form action="new_password_reset.php" method="POST">
               <div>
                  <label for="email">Votre email</label>
                  <input type="email" name="email" placeholder="Saississez mon email">
               </div>
               <br>
               <div>
                  <label for="birth_date">Votre date de naissance</label>
                  <input type="date" name="birth_date" placeholder="Saississez votre date de naissance">
               </div>
               <br>
               <div>
                  <label for="password_reset">Saisissez votre nouveau mot de passe</label>
                  <input type="text" name="password_reset" placeholder="Nouveau mot de passe">
               </div>
               <br>
               <div>
                  <input type="submit" class="button_connexion" value="Ré-initialiser">
               </div>
            </form>
         </td>
         </tr>

         </table>

      </div>

      <?php require_once "./templates/footer.php"; ?>
