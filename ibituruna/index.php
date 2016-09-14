<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if(isset($_COOKIE['user'])){
	header('Location: jogo.php');
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="javascript">
function valida(){
if(document.form1.user.value.length < 1)
{
alert("Por favor insira o usuario");
return false;
}
else if(document.form1.pass.value.length < 1)
{
alert("Por favor insira a senha");
return false;
}
else
{
return true;
}
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IbiturunaClicker</title>
<style>
	.login{
		<?php if(isset($_GET['login'])){ ?>
		height:540px;
		margin-top:-235px;
		<?php }else{ ?>
		height:455px;
		margin-top:-200px;
		<?php } ?>
		width:400px;
		position:absolute;
		left:50%;
		top:50%;
		margin-left:-200px;
		background-color:#eee;
		border-color:#666;
		border-radius:3px;
		border-width:5px;
		border-style:solid;
	}
	.century{
		font-family:'Century Gothic';
	}
	.normal{
		font-weight:normal;
	}
	.center{
		text-align:center;
	}
	.labelLogin{
		margin-top:40px;
	}
	hr{
		margin:20px;
	}
	.input{
		margin:20px;
		margin-top:0px;
		margin-bottom:0px;
		width:360px;
		height:22px;
		font-size:18px;
	}
	.user{
		margin-bottom:20px;
	}
	.pass{
		margin-bottom:20px;
	}
	.label{
		margin-left:20px;
		display:block;
	}
	.submit{
		background-color:#fff;
		border:1px solid #000;
		border-radius:2px;
		margin-left:320px;
		width:60px;
		height:30px;
	}
	.registro{
		background-color:#fff;
		border:1px solid #000;
		border-radius:2px;
		margin-left:-70px;
		width:140px;
		height:30px;
		position:absolute;
		left:50%;
	}
	.camargo{
		background-color:#fff;
		border:1px solid #000;
		border-radius:2px;
		margin-left:-90px;
		width:180px;
		height:35px;
		position:absolute;
		left:50%;
                top:405px;
	}
	.error{
		background-color:#C05053;
		line-height:50px;
		margin-left:-180px;
		
		width:340px;
		position:absolute;
		left:50%;
		bottom:20px;
		
		border: 1px solid #3E0001;
		color: #3E0001;
		border-radius: 5px;
		padding-left: 20px;
	}
	.success{
		background-color:#67F05D;
		line-height:50px;
		margin-left:-180px;
		
		width:340px;
		position:absolute;
		left:50%;
		bottom:20px;
		
		border: 1px solid #043D00;
		color: #043D00;
		border-radius: 5px;
		padding-left: 20px;
	}
        a{
        cursor:pointer;
        }
</style>
</head>

<body style="margin:0px;overflow:hidden;">
<img src="back.jpg" style="width:100%;height:100%;position:absolute" />
<img src="back.jpg" style="width:100%;height:100%; -webkit-filter: blur(5px); filter: blur(5px); position:absolute" />
<div class="login">
<h1 class="century normal center labelLogin">
Login
</h1>
<hr />
<form method="POST" action="login.php" name="form1" onSubmit="return valida();">
<span class="label century normal">Username:</span>
<input type="text" name="user" class="input user century normal"/><br />
<span class="label century normal">Password:</span>
<input type="password" name="pass" class="input pass"/>
<button type="submit" class="submit">Logar</button>
</form>
<hr />
<a href="register.php"><button class="registro">Registrar-se</button></a>
<hr style="width:360px;position:absolute; top:363px;"/>
<a href="cmg.php"><button class="camargo">Registrar-se com CamargoMatch</button></a>
<?php if(isset($_GET['login']) && strcmp($_GET['login'],"fail")==0){ ?>
<hr style="width:360px;position:absolute; bottom:65px;"/>
<span class="error century normal">Usuário ou senha incorretos!</span>
<?php } ?>
<?php if(isset($_GET['login']) && strcmp($_GET['login'],"success")==0){ ?>
<hr style="width:360px;position:absolute; bottom:65px;"/>
<span class="success century normal">Registrado com sucesso!</span>
<?php } ?>
</div>
</body>
</html>		