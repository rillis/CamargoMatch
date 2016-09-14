<?php
	$host = "mysql.hostinger.com.br";
	$user = "u697952984_root";
	$pass = "tania35";
	$db = "u697952984_dbcmg";
	$connect = @mysql_connect($host, $user, $pass) or die(mysql_error());
	$connectDB = @mysql_select_db($db) or die(mysql_error());
	
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
	
?>