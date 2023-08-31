<?php require_once "./templates/header_index.php"; ?>

      <div class="container_connexion">
      
         <p class="title_form_pad40">Formulaire de connexion</p>
         <div class="container_form">
            <form action="authentification.php" method="POST">
               <div>
                  <label for="email">Votre email : </label>
                  <input type="email" name="email" placeholder="Saisissez votre email" required>
               </div>
               <br>
               <div>
                  <label for="birth_date">Votre âge de naissance : </label>
                  <input type="date" name="birth_date" placeholder="Saisissez votre âge de naissance" required>
               </div>
               <br>
               <div>
                  <label for="password">Mot de passe : </label>
                  <input type="password" name="password" placeholder="Entrez votre mot de passe" required>
               </div>
               <br>
               <div class="buttons_connexionform">
                  <div>
                     <input class="button_connexion" type="submit" value="Se connecter">
                  </div>
                  <div>
                     <a class="email_forgottenpassword" href="password_reset.php"><i>Mot de passe oublié</i></a>
                  </div>
               </div>
            </form>
         </div>
         <div class="container_newuser">
            <p><i>Vous n'avez pas encore de compte ? Cliquer ici pour vous enregistrez :</i></p>
            <p><button><a class="email_newaccount" href="create_account.php"> Créer mon compte</a></button></p>
         </div>
      </div>

      <?php require_once "./templates/footer.php"; ?>
