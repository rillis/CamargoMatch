<?php 
include "config.php";
					$idA = $_COOKIE['id'];
				$idB = $_GET['id'];
$sql = mysql_query("SELECT * FROM tbconversa WHERE (idA=$idA AND idB=$idB) OR (idA=$idB AND idB=$idA)") or print(mysql_error());
$linha = mysql_fetch_assoc($sql);
$conta = mysql_num_rows($sql);
if($conta == "0"){
					echo '';
}else{
					do{
					$id = $linha['id'];
					$idA = $linha['idA'];
					$idB = $linha['idB'];
					$text = $linha['text'];
					$idUsuario = $_COOKIE['id'];
					
					if($idA!=$idUsuario){
					?>
					
					<div class="msg msgA">
					<?php echo $text; ?>
					</div><br>
					
					<?php	
					}else{
					?>
					
					<div class="msg msgB">
					<?php echo $text; ?>
					</div><br>
					
					<?php	
					}				
				}while($linha = mysql_fetch_assoc($sql));
}
mysql_close($connect);
?>