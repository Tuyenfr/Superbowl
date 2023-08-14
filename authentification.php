<?php
session_start();
?>

<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>authentification</title>
   <link rel="stylesheet" href="./CSS/style.css" type="text/css">
</head>

<body>
   <header>
      <p class="logo"><a class="link_pages" href="index.php"><i>Super</i>Bowl-BET</p>
      <nav>
         <ul class="menu">
            <li class="bold"><a class="link_pages" href="home.php">Lives</a></li>
            <li><a class="link_pages" href="matchs_tocome.php">Matchs à venir</a></li>
            <li><a class="link_pages" href="matchs_over.php">Matchs terminés</a></li>
            <li><a class="link_pages" href="connexion.php">Connexion</a></li>
         </ul>
      </nav>
   </header>
   <br>
   <br>

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
                  header("location:home.php");
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