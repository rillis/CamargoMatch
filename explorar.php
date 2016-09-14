<?php
	include 'config.php';
	if(isset($_COOKIE['id'])){
		mysql_query("UPDATE tbusuario SET ativo=DATE_SUB(NOW(), INTERVAL 3 HOUR) WHERE id=".$_COOKIE['id']) or print(mysql_error());
	}
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
			background-image: url("patterns/6.png");
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
		<div class="container">
		<a href="index.php"><button class="btn btn-danger" style="margin-top:1%;">Voltar</button></a>
				<div class="row" style="margin-top:1%;">
				<center style=""><h1 style="display:inline;">Pessoas:</h1></center>
				<button class="btn btn-primary" style="float:right;" onclick="filter()"><span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Filter</button>
				<div id="filter" style="background-color:#fff; border-style:solid; border-width:1px; border-color:#888; clear:both;border-radius:10px; visibility:hidden; height:0px; padding:1%;  -moz-column-count: 3;
  -webkit-column-count: 3;
  column-count: 3;">
					<form action="" method="POST">
					<b>Filtros:</b><br>
					<br>
					<i>Sexo:</i><br>
					<br>
					<input type="radio" name="sexo" value="all" checked="checked" />Qualquer<br>
					<input type="radio" name="sexo" value="m" />Masculino<br>
					<input type="radio" name="sexo" value="f" />Feminino<br>
					<br>
					<br>
					<i>Interesse:</i><br>
					<br>
					<input type="radio" name="interesse" value="all" checked="checked" />Qualquer<br>
					<input type="radio" name="interesse" value="m" />Homens<br>
					<input type="radio" name="interesse" value="f" />Mulheres<br>
					<button type="submit" class="btn btn-success btn-sm" name="ok">Filtrar</button><br>

					<i>Relacionamento:</i><br>
					<input type="radio" name="relacionamento" value="all" checked="checked" />Qualquer<br>
					<input type="radio" name="relacionamento" value="0" />Solteiro<br>
					<input type="radio" name="relacionamento" value="1" />Enrolado<br>
					<input type="radio" name="relacionamento" value="2" />Namorando<br>
					<input type="radio" name="relacionamento" value="3" />Casado<br>

					</form>
					<?php
						if(isset($_POST['ok'])){
							header("Location: explorar.php?sexo=".$_POST['sexo']."&interesse=".$_POST['interesse']."&relacionamento=".$_POST['relacionamento']);
						}

					?>
				</div>
				<br><br>
				
				
				
				<?php
				if(isset($_GET['sexo']) && isset($_GET['interesse']) && isset($_GET['relacionamento'])){
					$s = $_GET['sexo'];
					$i = $_GET['interesse'];
					$r = $_GET['relacionamento'];
					$query = "select * from tbusuario where ";
					if(strcmp($s,"all")==0){
						$query = $query."(sexo='m' OR sexo='f') ";
					}else{
						$query = $query."sexo='".$s."' ";
					}
					if(strcmp($i,"all")==0){
						$query = $query."AND (interesse='m' OR interesse='f') ";
					}else{
						$query = $query."AND interesse='".$i."' ";
					}
					if(strcmp($r,"all")==0){
						$query = $query."AND (relacionamento=0 OR relacionamento=1 OR relacionamento=2 OR relacionamento=3) ";
					}else{
						$query = $query."AND relacionamento='".$r."' ";
					}
				}else{
					$query = sprintf("SELECT * FROM tbusuario where verified=1 ORDER BY id");
				}

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
		var open = false;
		function filter(){
			if(!open){
				open = true;
				document.getElementById("filter").style.visibility = "visible";
				document.getElementById("filter").style.height = "190px";				
			}else{
				open = false;
				document.getElementById("filter").style.visibility = "hidden";
				document.getElementById("filter").style.height = "0px";	
			}
		}
	</script>
	<script src="js/wow.js"></script>
	<script>
		new WOW().init();
	</script>
</html>