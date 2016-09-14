<?php 
include "config.php";
$sql = mysql_query("SELECT * FROM tbnotifica WHERE idUser=".$_COOKIE['id']." ORDER BY id DESC") or print(mysql_error());
$linha = mysql_fetch_assoc($sql);
$conta = mysql_num_rows($sql);
if($conta == "0"){
					setcookie("notify",0);
					echo '<a href="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Notificações <span class="badge">0</span> <span class="caret"></span></a>';
					echo '<ul class="dropdown-menu">';
}else{
					setcookie("notify",$conta);
					echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notificações <span class="badge" style="background-color:#6666ff;">'.$conta.'</span> <span class="caret"></span></a>';
					echo '<ul class="dropdown-menu" style="word-wrap:break-word">';
					echo '<li><a href="hug.php?removeAll='.$_COOKIE['id'].'">Limpar</a></li>';
					echo '<li role="separator" class="divider"></li>';
					do{
					$idNot = $linha['id'];
					$texto = $linha['texto'];
					$link = $linha['link'];
					?>
					
					<li><a href="<?php echo "hug.php?idN=".$idNot."&link=".$link; ?>" style="color:#333;"><?php echo $texto; ?></a></li>
					
					<?php						
				}while($linha = mysql_fetch_assoc($sql));
         
}
echo '</ul>';
mysql_close($connect);
?>