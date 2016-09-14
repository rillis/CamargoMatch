<?php
include 'config.php';
function mail_utf8($to, $from_user, $from_email, 
                                             $subject = '(No subject)', $message = '')
   { 
      $from_user = "=?UTF-8?B?".base64_encode($from_user)."?=";
      $subject = "=?UTF-8?B?".base64_encode($subject)."?=";

      $headers = "From: $from_user <$from_email>\r\n". 
               "MIME-Version: 1.0" . "\r\n" . 
               "Content-type: text/html; charset=UTF-8" . "\r\n"; 

     return mail($to, $subject, $message, $headers); 
   }
function email($email){
$headerFields = array(
    "From: adm@camargomatch.16mb.com",
    "MIME-Version: 1.0",
    "Content-Type: text/html;charset=utf-8"
);
	$message = '<html><body style="background-color:#eee">';
	$message .= '<center><h1 style="color:red;font-family:Impact;">CamargoMatch</h1></center>';
	$message .= '<center><h2 style="font-family:\'Century Gothic\'"><b>Email de recuperação:</b></h2></center>';
	$message .= '<center><h3 style="font-family:\'Century Gothic\'">Olá, clique no botão abaixo para mudar a senha da sua conta.</h3><br></center>';
	$message .= '<center><h2><a style="background-color:#66f;font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; border-radius: 3px; padding: 15px 25px; border: 1px solid #256F9C; display: inline-block;" href="#">Alterar</a></h2></center>';
	$message .= '<h4 align="right" style="font-family:\'Lucida Handwriting\'">CamargoMatch Inc., HardUsers 2015-2016</h4>';
	$message .= '</body></html>';
	
	$oi = 'oi';
	
	$envio = mail_utf8($email, "adm@camargomatch.16mb.com", "adm@camargomatch.16mb.com", "oi", "oi");
	return $envio; 
}
?>
<html>
	<head>
	<link rel="shortcut icon" href="favicon.ico">
	<title>
		CamargoMatch
	</title>
	<style>
	@font-face {
		font-family: Ubuntu;
		src: url('fonts/Ubuntu-L.ttf')  format('truetype');
	} 
	@font-face {
		font-family: Ubuntu;
		font-weight: bold;
		src: url('fonts/Ubuntu-B.ttf')  format('truetype');
	}
	body{
	height:100%;
	width:100%;
	background-image: url('patterns/13.png');
	}
	#childCenter{
	width:60%;
	position: absolute;
	top:10%;
	left:20%;
	font-family:'Ubuntu';
	background-color:#eee;
	padding:35px;
	border: 1px solid #aaa;
	border-radius:10px;
	}
	hr{
	width:100%;
	}
	.input{
		margin-top:15px;
		width:50%;
		padding:5px;
		border-radius:3px;
		border: 1px solid #aaa;
		height:28px;
		line-height:28px;
		font-size:18px;	
	}
	.submit{
		margin-top:15px;
		padding: 10px;
		background-color: #fff;
		border-radius:5px;
		border: 1px solid #aaa;
		float:right;
	}
	.message{
		position:absolute;
		top:50%;
		left:20%;
		background-color:#eee;
		border: 1px solid #aaa;
		border-radius:5px;
		width:60%;
		padding:10px;
		font-family:'Ubuntu';
	}
	.error{
		border-color:#A22431;
		background-color:#E6777A;
		color:#000;
	}
	.success{
		border-color:#097B02;
		background-color:#82FB71;
		color:#000;
	}
	</style>
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">	 
	<link rel="stylesheet" href="css/animate.css">
	</head>
	<body>
			<div id="childCenter">
			<?php
			if($require_email){
			?>
            <form action="" method="POST">
            <h2><b>Recuperação de senha:</b></h2>
           	<hr style="    border-top: 1px solid #aaa;"/>
                <h4>Digite o email da sua conta:</h4>
                <input class="input" type="text" name="email" placeholder="Email"></input><br>
                <button type="submit" name="ok" class="submit">Enviar</button>
			</form>
            </div>
            
            
            <?php
            	if(isset($_POST['ok'])){
					include 'config.php';
					$email = $_POST['email'];
					$verifica = mysql_query("SELECT * FROM tbusuario WHERE email = '$email'") or die("<br><div class='alert alert-danger'>Erro ao selecionar</div>");
					if (mysql_num_rows($verifica)<=0){
						header('Location: forget.php?fail');
					}else{
					if(email("rillisgamer@gmail.com")){
                                        echo 'ok';
                                        }else{
                                        echo 'n';
                                        }
					}
				};
            ?>
            <?php
			if(isset($_GET['fail'])){
			?>
            	<div class="message error">Esse email não existe no nosso banco de dados.</div>
            <?php
			}else if(isset($_GET['success'])){
			?>
            	<div class="message success">Um email de recuperação de senha foi enviado.</div>
            <?php
			}
			}else{
				echo '<div class="message error">O sistema de emails está desativado.</div>';
			}
			?>
	</body>
	<script src="js/jquery.min.js"></script>
</html>	