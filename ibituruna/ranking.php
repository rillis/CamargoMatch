<?php
include 'config.php';
$id = $_GET['id'];
$verifica = mysql_query("SELECT * FROM users ORDER BY points DESC LIMIT 10") or die("<br>Erro ao selecionar");
$total = mysql_num_rows($verifica);
echo 'Ranking: <br>';
$count = 1;
if (mysql_num_rows($verifica)<=0){

}else{
while($sql = mysql_fetch_array($verifica)){
	if($count<10){
		echo '0'.$count.'. '.$sql['user'].' <span class="pointranking">('.$sql['points'].')</span><br>';
	}else{
		echo $count.'. '.$sql['user'].' <span class="pointranking">('.$sql['points'].')</span><br>';
	}
	$count++;
}
}
?>