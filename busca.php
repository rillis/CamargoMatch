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
	body{
			background-image: url("patterns/7.png");
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
		<div class="container" style="color:#fff">
		<a href="index.php"><button class="btn btn-danger" style="margin-top:1%;">Voltar</button></a>
				<div class="row" style="margin-top:1%;">
				<center><h1>Resultados para "<?php echo $_POST['busca']; ?>":</h1></center>
				<br>
				
				
				
				<?php
				$busca=$_POST['busca'];
				$query = "SELECT * FROM tbusuario WHERE nome LIKE '%".$busca."%'";

				$dados = mysql_query($query) or die(mysql_error());

				$linha = mysql_fetch_assoc($dados);

				$total = mysql_num_rows($dados);
				if($total > 0) {

				do{
				$id = $linha['id'];
				$nome = $linha['nome'];
				$rId = $linha['relacionamento'];
				if($rId==0){
					$relacionamento="Solteiro";
				}else if($rId==1){
					$relacionamento="Enrolado";
				}else if($rId==2){
					$relacionamento="Namorando";
				}else if($rId==3){
					$relacionamento="Casado";
				}
				$user = $linha['username'];
				$foto = "img/".$user."/pp.png";
					?>
					  <div class="col-sm-7 col-md-3" style="display:inline; min-height:374px;">
    <div class="thumbnail">
      <img src="<?php echo $foto; ?>" style="max-height:170px;">
      <div class="caption">
        <h3><?php echo $nome; ?></h3>
        <p>Relacionamento: <?php echo $relacionamento; ?></p>
        <p><a href="profile.php?id=<?php echo $id; ?>" class="btn btn-primary" role="button">Visitar perfil</a></p>
      </div>
    </div>
  </div>
					
					<?php
					}while($linha = mysql_fetch_assoc($dados));
				}else{
					echo "<h2>Sem resultados</h2>";
				}
				?>
				
  
  
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