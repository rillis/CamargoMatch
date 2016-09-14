<?php 
include 'config.php'; 
if(!isset($_COOKIE['notify'])){
	setcookie("notify",999);
}
?>
<html>
	<head>
	<link rel="shortcut icon" href="favicon.ico">
	<title>
		CamargoMatch
	</title>
	<meta name="viewport" content="width=device-width" />
	<style>
	body{
	height:100%;
	width:100%;
	}
	.c{
	height:100%;
	width:100%;
	position:relative;
	background-image: url("patterns/3.png");
	}
	#childCenter{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	}
	@media (max-width:720px) {
		.c{
			height:100%;
			position: absolute;
			top:0px;
			left:0px;
		}
		.logo{
			margin-left:5% !important;
			width:90% !important;
			height:auto !important;
		}
		#childCenter{
			width:100%;
		}
		form h1{
			font-size:30px !important;
		}
		form p{
			font-size:20px !important;
		}
	}
	</style>
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">	 
	<link rel="stylesheet" href="css/animate.css">
	</head>
	<body>
		<div class="c">
			<div id="childCenter">
				<br><a href="index.php"><img src="camargomatch.png" class="wow fadeInDown logo" style="width:960px;height:169px;" /></a><br><br><br>
				<center class="wow fadeInUp">
					<form action="" method="POST">
						<h1 style="font-family: Raleway;">Login:</h1><br>
						<p style="font-family: Raleway;">Usuario: <input type="text" name="user" style="font-family: Raleway;"/></p>
						<p style="font-family: Raleway;">Senha: <input type="password" name="pass" /></p>
						<p><button class="btn" style="background:none;border-color:#000;color:#000;font-family: Raleway;" type="submit" name="ok">Enviar</button></p>
                                                
												<?php
												if($require_email){
												?>
												<p style="font-family: Raleway;"><a href="forget.php">Esqueci minha senha.</a></p>
												<?php
												}else{
												?>
												<p style="font-family: Raleway; pointer-events: none; cursor: default;"><a href="#">Esqueci minha senha.</a></p>
												<?php
												}
												?>
					</form>
					<?php
					if(isset($_POST['ok'])){
						$user = $_POST['user'];
						$senha = sha1($_POST['pass']);
							$verifica = mysql_query("SELECT * FROM tbusuario WHERE username = '$user' AND senha = '$senha'") or die("<br><div class='alert alert-danger'>Erro ao selecionar</div>");
							if (mysql_num_rows($verifica)<=0){
							die("<br><div class='alert alert-danger'>Usuário e/ou senha incorretos.</div>");
							}else{
							while($sql = mysql_fetch_array($verifica)){
							$id = $sql["id"];
							$nome = $sql["nome"];
							$idade = $sql["idade"];
							$sexo = $sql["sexo"];
							$interesse = $sql["interesse"];
							$foto = $sql["foto"];
							$username = $sql["username"];
							$email = $sql["email"];
							$nascimento = $sql["nascimento"];
							$relacionamento = $sql["relacionamento"];
                                                        $verified = $sql["verified"];
							}
							setcookie("id",$id);
							setcookie("nome",$nome);
							setcookie("sexo",$sexo);
							setcookie("interesse",$interesse);
							setcookie("foto",$foto);
							setcookie("username",$username);
							setcookie("email",$email);
							setcookie("nascimento",$nascimento);
							setcookie("relacionamento",$relacionamento);
                                                        setcookie("verified",$verified);
							if(isAdm($id,$username)){
								setcookie("adm","1");
							}
							if($require_email){
								if($verified==1){
								header('Location: profile.php?id='.$id);
								}else{
								function rmcookie($name) 
								{ 
								unset($_COOKIE[$name]); 
								return setcookie($name, NULL, -1); 
								} 

								rmcookie("id");
								rmcookie("nome");
								rmcookie("sexo");
								rmcookie("interesse");
								rmcookie("foto");
								rmcookie("username");
								rmcookie("email");
								rmcookie("relacionamento");
								rmcookie("nascimento");
								rmcookie("verified");
								if(isset($_COOKIE['adm'])){
								rmcookie("adm");
								}
								die("<br><div class='alert alert-danger'>Verifique sua conta de email! (Verifique tambem a pasta de Spam e Lixo)</div>");
								}
							}else{header('Location: profile.php?id='.$id);}
							}
					}					
					?>
				</center>
			</div>
		</div>
	</body>
	<script src="js/jquery.min.js"></script>
	<script src="js/smooth-scroll.js"></script>
	<script src="js/bootstrap.min.js"></script>
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
	</script>
	<script src="js/wow.js"></script>
	<script>
		new WOW().init();
	</script>
</html>			