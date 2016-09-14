<?php
include 'config.php';
?>
<html>
<head>
<style>
body{
	background-color:#eee;
	padding-bottom:20px;
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
	.shop-item{
		position:relative;
		background-color:#ddd;
		height: 200px;
		width: 200px;
		float:left;
		margin-left:15px;
		margin-top:10px;
		margin-bottom:10px;
		border: 1px solid #888;
		border-radius: 10px;
		box-shadow: 1px 1px 5px #888888;
		padding-top:10px;
	}
	.shop-desc{
		position:absolute;
		left:50%;
		width:200px;
		top:70px;
		margin-left:-100px;
		line-height:30px;
		font-size:20px;
		
	}
	.shop-description{
		position:absolute;
		left:50%;
		width:200px;
		top:95px;
		margin-left:-100px;
		line-height:20px;
		font-size:15px;
		
	}
	.shop-price{
		position:absolute;
		top:120px;
		left:50%;
		width:200px;
		line-height:17px;
		margin-left:-100px;
		font-size:17px;
		
	}
	.shop-buy{
		background-color:#40C24F;
		border: 1px solid #1C7F28;
		position:absolute;
		bottom:25px;
		height:30px;
		line-height:30px;
		text-align:center;
		left:50%;
		width:70px;
		margin-left:-35px;
		font-size:17px;
		
	}
	a{
		cursor: pointer;
		text-decoration:none;
		color:#fff;
	}
	.shop-img{
		 max-width:70px;max-height:70px;position:absolute;top:5px;left:50%;margin-left:-35px;
	}
</style>
</head>
<body>
<?php if(isset($_GET['fail'])){echo 'fail';}if(isset($_GET['success'])){echo 'success';} ?>
<span class="shop century normal center" style="width:100%; display:block; font-size:25px;">SHOP</span>
<span class="warning century normal center" style="width:100%; display:block; font-size:14px;">Clique fora da loja para fechar</span>
<div id="result"></div>
<script src="//code.jquery.com/jquery.js"></script>
<script>
$(document).ready(function($) {
   $('#result').load('test.php', function() {
  });
});
</script>
</body>
</html>