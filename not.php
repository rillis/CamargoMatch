<?php
	function notifyExist($idDestinatario){
		$idA = $_COOKIE['id'];
		$idGET = $idDestinatario;
		$query = "SELECT * FROM tbnotifica WHERE idUser=".$idGET." AND link='chat.php?id=".$idA."'";
		$dados = mysql_query($query) or die(mysql_error());
		$linha = mysql_fetch_assoc($dados);
		$total = mysql_num_rows($dados);
		if($total > 0) {
			return true;
		}else{
			return false;
		}
	}
?>