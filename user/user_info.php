<?php require_once "../templates/header_home_userinfo.php"; ?>

      <div class="container_connexion">

         <p class="title_form_pad40"> Mes informations personnelles</p>
         <br>

         <?php

         try {

            if (isset($_SESSION['user'])) {
               $user_id = $_SESSION['user_id'];
            }

            $pdo = new PDO('mysql:host=localhost;dbname=superbowl', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            foreach ($pdo->query('SELECT * FROM users WHERE user_id = ' . $user_id . '', PDO::FETCH_ASSOC) as $user_info) {

               $birthdate = $user_info['birth_date'];
               $birthdateUS = date_create_from_format('Y-m-d', $birthdate);
               $birthdateFR = date_format($birthdateUS, 'd-m-Y');

         ?>

               <table width="100%" align="center">
                  <tr>
                     <td class="display_info" width="25%">Email :</td>
                     <td class="display_info" width="10%"><?php echo $user_info['email']; ?></td>
                     <td class="display_info" width="65%">
                        <form action="new_email.php" method="POST">
                           <input type="email" name="new_email" placeholder="Changer mon email">
                           <input type="submit" class="button_connexion" value="Changer mon email">
                        </form>
                     </td>
                  </tr>
                  <tr>
                     <td class="display_info">Date de naissance :</td>
                     <td class="display_info"><?php echo $birthdateFR; ?></td>
                     <td class="display_info">
                        <form action="new_birthdate.php" method="POST">
                           <input type="date" name="new_birthdate" placeholder="Nouvelle date de naissance">
                           <input type="submit" class="button_connexion" value="Changer ma date de naissance">
                        </form>
                     </td>
                  </tr>
                  <tr>
                     <td class="display_info">Mot de passe :</td>
                     <td class="display_info"><button style="border: none">********</button></td>
                     <td class="display_info">
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

      <?php require_once "../templates/footer.php"; ?>
