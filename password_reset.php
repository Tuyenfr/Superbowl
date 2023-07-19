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
         <h1 class="logo"><a class="link_pages" href="index.php"><strong><i>Super</i>Bowl-BET</strong></a></h1>
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
   </div>
   </body>

   <footer>
      <p>Jouer comporte des risques</p>
      Mentions légales / © Copyright 2023 - Stania.com / Contact
   </footer>
   
</html>