<?php 

try {
$pdo = new PDO('mysql:host=localhost;dbname=superbowl', username: "root", password: "");

    foreach ($pdo->query('SELECT * FROM bets WHERE bet_status = "Gagné" AND bet_admin_status = "open"', PDO::FETCH_ASSOC) as $betUpdate)
    {   $potential_gain = $betUpdate['potential_gain'];
        $user_id = $betUpdate['user_id'];
        $match_date = $betUpdate['match_date'];

    $betUpdateGain= $pdo->prepare('UPDATE bets SET bet_gain = :potential_gain, bet_admin_status = "closed" WHERE bet_status = "Gagné" AND bet_admin_status = "open"');
    $betUpdateGain->bindValue(':potential_gain', $potential_gain);
        
    if ($betUpdateGain->execute()){

            foreach ($pdo2->query('SELECT * FROM users WHERE user_id ='.$user_id.'', PDO::FETCH_ASSOC) as $currentbalance) {
                $currentbalance['user_balance'] += $potential_gain;
                $newcurrentbalance = $currentbalance['user_balance'];
    
                $newbalance= $pdo2->prepare('UPDATE users SET user_balance = :balance WHERE user_id ='.$user_id.'');
                $newbalance->bindValue(':balance', $newcurrentbalance);
                $newbalance->execute();
    
                $pdo3 = new PDO('mysql:host=localhost;dbname=superbowl','root', '');
                $pdo3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                
                $credit = $potential_gain;
                $debit = "0";
                $transaction_description = "Gain pari";

                $newtransaction= $pdo3->prepare('INSERT INTO users_balance (user_id, transaction_date, transaction_description, credit, debit, user_balance) VALUES (:user_id, :match_date, :transaction_description, :credit, :debit, :newcurrentbalance)');
                $newtransaction->bindValue(':user_id', $user_id);
                $newtransaction->bindValue(':match_date', $match_date);
                $newtransaction->bindValue(':transaction_description', $transaction_description);
                $newtransaction->bindValue(':credit', $credit);
                $newtransaction->bindValue(':debit', $debit);
                $newtransaction->bindValue(':newcurrentbalance', $newcurrentbalance);
                $newtransaction->execute();

                }
            }
        }

        } catch (PDOException $e) {
            echo 'Impossible de se connecter à la base de données';
        }

?>