<?php 

try {
$pdo = new PDO('mysql:host=localhost;dbname=superbowl', username: "root", password: "");
    $statusUpdate= $pdo->prepare('UPDATE matchs SET match_status = "live" WHERE NOW() < DATE_ADD(CONCAT(match_date, " ", start_time), INTERVAL 90 MINUTE)');
        $statusUpdate->execute();

        } catch (PDOException $e) {
            echo 'Impossible de se connecter à la BDD';
        }
?>