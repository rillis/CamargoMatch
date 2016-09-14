<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IbiturunaClicker</title>
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
else if(document.form1.name.value.length < 1)
{
alert("Por favor insira o seu nome");
return false;
}
else if(document.form1.pass2.value.length < 1)
{
alert("Por favor insira a senha novamente");
return false;
}
else
{
return true;
}
}
</script>
<style>
	.login{
		<?php if(isset($_GET['error'])){ ?>
		height:420px;
		margin-top:-210px;
		<?php }else{ ?>
		height:330px;
		margin-top:-165px;
		<?php } ?>
		width:700px;
		position:absolute;
		left:50%;
		top:50%;
		margin-left:-350px;
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
		display:block;
		margin-bottom:20px;
		width:300px;
	}
	.pass{
		margin-bottom:20px;
		width:300px;
	}
	.again{
		width:300px;
	}
	.esquerda{
		float:left;
	}
	.direita{
		float:right;
		border-left-style:inset;
		border-left-width:1px;
	}
	.label{
		margin-left:20px;
		display:block;
	}
	.labeluser{
		margin-left:20px;
		display:inline;
	}
	.submit{
		background-color:#fff;
		border:1px solid #000;
		border-radius:2px;
		position:absolute;
		top:280px;
		right:20px;
		width:80px;
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
</style>
</head>

<body style="margin:0px;overflow:hidden;">
<img src="back.jpg" style="width:100%;height:100%;position:absolute" />
<img src="back.jpg" style="width:100%;height:100%; -webkit-filter: blur(5px); filter: blur(5px); position:absolute" />
<div class="login">
<h1 class="century normal center labelLogin">
Register
</h1>
<hr />
<form method="POST" action="registerInternal.php" name="form1" onSubmit="return valida();">
<div class="esquerda">
<span class="labeluser century normal">Username:</span>
<input type="text" name="user" class="input user century normal"/>
</div>
<div class="direita">
<span class="labeluser century normal">Full Name:</span>
<input type="text" name="name" class="input user century normal"/>
</div>
<div class="esquerda">
<span class="label century normal">Password:</span>
<input type="password" name="pass" class="input pass"/>
</div>
<div class="direita">
<span class="label century normal">Confirm password:</span>
<input type="password" name="pass2" class="input pass again"/>
</div>
<br><button type="submit" class="submit">Registrar</button>
</form>
<?php if(isset($_GET['error']) && strcmp($_GET['error'],"0")==0){ ?>
<hr style="width:660px;position:absolute; bottom:65px;"/>
<span class="error century normal">Senha menor que 6 caracteres!</span>
<?php } ?>
<?php if(isset($_GET['error']) && strcmp($_GET['error'],"1")==0){ ?>
<hr style="width:660px;position:absolute; bottom:65px;"/>
<span class="error century normal">Senhas diferentes!</span>
<?php } ?>
<?php if(isset($_GET['error']) && strcmp($_GET['error'],"2")==0){ ?>
<hr style="width:660px;position:absolute; bottom:65px;"/>
<span class="error century normal">Usuario com espaço!</span>
<?php } ?>
<?php if(isset($_GET['error']) && strcmp($_GET['error'],"3")==0){ ?>
<hr style="width:660px;position:absolute; bottom:65px;"/>
<span class="error century normal">Usuario menor que 6 caracteres!</span>
<?php } ?>
<?php if(isset($_GET['error']) && strcmp($_GET['error'],"3a")==0){ ?>
<hr style="width:660px;position:absolute; bottom:65px;"/>
<span class="error century normal">Usuario maior que 20 caracteres!</span>
<?php } ?>
<?php if(isset($_GET['error']) && strcmp($_GET['error'],"4")==0){ ?>
<hr style="width:660px;position:absolute; bottom:65px;"/>
<span class="error century normal">Não use '&lt;' !</span>
<?php } ?>
<?php if(isset($_GET['error']) && strcmp($_GET['error'],"5")==0){ ?>
<hr style="width:660px;position:absolute; bottom:65px;"/>
<span class="error century normal">Não foi possivel registrar!</span>
<?php } ?>
</div>
</body>
</html>