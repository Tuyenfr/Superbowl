<?php require_once "./templates/header_index_norefresh.php"; ?>

   <div style="text-align: center">

      <?php
      $email = $_POST['email'];
      $birth_date = $_POST['birth_date'];
      $password = $_POST['password'];

      try {
         $pdo = new PDO('mysql:host=localhost;dbname=superbowl', 'root', '');
         $connexion = $pdo->prepare('SELECT * FROM users WHERE email = :email');
         $connexion->bindValue(':email', $email);

         if ($connexion->execute()) {
            $user = $connexion->fetch(PDO::FETCH_ASSOC);
            if ($user === false) {
               echo 'Identifiants invalides';
            } else {
               if (password_verify($password, $user['password']) && $user['role'] === 'user') {
                  $_SESSION['user'] = true;
                  $_SESSION['first_name'] = $user['first_name'];
                  $_SESSION['user_id'] = $user['user_id'];
                  $_SESSION['email'] = $user['email'];
                  setcookie('user', 'user', time() + 3600, '/');
                  echo 'Bienvenue ' . $user['first_name'] . ' ! ';
                  header("location:user/home.php");
               } else {
                  if (password_verify($password, $user['password']) && $user['role'] === 'admin') {
                     $_SESSION['admin'] = true;
                     $_SESSION['first_name'] = $user['first_name'];
                     $_SESSION['user_id'] = $user['user_id'];
                     setcookie('user', 'admin', time() + 3600, '/');
                     header("location:backoffice/admin.php");
                  } else {
                     if (password_verify($password, $user['password']) && $user['role'] === 'commentator') {
                        $_SESSION['commentator'] = true;
                        $_SESSION['first_name'] = $user['first_name'];
                        $_SESSION['user_id'] = $user['user_id'];
                        setcookie('user', 'commentator', time() + 3600, '/');
                        header("location:backoffice/commentator.php");
                     } else {
                        echo 'Identifiants incorrects';
                     }
                  }
               }
            }
         }
      } catch (PDOException $e) {
         echo 'Impossible de se connecter à la base de données';
      }

      ?>

   </div>

   <?php require_once "./templates/footer.php"; ?>

</body>

</html>