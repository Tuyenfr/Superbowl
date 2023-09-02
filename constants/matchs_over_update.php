<?php 

try {

    require 'pdo.php';

    $statusUpdate= $pdo->prepare('UPDATE matchs SET match_status = "terminé" WHERE CONCAT (match_date, " ", end_time) < NOW()');
    $statusUpdate->execute();

        } catch (PDOException $e) {
            echo 'Impossible d\'enregistrer le pari après le début du match';
        }
?>