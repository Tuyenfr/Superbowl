<p align="center" style="font-size: 14px">
  <?php
   if (isset($_SESSION['user'])) {
   echo 'Bonjour '.$_SESSION['first_name'].' ! ';
   }
  ?>
</p>