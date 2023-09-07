<?php

/** -- Connection locale -- **/
/** $pdo = new PDO('mysql:host=localhost;dbname=superbowl', 'root', ''); **/

/** -- Connection Planethoster -- */
$pdo = new PDO('mysql:host=localhost; dbname=yngbgcth_superbowl', 'yngbgcth_admin2', '!+JJJ2ZeJJ6!((J(ec', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         