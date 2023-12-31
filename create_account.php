<?php require_once "./templates/header_index_account.php"; ?>

      <div class="container_connexion">
         
         <p class="title_form_pad40">Création de compte</p>
         
         <div class="container_form">
            
            <form action="create_account_output.php" method="POST">
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

      <?php require_once "./templates/footer.php"; ?>
