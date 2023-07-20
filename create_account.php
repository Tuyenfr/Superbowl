<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Create account</title>
      <link rel="stylesheet" href="./CSS/style.css" type="text/css">
   </head>
   <body>
   <div class="flux">
   <header>
      <p class="logo"><a class="link_pages" href="index.php"><strong><i>Super</i>Bowl-BET</strong></a></p>
      <nav> 
         <ul class="menu">
            <li class="strong"><a class="link_pages" href="index.php">Lives</a></li>
            <li><a class="link_pages" href="matchs_tocome.php">Matchs à venir</a></li>
            <li><a class="link_pages" href="matchs_over.php">Matchs terminés</a></li>
            <li><a class="link_pages" href="index.php">Mon compte</a></li>
         </ul>
      </nav>

   </header>
      <div class="container_connexion">
         <p class="title_form">Création de compte</p>
            <div class="container_form">
               <form action="form.php" method="POST">
                  <div>
                     <label for="first_name">Votre prénom : </label>
                     <input type="text" name="first_name" placeholder="Saisissez votre prénom" required>
                  </div>
                  <br>
                  <div>
                     <label for="last_name">Votre nom : </label>
                     <input type="text" name="last_name" placeholder="Saisissez votre nom" required>
                  </div>
                  <br>
                  <div>
                     <label for="birth_date">Votre date de naissance : </label>
                     <input type="date" name="birth_date" placeholder="Saisissez votre date de naissance" required>
                  </div>
                  <br>
                  <div>
                     <label for="email">Votre email : </label>
                     <input type="email" name="email" placeholder="Saisissez votre email" required>
                  </div>
                  <br>
                  <div>
                     <label for="password">Votre mot de passe : </label>
                     <input type="password" name="password" placeholder="Entrez votre mot de passe" required>
                  </div>
                  <br>
                  <div>
                     <input class="button_connexion" type="submit" value="Créer mon compte">
                  </div>  
               </form>
            </div>
      </div>
   </div>
   </body>

   <footer>
      <p>Jouer comporte des risques</p>
      Mentions légales / © Copyright 2023 - Stania.com / Contact
   </footer>

   </html>