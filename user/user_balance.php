<?php require_once "../templates/header_home_userinfo.php"; ?>

      <div class="container_useraccount">

         <p class="title_form_pad10"> Mon solde</p>

         <div align="center" style="font-size: smaller; color: cadetblue; font-weight: bold">

            <?php

            try {

               if (isset($_SESSION['user'])) {
                  $user_id = $_SESSION['user_id'];
               }

               require "../constants/pdo.php";

               $balance = $pdo->prepare('SELECT user_balance FROM users WHERE user_id = :user_id');
               $balance->bindValue(':user_id', $user_id);
               if ($balance->execute()) {
                  $user_balance = $balance->fetchColumn();
                  echo 'Votre solde actuel est de : ' . $user_balance . ' euros';
               }
            } catch (PDOException $e) {
               echo 'Impossible de se connecter à la base de données';
            }

            ?>
         </div>

         <br>

         <table border="0" width="100%" align="center">
            <tr class="display_table">
               <td width="20%">Date</td>
               <td width="20%">Type transaction</td>
               <td width="20%">Credit</td>
               <td width="20%">Debit</td>
               <td width="20%">Solde</td>
            </tr>
         </table>

         <?php

         try {

            if (isset($_SESSION['user'])) {
               $user_id = $_SESSION['user_id'];
            }

            require "../constants/pdo.php";

            foreach ($pdo->query('SELECT * FROM users_balance WHERE user_id = ' . $user_id . ' ORDER BY transaction_id DESC', PDO::FETCH_ASSOC) as $transaction) {
               $transactiondate = $transaction['transaction_date'];
               $transactiondateUS = date_create_from_format('Y-m-d', $transactiondate);
               $transactiondateFR = date_format($transactiondateUS, 'd-m-Y');

         ?>

               <table border="0" width="100%" style="font-size: 12px">
                  <tr align="center">
                     <td width="20%"><?php echo $transactiondateFR; ?></td>
                     <td width="20%"><?php echo $transaction['transaction_description']; ?></td>
                     <td width="20%"><?php echo $transaction['credit']; ?></td>
                     <td width="20%"><?php if ($transaction['debit'] != '0') {
                                          echo ' - ' . $transaction['debit'];
                                       } else {
                                          echo '&nbsp;&nbsp;0.00';
                                       }; ?></td>
                     <td width="20%"><?php echo $transaction['user_balance']; ?></td>
                  </tr>
               </table>
         <?php }
         } catch (PDOException $e) {
            echo 'Impossible de se connecter à la base de données';
         }

         ?>
      </div>

      <?php require_once "../templates/footer.php"; ?>
