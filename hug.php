<?php
include 'config.php';
if(isset($_GET['cm'])&&isset($_GET['u'])){
	$user = sha1($_COOKIE['username']);
	$u = $_GET['u'];
	$cm = $_GET['cm'];
	if(strcmp($u,$user)==0){
		mysql_query("DELETE FROM tbpost WHERE id=$cm") or die(mysql_error());
		header("Location: index.php");
	}
}
if(isset($_GET['removeAll'])){
	$id = $_COOKIE['id'];
	mysql_query("DELETE FROM tbnotifica WHERE idUser=$id") or die(mysql_error());
	
	if(strcmp($_GET['removeAll'],"feed")==0){
		header("Location: feed.php");
	}else{
		header("Location: profile.php?id=".$_GET['removeAll']);
	}
}
if(isset($_GET['removeidA'])){
	$idA = $_GET['removeidA'];
	$idB = $_GET['removeidB'];
	$query = "DELETE FROM tbfriend WHERE idA=".$idA." AND idB=".$idB;	
	mysql_query($query) or die(mysql_error());
	$query = "DELETE FROM tbfriend WHERE idA=".$idB." AND idB=".$idA;	
	mysql_query($query) or die(mysql_error());
	header("Location: profile.php?id=".$idB);
}
if(isset($_GET['link'])){
	$idN = $_GET['idN'];
	$query = "DELETE FROM tbnotifica WHERE id=".$idN;	
	mysql_query($query) or die(mysql_error());
	header("Location: ".$_GET['link']);
}
if(!isset($_GET['idA'])){
	die("Algo errado");
}
$idA=$_GET['idA'];
$idB=$_GET['idB'];
if(isAlreadySolicited($idB,$idA)){
	//Ja foi solicitado
	$query = "DELETE FROM tbhug WHERE idA=".$idB." AND idB=".$idA;	
	mysql_query($query) or die(mysql_error());
	$query = "INSERT INTO tbfriend(idA,idB) VALUES(".$idA.",".$idB.")";	
	mysql_query($query) or die(mysql_error());
	$query = "INSERT INTO tbnotifica(idUser,texto,link) VALUES(".$idB.",'Agora são amigos!', 'profile.php?id=".$idA."')";
	mysql_query($query) or die(mysql_error());
header("Location: profile.php?id=".$idB);
}else{
	//Enviar pedido
	$query = "INSERT INTO tbhug(idA,idB) VALUES(".$idA.",".$idB.")";
	mysql_query($query) or die(mysql_error());
	$query = "INSERT INTO tbnotifica(idUser,texto,link) VALUES(".$idB.",'Solicitação de amizade recebida!', 'profile.php?id=".$idA."')";
	mysql_query($query) or die(mysql_error());
header("Location: profile.php?id=".$idB);
}
?>