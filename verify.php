<?php
include 'config.php';
if(!isset($_GET['tokenM'])){
	die("ERROR!");
}else{
	$user = $_GET['token'];
	$tokenM = $_GET['tokenM'];
	$tokenS = $_GET['tokenS'];
	$tokenMS = $_GET['tokenMS'];
	if(strcmp(md5($user),$tokenM)==0){
		echo 'level 1 ok<br>';
		if(strcmp(sha1($user),$tokenS)==0){
			echo 'level 2 ok<br>';
				if(strcmp(sha1(md5($user)),$tokenMS)==0){
					echo 'level 3 ok<br>';
						$ok=true;
						$query = "UPDATE tbusuario SET verified=1 WHERE username='".$user."'";
						mysql_query($query) or $ok=false;
						if($ok){
							echo 'tudo certo';
							header('Location: login.php');
						}
					}
			}
	}
}
?>