<?php

/** -- Connection locale -- **/
$pdo = new PDO('mysql:host=localhost;dbname=superbowl', 'root', '');

/** -- Connection hébergeur -- */
/**$pdo = new PDO('mysql:host=localhost; dbname=XXXX_superbowl', 'XXXX_XXXX', 'XXXX', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));**/

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         