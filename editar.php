<?php
include 'config.php';
?>

<html>
	<head>
	<link rel="shortcut icon" href="favicon.ico">
	<title>
		CamargoMatch
	</title>
	<style>
	body{
	height:100%;
	width:100%;
	}
	.c{
	height:100%;
	width:100%;
	position:relative;
	padding:5%;
	background-image: url("patterns/8.png");
	}
	#childCenter{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	}
	</style>
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">	 
	<link rel="stylesheet" href="css/animate.css">
	</head>
	<body>
		<div class="c">
			<?php
				if(!isset($_COOKIE['id'])){
				print "<br><div class='alert alert-danger'>Logue-se para continuar</div>";
				die();
				}
			?>
			<h1>Edite suas informações:</h1>
			<p><h3>O que não quiser editar, deixe como está.</h3></p>
			<form action="" method="POST">
			<p>Nome: <input type="text" name="name" style="font-family: Raleway; width:auto"> </input></p>
			<p>Sexo: <select name="sexo"><option value="">Selecione</option><option value="m">Masculino</option><option value="f">Feminino</option></select></p>
			<p>Interesse: <select name="interesse"><option value="">Selecione</option><option value="m">Homens</option><option value="f">Mulheres</option></select></p>
			<p>Email: <input type="text" name="email" style="font-family: Raleway;" /></p>
			<p>Relacionamento: <select name="relacionamento"><option value="">Selecione</option><option value="lalalala">Solteiro</option><option value="1">Enrolado</option><option value="2">Namorando</option><option value="3">Casado</option></select></p>
			<p><button class="btn" style="background:none;border-color:#000;color:#000;font-family: Raleway;" type="submit" name="ok">Enviar</button></p>
			</form>
			<?php 
				if(isset($_POST['ok'])){
					@$nome = $_POST['name'];
					@$sexo = $_POST['sexo'];
					@$interesse = $_POST['interesse'];
					@$email = $_POST['email'];
					@$relacionamento = $_POST['relacionamento'];
					$id=$_COOKIE['id'];
					

					if(!$nome==""){
						$sql = "UPDATE tbusuario SET nome='".$nome."' WHERE id=".$id;
						if (mysql_query($sql)) {
							
						}
					}
					if(!$sexo==""){
						$sql = "UPDATE tbusuario SET sexo='".$sexo."' WHERE id=".$id;
						if (mysql_query($sql)) {
							
						}
					}
					if(!$interesse==""){
						$sql = "UPDATE tbusuario SET interesse='".$interesse."' WHERE id=".$id;
						if (mysql_query($sql)) {
							
						}
					}
					if(!$email==""){
						$sql = "UPDATE tbusuario SET email='".$email."' WHERE id=".$id;
						if (mysql_query($sql)) {
							
						}
					}
					if(!$relacionamento==""){
						if($relacionamento!=0){
						$sql = "UPDATE tbusuario SET relacionamento='".$relacionamento."' WHERE id=".$id;
						if (mysql_query($sql)) {
							
						}
						}else{
							if($id==21){
								
							}else{
						$sql = "UPDATE tbusuario SET relacionamento='0' WHERE id=".$id;
						if (mysql_query($sql)) {
							
						}
						}
						}
					}
					
					
					
					$user = $_COOKIE['id'];
						$senha = sha1($_POST['pass']);
							$verifica = mysql_query("SELECT * FROM tbusuario WHERE id = '$user'") or die("<br><div class='alert alert-danger'>Erro ao selecionar</div>");
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
					
					
					
					
					echo "<div class='alert alert-success'>Alterado! Feche esse PopUp para atualizar</div>";

				}
				
			
			
			?>
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