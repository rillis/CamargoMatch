<?php 
include 'config.php'; 
function email($usuario,$email){
$headers = "MIME-Version: 1.0\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= "From: adm@camargomatch.16mb.com\r\n"; // remetente
$headers .= "Return-Path: adm@camargomatch.16mb.com\r\n"; // return-path

$message = '<html><body style="background-color:#eee">';
$message .= '<center><h1 style="color:red;font-family:Impact;">CamargoMatch</h1></center>';
$message .= '<center><h2 style="font-family:\'Century Gothic\'"><b>Email de verificação:</b></h2></center>';
$message .= '<center><h3 style="font-family:\'Century Gothic\'">Olá '.$usuario.', clique no botão abaixo para validar o email da sua conta.</h3><br></center>';
$message .= '<center><h2><a style="background-color:#66f;font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #256F9C; display: inline-block;" href="http://www.camargomatch.16mb.com/verify.php?tokenM='.md5($usuario).'&token='.$usuario.'&tokenS='.sha1($usuario).'&tokenMS='.sha1(md5($usuario)).'">Validar</a></h2></center>';
$message .= '<h4 align="right" style="font-family:\'Lucida Handwriting\'">CamargoMatch Inc., HardUsers 2015-2016</h4>';
$message .= '</body></html>';

$envio = mail($email, "E-Mail de verificação", $message, $headers);
return $envio;
}
?>
<html>
	<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
	background-image: url("patterns/4.png");
	}
	#childCenter{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	}
	.re{
		padding: 1em;
  -moz-column-count: 2;
  -webkit-column-count: 2;
  column-count: 2;
	}
	 @media (max-width:720px) {
		*{
			
		}
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
		form,p,.auto{
			word-break: keep-all;
		}
		.nomob{
			display:none !important;
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
				<br><a href="index.php"><img src="camargomatch.png" class="wow fadeInDown logo" style="width:960px;height:169px;" /></a>
				<center class="wow fadeInUp auto">
				<h1 style="font-family: Raleway;">Registro:</h1>
					<form enctype="multipart/form-data" action="" method="POST" class="re">
						
						<p style="font-family: Raleway;">Nome Completo: <input type="text" name="name" style="font-family: Raleway; width:auto; border-style:solid; border-radius:6px; border-color:#aaa;"/></p>
						<p style="font-family: Raleway;">Idade: <input type="text" name="idade" style="font-family: Raleway;  width:auto; border-style:solid; border-radius:6px; border-color:#aaa;" id="idade" onfocus="focusGrabbed('idade');" onblur="focusGone('idade');"  maxlength="2" size="2" onkeyup='focusUpdate("idade");'onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )"/> <span id="idadeError"> </span></p>
						<p style="font-family: Raleway;">RM: <input type="text" name="rm" style="font-family: Raleway; border-style:solid; border-radius:6px; border-color:#aaa;" id="rm" onfocus="focusGrabbed('rm');" onblur="focusGone('rm');" maxlength="5" size="5" onkeyup='focusUpdate("rm");'onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )"/> <span id="rmError"> </span></p>
						<p style="font-family: Raleway;">Sexo: <select name="sexo" style="border-style:solid; border-radius:6px; border-color:#aaa;"><option value="m">Masculino</option><option value="f">Feminino</option></select></p>
						<p style="font-family: Raleway;">Interesse: <select name="interesse" style="border-style:solid; border-radius:6px; border-color:#aaa;"><option value="m">Homens</option><option value="f">Mulheres</option></select></p>
						<p style="font-family: Raleway;">Relacionamento: <select name="relacionamento" style="border-style:solid; border-radius:6px; border-color:#aaa;"><option value="0">Solteiro</option><option value="1">Enrolado</option><option value="2">Namorando</option><option value="3">Casado</option></select>
						</p>
						<p style="font-family: Raleway;">Data de Nascimento: <input type="text" name="nascimento" style="font-family: Raleway; border-style:solid; border-radius:6px; border-color:#aaa;" id="campoData" onfocus="focusGrabbed('campoData');" onkeyup="focusUpdate('campoData');"/><span id="campoDataError"></span></p><br class="nomob">
						<p style="font-family: Raleway;">Foto (opcional): <input type="file" name="foto" style="font-family: Raleway; display:inline;" accept="image/*"/></p>
						<p style="font-family: Raleway;">Usuario: <input type="text" name="user" style="font-family: Raleway; border-style:solid; border-radius:6px; border-color:#aaa;" id="user" onfocus="focusGrabbed('user');" onblur="focusGone('user');" onkeyup="focusUpdate('user');" onkeydown='return event.charCode != 32'/><span id="userError"> </span></p>
						<p style="font-family: Raleway;">Senha: <input type="password" name="pass" style="border-style:solid; border-radius:6px; border-color:#aaa;" id="pass" onfocus="focusGrabbed('pass');" onblur="focusGone('pass');" onkeyup="focusUpdate('pass');"/><span id="passError"></span></p>
						<p style="font-family: Raleway;">Repita a senha: <input type="password" name="pass2" style="border-style:solid; border-radius:6px; border-color:#aaa;" id="pass2" onfocus="focusGrabbed('pass2');" onblur="focusGone('pass2');" onkeyup="focusUpdate('pass2');"/><span id="pass2Error"></span></p>
						<p style="font-family: Raleway;">E-Mail: <input type="text" name="email" style="font-family: Raleway;border-style:solid; border-radius:6px; border-color:#aaa;" id="email" onfocus="focusGrabbed('email');" onblur="focusGone('email');" onkeyup="focusUpdate('email');" /><span id="emailError"></span></p>
						<p><button class="btn" style="background:none;border-color:#000;color:#000;font-family: Raleway;" type="submit" name="ok" id="enviar">Enviar</button></p>
					</form>
					<?php
	if(isset($_POST["ok"])){
		$nome = $_POST["name"];
		$idade = $_POST["idade"];
		$rm = $_POST["rm"];
		$sexo = $_POST["sexo"];
		$interesse = $_POST["interesse"];
		$usuario = $_POST["user"];
		$senhaTEMP = $_POST["pass"];
		$senhaTEMP2 = $_POST["pass2"];
		$senha = sha1($senhaTEMP);
		$email = $_POST["email"];
		$dir = "img/".$usuario."/";
		$foto = $_FILES['foto']['name'];
		$relacionamento = $_POST["relacionamento"];
		$nascimento = $_POST["nascimento"];
		if (strpos($nome, '<') !== false || strpos($usuario, '<') !== false || strpos($email, '<') !== false) {
			print "<br><div class='alert alert-danger'>VAI SE FUDER LUCCA!</div>";
			die();
		}
		if($senhaTEMP!=$senhaTEMP2){
			print "<br><div class='alert alert-danger'>Digite senhas iguais</div>";
			die();
		}
		if(strlen($senhaTEMP)<6){
			print "<br><div class='alert alert-danger'>Digite uma senha com pelo menos 6 caracteres</div>";
			die();
		}
		$ano = substr($nascimento,(strlen($nascimento)-4),strlen($nascimento));
		$dia = substr($nascimento,0,2);
		$mes = substr($nascimento,3,2);
		if($ano < 1900 || $ano >= 2016 || $dia > 31 || $mes > 12){
			print "<br><div class='alert alert-danger'>Digite uma data de nascimento valida!</div>";
			die();
		}
		if (strpos($email,'@') !== false) {
			
		}else{
			print "<br><div class='alert alert-danger'>Digite um email valido!</div>";
			die();
		}
		if($nome == "" || $idade == "" || $rm == "" || $sexo == "" || $interesse == "" || $usuario == "" || $senhaTEMP == "" || $email == ""){
			print "<br><div class='alert alert-danger'>Preencha todos os campos</div>";
			die();
		}
		
		if(!is_dir($dir)){
			mkdir($dir,0777);
		}
		if($foto == ""){
		if (copy("img/padrao.png", $dir."/pp.png")) {
			echo "*Uma foto foi gerada para você até você colocar a sua*";
		} else {
			print "<br><div class='alert alert-danger'>Erro ao enviar a foto</div>";
			die();
		}
		}else{
		if (move_uploaded_file($_FILES['foto']['tmp_name'], $dir."/pp.png")) {
		} else {
			print "<br><div class='alert alert-danger'>Erro ao enviar a foto</div>";
			die();
		}
		}
		
		$ok=true;
		$query = "INSERT INTO tbusuario(nome, idade, rm, sexo, interesse, foto, username, senha, email, relacionamento, nascimento) VALUES('$nome',$idade,'$rm','$sexo','$interesse','$foto','$usuario','$senha','$email', $relacionamento, '$nascimento')";
		@mysql_query($query) or $ok=false;
		if($ok){
		if($require_email){
		if(email($usuario,$email)){
		print "<br><div class='alert alert-success'>Usuário registrado com sucesso, um email foi enviado para verificação</div>";
		}else{
		print "<br><div class='alert alert-danger'>Falha no email</div>";
		}
		}else{
		print "<br><div class='alert alert-success'>Usuário registrado com sucesso.</div>";
		}
		}else{
		rmdir($dir);
		print "<br><div class='alert alert-danger'>Usuário/E-mail/RM em uso</div>";
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
	<script src="js/jquery-1.5.2.min.js"></script>
	<script src="js/jquery.maskedinput-1.3.min.js"></script>
	 <script>
 function focusGrabbed(id){
  if(id=="idade"){
   if(document.getElementById(id).value.length<2){
   document.getElementById(id).style.borderColor="#f00";
   document.getElementById("enviar").disabled = true;
   }
   else if(parseInt(document.getElementById(id).value)>30){
   document.getElementById(id).style.borderColor="#f00";
   document.getElementById("enviar").disabled = true;
   }
   else{
	      document.getElementById(id).style.borderColor="#0f0";
		  document.getElementById("enviar").disabled = false;
   }
  }
  if(id=="rm"){
   if(document.getElementById(id).value.length<5){
   document.getElementById(id).style.borderColor="#f00";
   document.getElementById("enviar").disabled = true;
   }  
  }
  if(id=="user"){
   if(document.getElementById(id).value.length<5){
   document.getElementById(id).style.borderColor="#f00";
   document.getElementById("enviar").disabled = true;
   }	  
  }
    if(id=="pass"){
   if(document.getElementById(id).value.length<6){
   document.getElementById(id).style.borderColor="#f00";
   document.getElementById("enviar").disabled = true;
   }   else{
   document.getElementById(id).style.borderColor="#0f0";
   document.getElementById("enviar").disabled = false;
   }	  
  }
  if(id=="pass2"){
   if(document.getElementById(id).value.length<6){
   document.getElementById(id).style.borderColor="#f00";
   document.getElementById("enviar").disabled = true;
   }	   else{
   document.getElementById(id).style.borderColor="#0f0";
   document.getElementById("enviar").disabled = false;
   }  
  }if(id=="email"){
   if(document.getElementById(id).value.length<6){
   document.getElementById(id).style.borderColor="#f00";
   document.getElementById("enviar").disabled = true;
   } 
  }
  if(id=="campoData"){
	if (typeof document.getElementById(id).value.lenght == 'undefined'){
		   document.getElementById(id).style.borderColor="#f00";
   document.getElementById("enviar").disabled = true;
	}
  }
 }
 function IsEmail(email){
    var exclude=/[^@-.w]|^[_@.-]|[._-]{2}|[@.]{2}|(@)[^@]*1/;
    var check=/@[w-]+./;
    var checkend=/.[a-zA-Z]{2,3}$/;
    if(((email.search(exclude) != -1)||(email.search(check)) == -1)||(email.search(checkend) == -1)){return false;}
    else {return true;}
}
 function focusUpdate(id){
  if(id=="idade"){
   if(document.getElementById(id).value.length<2){
   document.getElementById(id).style.borderColor="#f00";
   document.getElementById(id+"Error").style.color="#f00";
   document.getElementById(id+"Error").innerHTML=" <br>Menor que 2 digitos.";
   document.getElementById("enviar").disabled = true;
   }
   else if(parseInt(document.getElementById(id).value)>30 || parseInt(document.getElementById(id).value)<12 ){
   document.getElementById(id).style.borderColor="#f00";
   document.getElementById(id+"Error").style.color="#f00";
   document.getElementById(id+"Error").innerHTML=" <br>Idade inesperada.";
   document.getElementById("enviar").disabled = true;
   }
   else{
   document.getElementById(id).style.borderColor="#0f0";
      document.getElementById(id+"Error").style.color="#0f0";
   document.getElementById(id+"Error").innerHTML=" <img src='img/ok.png' width='20' height='20'/>";
   document.getElementById("enviar").disabled = false;
   }
  }
  if(id=="rm"){
   if(document.getElementById(id).value.length<5){
   document.getElementById(id).style.borderColor="#f00";
   document.getElementById(id+"Error").style.color="#f00";
   document.getElementById(id+"Error").innerHTML=" <br>Menor que 5 digitos.";
   document.getElementById("enviar").disabled = true;
   }	
	}
	if(id=="user"){
   if(document.getElementById(id).value.length<5){
   document.getElementById(id).style.borderColor="#f00";
   document.getElementById(id+"Error").style.color="#f00";
   document.getElementById(id+"Error").innerHTML=" <br>Menor que 5 digitos.";
   document.getElementById("enviar").disabled = true;
   }
  }if(id=="pass"){
   if(document.getElementById(id).value.length<6){
   document.getElementById(id).style.borderColor="#f00";
   document.getElementById(id+"Error").style.color="#f00";
   document.getElementById(id+"Error").innerHTML=" <br>Menor que 6 digitos.";
   document.getElementById("enviar").disabled = true;
   }else{
   document.getElementById(id).style.borderColor="#0f0";
      document.getElementById(id+"Error").style.color="#0f0";
   document.getElementById(id+"Error").innerHTML=" <img src='img/ok.png' width='20' height='20'/>";
   document.getElementById("enviar").disabled = false;
   }	  
  }if(id=="pass2"){
   if(document.getElementById(id).value.length<6 || document.getElementById(id).value!=document.getElementById("pass").value){
   document.getElementById(id).style.borderColor="#f00";
   document.getElementById(id+"Error").style.color="#f00";
   document.getElementById(id+"Error").innerHTML=" <br>Senhas diferentes.";
   document.getElementById("enviar").disabled = true;
   }else{
   document.getElementById(id).style.borderColor="#0f0";
      document.getElementById(id+"Error").style.color="#0f0";
   document.getElementById(id+"Error").innerHTML=" <img src='img/ok.png' width='20' height='20'/>";
   document.getElementById("enviar").disabled = false;
   }	  
  }if(id=="campoData"){
	  var nascimento = ""+document.getElementById(id).value;
	  var ano = nascimento.substring(nascimento.length-4, nascimento.length);
	  var dia = nascimento.substring(0,2);
	  var mes = nascimento.substring(3,5);
	  
	if(document.getElementById(id).value.indexOf("_") > -1){
   document.getElementById(id).style.borderColor="#f00";
   document.getElementById(id+"Error").style.color="#f00";
   document.getElementById(id+"Error").innerHTML=" <br>Preencha a data.";
   document.getElementById("enviar").disabled = true;
	}

	else if(ano < 1986 || ano >= 2016 || dia > 31 || mes > 12){
		alert(dia+"/"+mes+"/"+ano);
			   document.getElementById(id).style.borderColor="#f00";
   document.getElementById(id+"Error").style.color="#f00";
   document.getElementById(id+"Error").innerHTML=" <br>Digite uma data válida.";
   document.getElementById("enviar").disabled = true;
		}
	else{
	document.getElementById(id).style.borderColor="#0f0";
  document.getElementById(id+"Error").style.color="#0f0";
   document.getElementById(id+"Error").innerHTML=" <img src='img/ok.png' width='20' height='20'/>";
   document.getElementById("enviar").disabled = false;
	}
  }
 }
 </script>
 <script>
$(document).ready(function() {  
  
        //the min chars for username  
        var min_chars = 5;  
  
        //result texts  
        var checking_html = '<br> Verificando...';  
  
        //when button is clicked  
        $('#user').keyup(function(){  
            //run the character number check  
            if($('#user').val().length < min_chars){  
            }else{  
                //else show the cheking_text and run the function to check  
                $('#userError').html(checking_html);  
                check_availability();  
            }  
        });
		$('#rm').keyup(function(){  
            //run the character number check  
            if($('#rm').val().length < min_chars){  
            }else{  
                //else show the cheking_text and run the function to check  
                $('#rmError').html(checking_html);  
                check_availability3();  
            }  
        });
		$('#email').keyup(function(){ 
		if(document.getElementById("email").value.indexOf("@") > -1 && document.getElementById("email").value.indexOf(".") > -1){
			                $('#emailError').html(checking_html);  
                check_availability2(); 
   }else{
	   document.getElementById("email").style.borderColor="#f00";
   document.getElementById("email"+"Error").style.color="#f00";
   document.getElementById("email"+"Error").innerHTML=" <br>Email invalido.";
   document.getElementById("enviar").disabled = true;
   }		 
        });  		
  
  });  
  
//function to check username availability  
function check_availability(){  
  
        //get the username  
        var username = $('#user').val();  
  
        //use ajax to run the check  
        $.post("check_username.php", { username: username },  
            function(result){  
                //if the result is 1  
                if(result == 1){  
                    //show that the username is available 
					document.getElementById("user").style.borderColor="#0f0";
					document.getElementById("userError").style.color="#0f0";					
                    $('#userError').html("<img src='img/ok.png' width='20' height='20'/>");  
					document.getElementById("enviar").disabled = false;
                }else{  
                    //show that the username is NOT available  
					document.getElementById("user").style.borderColor="#f00";
					document.getElementById("userError").style.color="#f00";
                    $('#userError').html("<br>"+username + ' não está disponivel!');
					document.getElementById("enviar").disabled = true;					
                }  
        });  
  
}function check_availability2(){  
  
        //get the username  
        var username2 = $('#email').val();  
  
        //use ajax to run the check  
        $.post("check_email.php", { username2: username2 },  
            function(result2){  
                //if the result is 1  
                if(result2 == 1){  
                    //show that the username is available 
					document.getElementById("email").style.borderColor="#0f0";
					document.getElementById("emailError").style.color="#0f0";					
                    $('#emailError').html("<img src='img/ok.png' width='20' height='20'/><br>Lembre-se que um email de validação será enviado!");  
					document.getElementById("enviar").disabled = false;
                }else{  
                    //show that the username is NOT available  
					document.getElementById("email").style.borderColor="#f00";
					document.getElementById("emailError").style.color="#f00";
                    $('#emailError').html("<br>"+username2 + ' não está disponivel!');
					document.getElementById("enviar").disabled = true;					
                }  
        });  
  
} function check_availability3(){  
  
        //get the username  
        var username3 = $('#rm').val();  
  
        //use ajax to run the check  
        $.post("check_rm.php", { username3: username3 },  
            function(result3){  
                //if the result is 1  
                if(result3 == 1){  
                    //show that the username is available 
					document.getElementById("rm").style.borderColor="#0f0";
					document.getElementById("rmError").style.color="#0f0";					
                    $('#rmError').html("<img src='img/ok.png' width='20' height='20'/>");  
					document.getElementById("enviar").disabled = false;
                }else{  
                    //show that the username is NOT available  
					document.getElementById("rm").style.borderColor="#f00";
					document.getElementById("rmError").style.color="#f00";
                    $('#rmError').html("<br>"+username3 + ' não está disponivel!');
					document.getElementById("enviar").disabled = true;					
                }  
        });  
  
}  
</script>
	<script>
		jQuery(function($){
       $("#campoData").mask("99/99/9999");
		});
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
