<?php 

try {
$pdo = new PDO('mysql:host=localhost;dbname=superbowl', username: "root", password: "");
    $statusUpdate= $pdo->prepare('UPDATE matchs SET match_status = "live" WHERE CONCAT (match_date, " ", start_time) < DATE_ADD(CURDATE(), INTERVAL 90 MINUTE)');
        $statusUpdate->execute();

        } catch (PDOException $e) {
            echo 'Impossible de se connecter à la BDD';
        }
?>