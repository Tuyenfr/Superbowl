<?php 

try {
$pdo = new PDO('mysql:host=localhost;dbname=superbowl', username: "root", password: "");
    $statusUpdate= $pdo->prepare('UPDATE matchs SET match_status = "en cours" WHERE match_date < DATE_ADD(CURDATE(), INTERVAL 1 DAY) AND CONCAT (match_date, " ", start_time) > NOW() ');
        $statusUpdate->execute();

        } catch (PDOException $e) {
            echo 'Impossible de se connecter à la BDD';
        }

?>