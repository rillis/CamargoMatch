<?php
include 'config.php';
$test = $_POST['clicks'];
setcookie("points",$test);
mysql_query("UPDATE users SET points=".$test." WHERE id=".$_COOKIE['id']);
?>