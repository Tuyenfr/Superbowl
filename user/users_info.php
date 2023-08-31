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
                           <input type="submit" class="button_connexion" value="Changer ma date de naissance">
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

      <?php require_once "../templates/footer.php"; ?>
