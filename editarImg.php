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
	background-image: url("patterns/13.png");
	}
	.c{
	height:100%;
	width:100%;
	position:relative;
	padding:10%;
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
	<script src="//code.jquery.com/jquery.js"></script>
	</head>
	<body>
		<div class="c">
			<h2>Selecione a nova foto:</h2><br>
			<form enctype="multipart/form-data" action="" method="POST" class="re">
			<h3 style="display:inline">Foto: </h3><input style="display:inline" type="file" name="foto" accept="image/*" /><br><br>
			<button class="btn" style="background:none;border-color:#000;color:#000;font-family: Raleway;" type="submit" name="ok">Enviar</button>
			</form>
			<?php
	if(isset($_POST["ok"])){
	$usuario = $_COOKIE["username"];
	$dir = "img/".$usuario."/";
		if (move_uploaded_file($_FILES['foto']['tmp_name'], $dir."/pp.png")) {
			print "<br><div class='alert alert-success'>Foto alterada com sucesso. Feche esse PopUp para atualizar</div>";
		} else {
			print "<br><div class='alert alert-danger'>Erro ao enviar a foto</div>";
			die();
		}
	}elseif(isset($_POST["back"])){
		?><script>window.location.href="index.php";</script><?php
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