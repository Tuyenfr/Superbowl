<?php 

try {
    
$pdo = new PDO('mysql:host=localhost;dbname=superbowl', username: "root", password: "");
    $statusUpdate= $pdo->prepare('UPDATE matchs SET match_status = "live" WHERE match_status = "en cours" AND CONCAT (match_date, " ", start_time) < NOW()');
        $statusUpdate->execute();

        } catch (PDOException $e) {
            echo 'Impossible de se connecter à la BDD';
        }
?>