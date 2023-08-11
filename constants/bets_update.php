<?php 

try {
$pdo = new PDO('mysql:host=localhost;dbname=superbowl', username: "root", password: "");

    foreach ($pdo->query('SELECT * FROM bets WHERE bet_status = "Gagné" AND bet_admin_status = "open"', PDO::FETCH_ASSOC) as $betUpdate)
    {   $potential_gain = $betUpdate['potential_gain'];
        $user_id = $betUpdate['user_id'];
        $match_date = $betUpdate['match_date'];

    $betUpdateGain= $pdo->prepare('UPDATE bets SET bet_gain = :potential_gain, bet_admin_status = "closed" WHERE bet_status = "Gagné" AND bet_admin_status = "open"');
    $betUpdateGain->bindValue(':potential_gain', $potential_gain);
        
        if ($betUpdateGain->execute()) {

    $userUpdateGain= $pdo->prepare('UPDATE users_balance SET transaction_date = :match_date, transaction_description = "Gain pari", credit = :potential_gain,  WHERE user_id = :user_id');
    $userUpdateGain->bindValue(':match_date', $match_date);
    $userUpdateGain->bindValue(':potential_gain', $potential_gain);
    $userUpdateGain->bindValue(':user_id', $user_id);
            
        $userUpdateGain->execute();
        }

        else {
            echo 'Impossible de mettre à jour les tables';
        }
    }

        } catch (PDOException $e) {
            echo 'Impossible de se connecter à la base de données';
        }

?>