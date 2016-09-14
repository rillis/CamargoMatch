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
	background-image: url("patterns/10.png");
	}
	#childCenter{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	font-family:Raleway; color:#fff;
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
			<?php
				if(!isset($_COOKIE['adm'])){
					echo '<h1 style="margin:10%; font-family:Raleway; color:#fff;">Você não é ADM!</h1>';
					die();
				}
			?>
			
				<h1> Bem-vindo(a) sr(a). <?php echo $_COOKIE['nome']; ?> </h1>
				<h3> Por enquanto essa tela só manda notificações para usuarios, em breve terá mais funções! </h3><br><br>
				<form action="" method="POST">
				<p>
				Usuario: 
				<select name="user" style="color:#000">
					<option value="select">Selecione uma opção</option>
				<?php
				$query = sprintf("SELECT * FROM tbusuario");

				$dados = mysql_query($query) or die(mysql_error());

				$linha = mysql_fetch_assoc($dados);

				$total = mysql_num_rows($dados);
				if($total > 0) {
					do{
					$id = $linha['id'];
					$nome = $linha['nome'];
					?>
					
					<option value="<?php echo $id; ?>"><?php echo $nome; ?></option>
					
					<?php						
				}while($linha = mysql_fetch_assoc($dados));
				
				}else{}
				?>
				</select>
				</p>
				<p>
				Mensagem: 
				<input name="msg" placeholder="Digite a mensagem" style="width:400px;color:#000"></input>
				</p>
				<p>
				<button class="btn btn-danger" name="voltar" type="submit">Voltar</button>
				<button class="btn btn-success" name="enviar" type="submit">Enviar</button>
				</p>
				</form>
				<?php
					if(isset($_POST['enviar'])){
						if(strcmp($_POST['user'],"select")==0){
							die("<br><div class='alert alert-danger'>Selecione um usuario</div>");
						}
						if(strcmp($_POST['msg'],"")==0){
							die("<br><div class='alert alert-danger'>Digite uma mensagem</div>");
						}
						
						$id = $_POST['user'];
						$msg = $_POST['msg'];
						
						$query = "INSERT INTO tbnotifica(idUser,texto,link) VALUES($id,'$msg','index.php')";
						if(mysql_query($query)){
							die("<br><div class='alert alert-success'>Mensagem enviada!</div>");							
						}else{
							die("<br><div class='alert alert-danger'>FATAL ERROR</div>");
						}
					}
					else if(isset($_POST['voltar'])){
						header("Location: index.php");
					}
				?>
				
				<?php
				$query = sprintf("SELECT * FROM tbusuario where verified=0");

				$dados = mysql_query($query) or die(mysql_error());

				$linha = mysql_fetch_assoc($dados);

				$total = mysql_num_rows($dados);
				if($total > 0) {
					?>
					<br><h2>Verificações:</h2>
					<table class="table" style="background-color:#fff; border-radius:10px;">
					<thead>
					  <tr>
						<th>Del</th>
						<th>Username</th>
						<th>E-Mail</th>
					  </tr>
					</thead>
					<tbody>
					<?php
					do{
					$email = $linha['email'];
					$nome = $linha['username'];
					?>
					
					<tr>
					<td><a href="rm.php?user=<?php echo $nome; ?>"><span style="color:red;" class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
					<td><?php echo $nome; ?></td>
					<td><?php echo $email; ?></td>
					</tr>
					
					<?php						
				}while($linha = mysql_fetch_assoc($dados));
				?>
				</tbody>
				</table>
				<?php
				}else{
					?>
						<br><h2>Nenhuma verificação.</h2>
					<?php
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