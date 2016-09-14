<?php
include 'config.php';

$user = $_POST['user'];
$name = $_POST['name'];
$senhacrua = $_POST['pass'];
$pass = sha1($_POST['pass']);
$pass2 = sha1($_POST['pass2']);

if(strlen($senhacrua)<6){
	header('Location: register.php?error=0');
}
else if(strcmp($pass,$pass2)!=0){
	header('Location: register.php?error=1');
}
else if(strpos($user, " ") !== false){
	header('Location: register.php?error=2');
}
else if(strlen($user)<6){
	header('Location: register.php?error=3');
}
else if(strlen($user)>20){
	header('Location: register.php?error=3a');
}
else if(strpos($user, "<") !== false || strpos($nome, "<") !== false){
	header('Location: register.php?error=4');
}else{
	if(mysql_query("INSERT INTO users(user,pass,name) VALUES('$user', '$pass', '$name')")){
		header('Location: index.php?login=success');
	}else{
		header('Location: register.php?error=5');
	}
}
?>