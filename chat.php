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
	.c{
	height:100%;
	width:100%;
	position:relative;
	background-image:url('patterns/12.png');
	padding-top:0.5%;
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
				if(!isset($_GET['id'])){
					die("<h1>Something wrong</h1>");
				}
			?>
			<div style="height:99%;width:40%;margin-left:30%;background-color:#fff;box-shadow: 4px 4px 4px #bbb;" id="conversa">
			<div style="height:60px;background-color:#d3d3d3;border-width:0px;border-bottom-width:1px;border-style:solid;border-color:#ccc;" id="capture">
			
						<?php
				$idB = $_GET['id'];
				$query = sprintf("SELECT * FROM tbusuario WHERE id=$idB");

				$dados = mysql_query($query) or die(mysql_error());

				$linha = mysql_fetch_assoc($dados);

				$total = mysql_num_rows($dados);
				if($total > 0) {
					do{
					$id = $linha['id'];
					$nome= $linha['nome'];
					$user= $linha['username'];		
				}while($linha = mysql_fetch_assoc($dados));
				
				}else{}
				?>
			
			<a href="profile.php?id=<?php echo $id; ?>"><img src="img/<?php echo $user; ?>/pp.png" style="max-height:45px;border-radius:45px;margin-left:6px;"></img></a>
			 <span style="line-height:60px;vertical-align:middle; margin-left:10px; font-family:Raleway; font-size:21px;"><?php echo $nome; ?></span>
			</div>
			<style>
			#conteudo{
				padding-top:10px;
				z-index:1;
				 overflow: auto;
			}
			.msg{
				word-wrap:break-word;
				max-width:70%;
				width:auto;
				margin-bottom:10px;
				margin-left:10px;
				margin-right:10px;
				padding:5px;
				border-radius:5px;
				clear:both;
			}
			.msgA{
				background-color:#fff;
				float:left;
			}
			.msgB{
				background-color:#dcf8c6;
				float:right;
			}
			</style>
			<div id="conteudo" style="background-color:#ededed">
			
				
			
			<!--Mensagens-->
			
			

			</div>
			<script src="//code.jquery.com/jquery.js"></script>
	<script>
/**
 * EXECUTA A FUNÇÃO "ATUALIZA" PARA VERIFICAR SE HÁ ALGUMA NOTIFICAÇÃO
 */
$(document).ready(function() {
	$("#conteudo").animate({ scrollTop: $('#conteudo').prop("scrollHeight")}, 700);
	document.getElementById("msgaaa").focus();
	atualiza();
});

	/**
	 * FUNÇÃO ATUALIZA QUE BUCA A PÁGINA AÇÃO PARA IMPRIMIR NA ID NOTIFICAÇÃO
	 */

function atualiza(){
	$.get("chatdinamico.php?id=<?php echo $_GET['id']; ?>", function(resultado){
		$('#conteudo').html(resultado);
	})
/**
* FUNÇÃO E TEMPO DE ATUALIZAÇÃO DA ID NOTIFICAÇÃO
*/
	setTimeout('atualiza()', 2000);
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
			<div style="height:60px;background-color:#d9d9d9;border-width:0px;border-top-width:1px;border-style:solid;border-color:#ddd;">
			<form style="" action="" method="POST">
			<input type="text" id="msgaaa" style="width:85%; border:none;height:40px;margin-top:10px;margin-left:10px;" placeholder="Digite aqui sua mensagem:" name="msg"></input>
			<button type="submit" name="ok" style="background-color:transparent;border:transparent;height:40px;margin-left:10px;"><span class="glyphicon glyphicon-send" aria-hidden="true" style="margin-left:3%;font-size:18px;"></span></button>
			</form>
			<?php
			if(isset($_POST['ok'])){
				$idA = $_COOKIE['id'];
				$idB = $_GET['id'];
				$text = $_POST['msg'];
				if(!strcmp($text,"")==0){
					if(mysql_query("INSERT INTO tbconversa(idA,idB,text) VALUES($idA,$idB,'$text')")){
						$nome = $_COOKIE['nome'];
						include 'not.php';
						if(!notifyExist($idB)){
							mysql_query("INSERT INTO tbnotifica(idUser,texto,link) VALUES($idB,'Mensagem recebida de $nome','chat.php?id=$idA')");
						}
						header("Location: chat.php?id=".$_GET['id']);
					}
				}
			}
			?>
			</div>
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
		var altura = document.getElementById("conversa").offsetHeight;
		var line2 = altura-120;
		document.getElementById("conteudo").style.height = line2+"px";
	</script>
	<script src="js/wow.js"></script>
	<script>
		new WOW().init();
	</script>
</html>