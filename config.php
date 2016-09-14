<?php
        $require_email = false;
	$host = "secret";
	$user = "secret";
	$pass = "secret";
	$db = "secret";
	$connect = @mysql_connect($host, $user, $pass) or die(mysql_error());
	$connectDB = @mysql_select_db($db) or die(mysql_error());
	
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
	
	function isAlreadySolicited($a,$b){
	$query = "SELECT * FROM tbhug WHERE idA=".$a." AND idB=".$b;
	$dados = mysql_query($query) or die(mysql_error());
	$total = mysql_num_rows($dados);
	if($total > 0) {
		return true;
	}else{
		return false;
	}
	}
	
	function isFriends($a,$b){
	$query = "SELECT * FROM tbfriend WHERE idA=".$a." AND idB=".$b;
	$dados = mysql_query($query) or die(mysql_error());
	$total = mysql_num_rows($dados);
	if($total > 0) {
		return true;
	}else{
		$query = "SELECT * FROM tbfriend WHERE idB=".$a." AND idA=".$b;
		$dados = mysql_query($query) or die(mysql_error());
		$total = mysql_num_rows($dados);
		if($total > 0) {
			return true;
		}else{
			return false;
		}
	}
	}
	
	function isAdm($id,$user){
		if($id==3 && strcmp($user,"rillis")==0){
			return true;
		}else if($id==5 && strcmp($user,"rillis")==0){
			return true;
		}else if($id==21 && strcmp($user,"Iza")==0){
			return true;
		}else{
			return false;
		}
	}
?>