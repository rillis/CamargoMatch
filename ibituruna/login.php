<?php
include 'config.php';
if(!isset($_POST['pass']) || !isset($_POST['user'])){
	die("ERROR 01 <a href='index.php'>Retornar</a>");	
}
if(strcmp($_POST['pass'],"")==0 || strcmp($_POST['user'],"")==0){
	die("ERROR 02 <a href='index.php'>Retornar</a>");	
}
$user = $_POST['user'];
$pass = sha1($_POST['pass']);

$verifica = mysql_query("SELECT * FROM users WHERE user = '$user' AND pass = '$pass'") or die("<br><div class='alert alert-danger'>Erro ao selecionar</div>");

							if (mysql_num_rows($verifica)<=0){
							header('Location: index.php?login=fail');
							}else{
							while($sql = mysql_fetch_array($verifica)){
							$id = $sql["id"];
							$user = $sql["user"];
							$points = $sql["points"];
							$persec = $sql["persec"];
							$perclick = $sql["perclick"];
							}
							setcookie("id",$id);
							setcookie("user",$user);
							setcookie("points",$points);
							setcookie("persec",$persec);
							setcookie("perclick",$perclick);
							header('Location: jogo.php'); 
							}
?>