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
	overflow:hidden;
	}
	.c{
	height:100%;
	width:100%;
	position:relative;
	background-image: url("patterns/11.png");
	overflow:auto;
	}
	.p{
		padding:5%;
	}
	#childCenter{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	font-family:Raleway; color:#fff;
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
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">	 
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	</head>
	<body>
		<div class="c">
						<nav class="navbar navbar-default navbar-fixed-top">
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
        <li><a href="profile.php?id=<?php echo $_COOKIE['id']; ?>"><?php echo $_COOKIE['nome']; ?></a></li>
		<li class="active"><a href="feed.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true" style="font-size:15px;"></span>  Feed</a></li>
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
          <input type="text" class="form-control" name="busca" placeholder="Busque pessoas">
        </div>
        <button type="submit" class="btn btn-default">Enviar</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<script src="//code.jquery.com/jquery.js"></script>
<div class="p">
			<h2 style="font-family:Raleway">Feed:<h5 style=""> (Aqui você verá as suas publicações e de seus amigos juntas!)</h5></h2>
			<?php
			$queryFinal = "SELECT * FROM tbpost WHERE nome='".$_COOKIE['username']."'";
			
			$idGET = $_COOKIE['id'];
			$query = "SELECT * FROM tbfriend WHERE idA=".$idGET." OR idB=".$idGET;

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
					$usernameA = $linha2['username'];
					
					$queryFinal = $queryFinal." OR nome='".$usernameA."'";
				}while($linha2 = mysql_fetch_assoc($dados2));
				
				}
				}while($linha = mysql_fetch_assoc($dados));

				}else{
				}
				$queryFinal = $queryFinal." ORDER BY id DESC";
				
				$dados = mysql_query($queryFinal) or die(mysql_error());

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
			</div>
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
	</script>
	<script src="js/wow.js"></script>
	<script>
		new WOW().init();
	</script>
</html>