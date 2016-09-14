<?php
include '../config.php';
?>
<html>
	<head>
		<title>
		CamargoMatch
		</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../css/mobile.css">
		<script src="//code.jquery.com/jquery.js"></script>
		<script src="../js/mobile.js"></script>
	</head>
	<body>
<?php
	if(!isset($_COOKIE['id'])){
		die("<span class='profile_name'><a style='color:#337ab7' href='../login.php'>Logue-se</a> para continuar.</span>");
	}
	if(!isset($_GET['id'])){
		die("<span class='profile_name'>Nenhum ID selecionado.</span>");
	}
	mysql_query("UPDATE tbusuario SET ativo=DATE_SUB(NOW(), INTERVAL 3 HOUR) WHERE id=".$_COOKIE['id']) or print(mysql_error());
	if($_GET['id']==$_COOKIE['id']){
		
		
	//SEU PERFIL	
		
		
?>
		<div id="nav">
			<div id="nav_control" onclick="nav()">
				<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
			</div>
			<div id="nav_menu">
				<div class="nav_item nav_active" onclick="button('profile.php?id=<?php echo $_COOKIE['id']; ?>');">
					<span id="nav_item_text"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $_COOKIE['nome']; ?></span>
				</div>
				<div class="nav_item" onclick="button('../l.php');">
					<span id="nav_item_text"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span>&nbsp;&nbsp;Explorar</span>
				</div>
				<div class="nav_item" onclick="button('../l.php');">
					<span id="nav_item_text"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;&nbsp;Feed</span>
				</div>
				<div class="nav_item" onclick="button('../l.php');">
					<span id="nav_item_text"><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>&nbsp;&nbsp;Notificações</span>
				</div>
				<div class="nav_item nav_search">
					<span id="nav_item_text"><form><input type="text" class="nav_search_input"></input><button type="submit" class="nav_search_submit"><img src="../patterns/search.png" width="35" height="35" /></button></form></span>
				</div>
				<div class="nav_item nav_logoff" onclick="button('../logoff.php');">
					<span id="nav_item_text"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;Logoff</span>
				</div>
			</div>
		</div>
		<img src="<?php echo '../img/'.$_COOKIE['username']."/pp.png"; ?>" class="profile_picture" />
		<span class="profile_name"><?php echo $_COOKIE['nome']; ?></span>
		<div class="profile_sobre" id="info">
			<span class="profile_info" onclick="info()">Sobre</span>
		<span class="profile_title">Sexo:</span>
		<span class="profile_answer"><?php if($_COOKIE['sexo']=="m" || $_COOKIE['sexo']=="M" ){echo "Masculino";}else{echo "Feminino";} ?></span><br>
		<span class="profile_title">Interesse:</span>
		<span class="profile_answer"><?php if($_COOKIE['interesse']=="m" || $_COOKIE['interesse']=="M" ){echo "Homens";}else{echo "Mulheres";} ?></span><br>
		<span class="profile_title">Relacionamento:</span>
		<span class="profile_answer"><?php if($_COOKIE['relacionamento']==0){echo "Solteiro";}else if($_COOKIE['relacionamento']==1){echo "Enrolado";}else if($_COOKIE['relacionamento']==2){echo "Namorando";}else{echo "Casado";} ?></span><br>
		<span class="profile_title">Email:</span>
		<span class="profile_answer"><?php echo $_COOKIE['email'];?></span><br>
		<span class="profile_title">Data de nascimento:</span>
		<span class="profile_answer"><?php echo $_COOKIE['nascimento']; ?></span>
		</div>
		
		<div class="posts">
<?php
	$query = sprintf("SELECT * FROM tbpost WHERE nome='".$_COOKIE['username']."' ORDER BY id DESC");
	$dados = mysql_query($query) or die(mysql_error());
	$linha = mysql_fetch_assoc($dados);
	$total = mysql_num_rows($dados);
	if($total > 0) {
		do{
		$conteudo = $linha['conteudo'];
		$f = $linha['foto'];
		$nome = $linha['nome'];
		$nomeC = $linha['nomeCompleto'];
		$localFoto = "../img/".$nome."/".$f.".png";
			if($conteudo=="n"){
?>
				<div class="post image_only">
					<div class="post_headers">
						<img src="<?php echo "../img/".$nome."/pp.png"; ?>" class="post_pp"></img>
						<span class="post_name orange">&nbsp;&nbsp;<?php echo $nomeC; ?></span>
					</div>
					<center><img src="<?php echo $localFoto; ?>" class="post_image"/></center>
				</div>
<?php
			}else if($f=="n"){
?>
				<div class="post text_only">
					<div class="post_headers">
						<img src="<?php echo "../img/".$nome."/pp.png"; ?>" class="post_pp"></img>
						<span class="post_name orange">&nbsp;&nbsp;<?php echo $nomeC; ?></span>
					</div>
					<div class="post_text"><?php echo $conteudo; ?></div>
				</div>
<?php
			}else{
?>
				<div class="post image_text">
					<div class="post_headers">
						<img src="<?php echo "../img/".$nome."/pp.png"; ?>" class="post_pp"></img>
						<span class="post_name orange">&nbsp;&nbsp;<?php echo $nomeC; ?></span>
					</div>
					<center><img src="<?php echo $localFoto; ?>" class="post_image"/></center>
					<div class="post_text"><?php echo $conteudo; ?></div>
				</div>
<?php
			}
		}while($linha = mysql_fetch_assoc($dados));
	}else{
		echo "<h4>Nenhum Post</h4>";
	}

?>
		</div>
		<form action="" enctype="multipart/form-data" method="POST">
		<label id="picture">
		<i class="fa fa-camera-retro"></i>
		<input type="file" name="file" id="file" accept="image/x-png, image/gif, image/jpeg" onchange="image(this.value);"></input>
		</label>
		<div id="flash"></div>
		<span id="write" onclick="post(true);" type="submit" name="ok"><i class="fa fa-pencil-square-o" id="post_icon"></i></span>
		<input type="text" id="write_text" placeholder="Sua mensagem (opcional)" name="msg"></input>
		<div id="blur"></div>
		</form>
	<?php
	}
	if(isset($_POST['msg'])){
		$nomec = $_COOKIE['nome'];
		$conteudo = $_POST['msg'];
		$nome = $_COOKIE['username'];
		$dir = "../img/".$_COOKIE['username']."/";
		$foto = $_FILES['file']['tmp_name'];
		$nomeFoto=rand();
		if (strpos($conteudo, '<') !== false) {
			die("<script>alert('Tags não são permitidas!');</script>");
		}
		if($foto == "" && $conteudo == ""){
			echo "<script>alert('Não fode, arregaçado.');</script>";
		}else{
			if($foto == ""){
				//sem foto
				$sql = "insert into tbpost(nome,conteudo,nomeCompleto) values('$nome','$conteudo','$nomec')";
			}else{
				//com foto
				if($conteudo==""){
					//sem conteudo e com foto
					$sql = "insert into tbpost(nome,conteudo,foto,nomeCompleto) values('$nome','n','$nomeFoto','$nomec')";
				}else{
					//com conteudo e com foto
					$sql = "insert into tbpost(nome,conteudo,foto,nomeCompleto) values('$nome','$conteudo','$nomeFoto','$nomec')";
				}
					if (move_uploaded_file($_FILES['file']['tmp_name'], $dir."/".$nomeFoto.".png")) {
					} else {
						print "<br><div class='alert alert-danger'>Erro ao enviar a foto</div>";
						die();
					}
			}
			@mysql_query($sql) or die(mysql_error());
			echo '<script> window.location.href = "profile.php?id='.$_COOKIE['id'].'";</script>';
		}
	}

	?>
	</body>
</html>