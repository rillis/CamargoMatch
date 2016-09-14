<?php
	include 'config.php';
	include 'test.php';
	$sql='select * from tbnotifica where idUser='.$_COOKIE['id'].' AND notified=0 order by id desc limit 1'; //buscando registros
	$resultados=mysql_query($sql)
	or die (mysql_error());
	if (@mysql_num_rows($resultados)==0)
		echo "n";
	while($res=mysql_fetch_array($resultados)){
		echo $res['texto'];
		//mysql_query("UPDATE tbnotifica SET notified=TRUE WHERE id=".$res['id']) or die (mysql_error());
	}
?>