<?php 

try {
    
    require "pdo.php";

    $statusUpdate= $pdo->prepare('UPDATE matchs SET match_status = "live" WHERE match_status = "en cours" AND CONCAT (match_date, " ", start_time) < NOW()');
    $statusUpdate->execute();

        } catch (PDOException $e) {
            echo 'Impossible de se connecter à la BDD';
        }
?>