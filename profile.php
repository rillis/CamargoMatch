<?php
include 'config.php';

?>
<html>
	<head>
	<script>
	if(screen.width<=720){
		window.location.href="m/profile.php?id=<?php echo $_GET['id']; ?>";
	}
	</script>
	<link rel="shortcut icon" href="favicon.ico">
	<title>
		CamargoMatch
	</title>
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<style>
	body{
	height:100%;
	width:100%;
	overflow:hidden;
	}
	.c{
	height:100%;
	width:100%;
	position:relative;
	font-family:"Raleway";
	background-image: url("patterns/5.png");
	padding:1%;
	overflow:auto;
	}
	.foto{
	display:inline;
	}
	.sobre{
			border-style:solid;
	border-width:10px;
	border-color:#fff;
	border-radius:5px;
	background-color:#fff;
	min-height:116px;
	}
	.nome{
		margin-left:10px;
		font-size:30px;
		max-width:220px;
		word-wrap:break-word;
	}
	.ativo{
		margin-left:10px;
		font-size:15px;
		max-width:220px;
		word-wrap:break-word;
	}
	.info{
display:inline-block;
    vertical-align:middle;
	line-height:normal;
		float:right;
  -moz-column-count: 2;
  -webkit-column-count: 2;
  column-count: 2;
	}
	.text{
	width:100%;
	border-color:#ccc;
	margin-top: 1%;
	border-radius:10px;
	}
	.post{
		background-color:#fff;
		margin-left:6%;
		margin-top:2%;
		padding:1%;
		border-radius:15px;
		clear: both; float: left; display: block; position: relative;
		min-width:330px;
		max-width:330px;
		word-wrap:break-word;
	}
	</style>
	<script src="//code.jquery.com/jquery.js"></script>
	<script>
	var type=1;
	</script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	</head>
	<body onLoad="checar()">
		<div class="c">
			<?php
				if(!isset($_COOKIE['id'])){
				$idBack = $_GET['id'];
				?><script>window.location.href="login.php?backto=<?php echo $idBack; ?>";</script><?php
				}
				mysql_query("UPDATE tbusuario SET ativo=DATE_SUB(NOW(), INTERVAL 3 HOUR) WHERE id=".$_COOKIE['id']) or print(mysql_error());
				if($_GET['id']==$_COOKIE['id']){
				//se o id do get for o id do cookie
				echo "<script>type=2;</script>";
				?>


				<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="profile.php?id=<?php echo $_COOKIE['id']; ?>"><?php echo $_COOKIE['nome']; ?></a></li>
		<li class=""><a href="feed.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true" style="font-size:15px;"></span>  Feed</a></li>
        <li><a href="explorar.php"><span class="glyphicon glyphicon-globe" aria-hidden="true" style="font-size:15px;"></span>  Explorar</a></li>
						<li class="dropdown" id="ok">
		</li>
		<?php
		if(isset($_COOKIE['adm'])){
		?>
		<li><a href="adm.php" class="editar"><span class="glyphicon glyphicon-wrench" aria-hidden="true" style="font-size:15px;"></span>  Adm</a></li>
		<?php
		}
		?>
      </ul>
	  <ul class="nav navbar-nav navbar-right">
	  <li><a href="logoff.php" style=" color:#f00" type="submit" name="lol"><span class="glyphicon glyphicon-log-out" aria-hidden="true" style="font-size:15px;"></span>  Sair</a></li>
	  </ul>
	  <form class="navbar-form navbar-right" role="search" action="busca.php" method="POST">
        <div class="form-group">
          <input type="text" class="form-control" name="busca" placeholder="Busque pessoas">
        </div>
        <button type="submit" class="btn btn-default">Enviar</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


				<div class="wow fadeInDown">
				<div class="sobre" id="sobre">
				<div class="foto">
				<A style="display:relative" href="<?php echo 'img/'.$_COOKIE['username']."/pp.png"; ?>" class="popup"><img src="<?php echo 'img/'.$_COOKIE['username']."/pp.png"; ?>" width="128px"/></a>
				<a href="editarImg.php" class="editar" style="text-decoration:none">
				<button class="btn btn-info btn-sm" style="display:absolute;" aria-label="Left Align"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
				</a>
				</div>


				<span class="nome"><?php echo $_COOKIE['nome']; ?></span>
				<div class="info" id="info">
				Sexo:<br>
				Interesse:<br>
				Relacionamento:<br>
				Email:<br>
				Data de nascimento:<br>
				Editar info: <br>
				<?php if($_COOKIE['sexo']=="m" || $_COOKIE['sexo']=="M" ){echo "Masculino";}else{echo "Feminino";} ?><br>
				<?php if($_COOKIE['interesse']=="m" || $_COOKIE['interesse']=="M" ){echo "Homens";}else{echo "Mulheres";} ?><br>
				<?php if($_COOKIE['relacionamento']==0){echo "Solteiro";}else if($_COOKIE['relacionamento']==1){echo "Enrolado";}else if($_COOKIE['relacionamento']==2){echo "Namorando";}else{echo "Casado";} ?><br>
				<?php echo $_COOKIE['email'];?><br>
				<?php echo $_COOKIE['nascimento']; ?><br>
				<a href="editar.php" class="editar"><span class="glyphicon glyphicon-pencil">Editar</span></a>
				</div>
				</div>
				<div class="" style="height:50px; background-color:#fff; border-radius:10px;margin-top:1px; position: relative;">
				<span style="line-height:50px; vertical-align:middle;margin-left:10px;margin-right:10px;">Amigos:</span>
				<?php
				$idGET = $_GET['id'];
				$query = "SELECT * FROM tbfriend WHERE idA=".$idGET." OR idB=".$idGET." LIMIT 15";

				$dados = mysql_query($query) or die(mysql_error());

				$linha = mysql_fetch_assoc($dados);

				$total = mysql_num_rows($dados);
				if($total > 0) {

				do{
					$linhaIDA = $linha['idA'];
					$linhaIDB = $linha['idB'];
					if($linhaIDA!=$idGET){
						$ID = $linhaIDA;
					}else{
						$ID = $linhaIDB;
					}

				$query = "SELECT * FROM tbusuario WHERE id=".$ID;

				$dados2 = mysql_query($query) or die(mysql_error());

				$linha2 = mysql_fetch_assoc($dados2);

				$total2 = mysql_num_rows($dados2);

				if($total2 > 0) {
				do{
					$idUser = $linha2['id'];
					$usernameA = $linha2['username'];
					?>
						<a href="profile.php?id=<?php echo $idUser; ?>"><img src="img/<?php echo $usernameA; ?>/pp.png" style="display:inline;max-height:42px;margin-top:1px;margin-right:3px;"></img></a>
					<?php
				}while($linha2 = mysql_fetch_assoc($dados2));

				}
				}while($linha = mysql_fetch_assoc($dados));

				}else{
				}


				?>
				</div>
				</div>

				<form enctype="multipart/form-data" action="" method="POST" style="background-color:#fff;border-radius:10px; margin-top:1%; padding:0.5%" class="wow fadeInRight">

				<textarea rows="4" class="text" name="conteudo" placeholder="Poste algo na sua linha do tempo"></textarea><br><br>
				<button class="btn" type="submit" style="background:none;border-color:#000;color:#000;font-family: Raleway;" name="ok">Enviar</button>
				Foto (Opcional): <input type="file" name="foto2" style="font-family: Raleway; display:inline;" accept="image/*"/><br>

				</form>
				<?php
					if(isset($_POST['ok'])){
						$nomec = $_COOKIE['nome'];
						$conteudo = $_POST['conteudo'];
						$nome = $_COOKIE['username'];
						$dir = "img/".$_COOKIE['username']."/";
						$foto = $_FILES['foto2']['tmp_name'];
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
							if (move_uploaded_file($_FILES['foto2']['tmp_name'], $dir."/".$nomeFoto.".png")) {
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
				<p><h3 style="margin-top:4%;">Sua linha do tempo:</h3></p>
				<style>
				.delete{
					height:15px;
					width:15px;
					position:absolute;
					top: 20px;
					right: 20px;
				}
				</style>

				<?php
				$query = sprintf("SELECT * FROM tbpost WHERE nome='".$_COOKIE['username']."' ORDER BY id DESC");

				$dados = mysql_query($query) or die(mysql_error());

				$linha = mysql_fetch_assoc($dados);

				$total = mysql_num_rows($dados);
				if($total > 0) {

				do{
				$id = $linha['id'];
				$conteudo = $linha['conteudo'];
				$f = $linha['foto'];
				$nome = $linha['nome'];
				$nomeC = $linha['nomeCompleto'];
				$localFoto = "img/".$nome."/".$f.".png";
				if($conteudo=="n"){
					?>
					<div class="post">
                        <a class="delete" href="hug.php?cm=<?php echo $id; ?>&u=<?php echo sha1($_COOKIE['username']); ?>"><img src="del.ico" height="15"></img></a>
						<img src="<?php echo "img/".$nome."/pp.png"; ?>" style="max-width:52px"/> <?php echo $nomeC; ?> publicou:<br><br>
						<a href="<?php echo $localFoto; ?>" class="popup"><img src="<?php echo $localFoto; ?>" style="max-width:300px"/></a>
					</div>
					<?php
				}else if($f=="n"){
					?>
					<div class="post">
					<a class="delete" href="hug.php?cm=<?php echo $id; ?>&u=<?php echo sha1($_COOKIE['username']); ?>"><img src="del.ico" height="15"></img></a>
					<img src="<?php echo "img/".$nome."/pp.png"; ?>" style="max-width:52px"/> <?php echo $nomeC; ?> publicou:<br><br>
						<h5><?php echo $conteudo; ?></h5>
					</div>
					<?php
				}else{
					?>
					<div class="post">
					<a class="delete" href="hug.php?cm=<?php echo $id; ?>&u=<?php echo sha1($_COOKIE['username']); ?>"><img src="del.ico" height="15"></img></a>
					<img src="<?php echo "img/".$nome."/pp.png"; ?>" style="max-width:52px"/> <?php echo $nomeC; ?> publicou:<br><br>
						<a href="<?php echo $localFoto; ?>" class="popup"><img src="<?php echo $localFoto; ?>" style="max-width:300px"/></a><br>
						<h5><?php echo $conteudo; ?></h5>
					</div>
					<?php
				}
				?>



				<?php
				}while($linha = mysql_fetch_assoc($dados));

				}else{
					echo "<h4>Nenhum Post</h4>";
				}

				?>


				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Teste2 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-8826658337455728"
     data-ad-slot="7111872699"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


				<?php
				}else{
				//se estiver visualizando o profile de alguem (SELECT)
				echo "<script>type=3;</script>";
				?>
									<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class=""><a href="profile.php?id=<?php echo $_COOKIE['id']; ?>"><?php echo $_COOKIE['nome']; ?></a></li>
		<li class=""><a href="feed.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true" style="font-size:15px;"></span>  Feed</a></li>
        <li><a href="explorar.php"><span class="glyphicon glyphicon-globe" aria-hidden="true" style="font-size:15px;"></span>  Explorar</a></li>
		<li class="dropdown" id="ok">
		</li>
		<?php
		if(isset($_COOKIE['adm'])){
		?>
		<li><a href="adm.php"><span class="glyphicon glyphicon-wrench" aria-hidden="true" style="font-size:15px;"></span>  Adm</a></li>
		<?php
		}
		?>
      </ul>
	  <ul class="nav navbar-nav navbar-right">
	  <li><a href="logoff.php" style=" color:#f00" type="submit" name="lol"><span class="glyphicon glyphicon-log-out" aria-hidden="true" style="font-size:15px;"></span>  Sair</a></li>
	  </ul>
	  <form class="navbar-form navbar-right" role="search" action="busca.php" method="POST">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Busque pessoas">
        </div>
        <button type="submit" class="btn btn-default">Enviar</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
		<?php
			$idPessoa = $_GET['id'];


			$verifica = mysql_query("SELECT * FROM tbusuario WHERE id = '$idPessoa'") or die("<br><div class='alert alert-danger'>Erro ao selecionar</div>");
							if (mysql_num_rows($verifica)<=0){
							die("<br><div class='alert alert-danger'>Usuário incorreto.</div>");
							}else{
							while($sql = mysql_fetch_array($verifica)){
							$nomePessoa = $sql["nome"];
							$idadePessoa = $sql["idade"];
							$sexoPessoa = $sql["sexo"];
							$interessePessoa = $sql["interesse"];
							$fotoPessoa = $sql["foto"];
							$usernamePessoa = $sql["username"];
							$emailPessoa = $sql["email"];
							$nascimentoPessoa = $sql["nascimento"];
							$relacionamentoPessoa = $sql["relacionamento"];
							}
							}
		?>
				<div class="wow fadeInDown">
				<div class="sobre" id="sobre">
				<div class="foto">
				<A href="<?php echo 'img/'.$usernamePessoa."/pp.png"; ?>" class="popup"><img src="<?php echo 'img/'.$usernamePessoa."/pp.png"; ?>" width="128px" /></a>
				</div>


				<span class="nome"><?php echo $nomePessoa; ?></span>

				<div class="info" id="info2">
				Sexo:<br>
				Interesse:<br>
				Relacionamento:<br>
				Email:<br>
				Data de nascimento:<br>
				Enviar solicitação:<br>
				<?php if($sexoPessoa=="m" || $sexoPessoa=="M" ){echo "Masculino";}else{echo "Feminino";} ?><br>
				<?php if($interessePessoa=="m" || $interessePessoa=="M" ){echo "Homens";}else{echo "Mulheres";} ?><br>
				<?php if($relacionamentoPessoa==0){echo "Solteiro";}else if($relacionamentoPessoa==1){echo "Enrolado";}else if($relacionamentoPessoa==2){echo "Namorando";}else{echo "Casado";} ?><br>
				<?php echo $emailPessoa;?><br>
				<?php echo $nascimentoPessoa;?><br>
				<?php
				$idA = $_COOKIE['id'];
				$idB = $idPessoa;
				if(isFriends($idA,$idB)){
					echo '<span><b>Friends! <a href="hug.php?removeidA='.$idA.'&removeidB='.$idB.'"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></span></b><br>';
				}else{
					if(isAlreadySolicited($idA,$idB)){
						echo '<span><span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> Hug (Enviado)</span><br>';
					}else if(isAlreadySolicited($idB,$idA)){
						echo '<a href="hug.php?idA='.$idA.'&idB='.$idB.'" style=""><span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> Aceitar o Hug</a>';
					}else{
						echo '<a href="hug.php?idA='.$idA.'&idB='.$idB.'" style=""><span class="glyphicon glyphicon-plus" aria-hidden="true"> </span> Hug</a>';
					}
				}
				//	<a href="hug.php?idA=&idB=" style="">Hug</a>
				//	<span>Hug (Enviado)</span>
				//	<span>Friends!</span>
				?>
				</div>

				</div>
<div class="" style="height:50px; background-color:#fff; border-radius:10px;margin-top:1px">
				<span style="line-height:50px; vertical-align:middle;margin-left:10px;margin-right:10px;">Amigos:</span>
				<?php
				$idGET = $_GET['id'];
				$query = "SELECT * FROM tbfriend WHERE idA=".$idGET." OR idB=".$idGET." LIMIT 15";

				$dados = mysql_query($query) or die(mysql_error());

				$linha = mysql_fetch_assoc($dados);

				$total = mysql_num_rows($dados);
				if($total > 0) {

				do{
					$linhaIDA = $linha['idA'];
					$linhaIDB = $linha['idB'];
					if($linhaIDA!=$idGET){
						$ID = $linhaIDA;
					}else{
						$ID = $linhaIDB;
					}

				$query = "SELECT * FROM tbusuario WHERE id=".$ID;

				$dados2 = mysql_query($query) or die(mysql_error());

				$linha2 = mysql_fetch_assoc($dados2);

				$total2 = mysql_num_rows($dados2);

				if($total2 > 0) {
				do{
					$idUser = $linha2['id'];
					$usernameA = $linha2['username'];
					?>
						<a href="profile.php?id=<?php echo $idUser; ?>"><img src="img/<?php echo $usernameA; ?>/pp.png" style="display:inline;max-height:42px;margin-top:1px;margin-right:3px;"></img></a>
					<?php
				}while($linha2 = mysql_fetch_assoc($dados2));

				}
				}while($linha = mysql_fetch_assoc($dados));

				}else{

				}


				?>
								<div style="float:right;margin-top:8px;margin-right:8px;">

								<?php
								$query = "SELECT DATE_FORMAT(ativo,'%d/%m/%Y %H:%i:%s') FROM tbusuario WHERE id=".$idGET;

				$dados = mysql_query($query) or die(mysql_error());

				$linha = mysql_fetch_assoc($dados);
				$query = "SELECT DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 3 HOUR),'%d/%m/%Y %H:%i:%s') AS data";

				$dados2 = mysql_query($query) or die(mysql_error());

				$linha2 = mysql_fetch_assoc($dados2);

				$total = mysql_num_rows($dados);

				do{
					$dataSQL = $linha["DATE_FORMAT(ativo,'%d/%m/%Y %H:%i:%s')"];
					$agora = $linha2['data'];

					$dia = substr($agora, 0, 2);
					$mes = substr($agora, 3, 2);
					$ano = substr($agora, 6, 4);
					$hora = substr($agora, 11, 2);
					$minuto = substr($agora, 14, 2);
					$segundo = substr($agora, 17, 2);

					$diaSQL = substr($dataSQL, 0, 2);
					$mesSQL = substr($dataSQL, 3, 2);
					$anoSQL = substr($dataSQL, 6, 4);
					$horaSQL = substr($dataSQL, 11, 2);
					$minutoSQL = substr($dataSQL, 14, 2);
					$segundoSQL = substr($dataSQL, 17, 2);

					$minutosAusente=abs(intval($minuto)-intval($minutoSQL));
					$horasAusente=abs(intval($hora)-intval($horaSQL));
					$diasAusente=abs(intval($dia)-intval($diaSQL));
					$mesesAusente=abs(intval($mes)-intval($mesSQL));
					$anosAusente=abs(intval($ano)-intval($anoSQL));
				}while($linha = mysql_fetch_assoc($dados));

								if($anosAusente==0 && $mesesAusente==0 && diasAusente==0 && $horasAusente==0 && $minutosAusente<2){
								?>
								<span class="ativo">Online agora.</span>
								<?php
								}else{
									$num = 0;
									$medida = "rola";
									if($anosAusente>0){
										$num = $anosAusente;
										$medida = "anos";
										if($num==1){
											$medida = "ano";
										}
									}else if($mesesAusente>0){
										$num = $mesesAusente;
										$medida = "meses";
										if($num==1){
											$medida = "mes";
										}
									}else if($diasAusente>0){
										$num = $diasAusente;
										$medida = "dias";
										if($num==1){
											$medida = "dia";
										}
									}else if($horasAusente>0){
										$num = $horasAusente;
										$medida = "horas";
										if($num==1){
											$medida = "hora";
										}
									}else if($minutosAusente>=2){
										$num = $minutosAusente;
										$medida = "minutos";
										if($num==1){
											$medida = "minuto";
										}
									}
									?>
									<span class="ativo">Ultima vez ativo há <?php echo $num.' '.$medida.'.'; ?></span>
									<?php
								}
								?>
				<a href="chat.php?id=<?php echo $_GET['id']; ?>"><button class="btn btn-primary" style=""><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Conversar</button></a>
				</div>
				</div>
				</div>

					<p><h3 style="margin-top:4%;">Linha do tempo:</h3></p>

				<?php
				$query = sprintf("SELECT * FROM tbpost WHERE nome='".$usernamePessoa."' ORDER BY id DESC");

				$dados = mysql_query($query) or die(mysql_error());

				$linha = mysql_fetch_assoc($dados);

				$total = mysql_num_rows($dados);
				if($total > 0) {

				do{
				$conteudo = $linha['conteudo'];
				$f = $linha['foto'];
				$nome = $linha['nome'];
				$nomeC = $linha['nomeCompleto'];
				$localFoto = "img/".$nome."/".$f.".png";
				if($conteudo=="n"){
					?>
					<div class="post">
						<img src="<?php echo "img/".$nome."/pp.png"; ?>" style="max-width:52px"/> <?php echo $nomeC; ?> publicou:<br><br>
						<a href="<?php echo $localFoto; ?>" class="popup"><img src="<?php echo $localFoto; ?>" style="max-width:300px"/></a>
					</div>
					<?php
				}else if($f=="n"){
					?>
					<div class="post">
					<img src="<?php echo "img/".$nome."/pp.png"; ?>" style="max-width:52px"/> <?php echo $nomeC; ?> publicou:<br><br>
						<h5><?php echo $conteudo; ?></h5>
					</div>
					<?php
				}else{
					?>
					<div class="post">
					<img src="<?php echo "img/".$nome."/pp.png"; ?>" style="max-width:52px"/> <?php echo $nomeC; ?> publicou:<br><br>
						<a href="<?php echo $localFoto; ?>" class="popup"><img src="<?php echo $localFoto; ?>" style="max-width:300px"/></a><br>
						<h5><?php echo $conteudo; ?></h5>
						<!--<a style="background-color:#eee;font-size: 16px; color: #000; text-decoration: none; color: #000; text-decoration: none; border-radius: 3px; padding: 5px 5px; border: 1px solid #ccc; display: inline-block;"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" ></span><span style="font-family:'Century Gothic';"> Curtir</span></a>
						<a style="background-color:#66f;font-size: 16px; color: #fff; text-decoration: none; color: #fff; text-decoration: none; border-radius: 3px; padding: 5px 5px; border: 1px solid #44d; display: inline-block;"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" ></span><span style="font-family:'Century Gothic';"> Curtiu</span></a>-->
					</div>
					<?php
				}
				?>



				<?php
				}while($linha = mysql_fetch_assoc($dados));

				}else{
					echo "<h4>Nenhum Post</h4>";
				}

				?>


					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Teste2 -->
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- CM -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-8826658337455728"
     data-ad-slot="6944064692"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>




<?php
	}
			?>
		</div>
			<audio id="notify">
  <source src="notify.mp3" type="audio/mp3">
</audio>
	</body>
				<script>
/**
 * EXECUTA A FUNÇÃO "ATUALIZA" PARA VERIFICAR SE HÁ ALGUMA NOTIFICAÇÃO
 */
$(document).ready(function() {
	atualiza();
});

	/**
	 * FUNÇÃO ATUALIZA QUE BUCA A PÁGINA AÇÃO PARA IMPRIMIR NA ID NOTIFICAÇÃO
	 */

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}
function atualiza(){
	var a = getCookie("notify");
	$.get("acao.php", function(resultado){
		$('#ok').html(resultado);
		var b = getCookie("notify");
			if(a!=b && a!=999 && a<b){
		//Quando recebe uma nova notificação
		document.getElementById("notify").play();
	}
	})
/**
* FUNÇÃO E TEMPO DE ATUALIZAÇÃO DA ID NOTIFICAÇÃO
*/
	setTimeout('atualiza()', 1000);
}
</script>
	<script src="js/jquery.min.js"></script>
	<script src="js/smooth-scroll.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/magnific-popup.js"></script>
	<script>
		smoothScroll.init({
		selector: '[data-scroll]', // Selector for links (must be a valid CSS selector)
		selectorHeader: '[data-scroll-header]', // Selector for fixed headers (must be a valid CSS selector)
		speed: 1000, // Integer. How fast to complete the scroll in milliseconds
		easing: 'easeInOutCubic', // Easing pattern to use
		updateURL: true, // Boolean. Whether or not to update the URL with the anchor hash on scroll
		offset: 0, // Integer. How far to offset the scrolling anchor location in pixels
		callback: function ( toggle, anchor ) {} // Function to run after scrolling
		});
		$(document).ready(function() {
		  $('.image-link').magnificPopup({type:'image'});
		});
		$('.popup').magnificPopup({
		type: 'image'
		// other options
		});
		$('.editar').magnificPopup({
		src: 'editar.php',
		type: 'iframe',
		callbacks: {
    open: function() {
    },
    close: function() {
		location.reload(true);
    }
  }
		// other options
		});
		$('.ajax-popup-link').magnificPopup({
		  type: 'ajax'
		});
	</script>
	<script src="js/wow.js"></script>
	<script>
		new WOW().init();
	</script>
		<script>
		function checar() {
		var altura = document.getElementById("sobre").offsetHeight;
		if(type==3){
		var line2 = altura/7;
		document.getElementById("info2").style.lineHeight = line2+"px";
		}else if(type==2){
		var line = altura/7;
		document.getElementById("info").style.lineHeight = line+"px";
		}
		};
	</script>
</html>
