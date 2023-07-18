<?php 

try {
$pdo = new PDO('mysql:host=localhost;dbname=superbowl', username: "root", password: "");
    $statusUpdate= $pdo->prepare('UPDATE matchs SET match_status = "à venir" WHERE match_date > DATE_ADD(CURDATE(), INTERVAL 1 DAY)');
        $statusUpdate->execute();

        } catch (PDOException $e) {
            echo 'Impossible de se connecter à la BDD';
        }
?>