<?php
if(isset($_COOKIE['id'])){
	header('Location: profile.php?id='.$_COOKIE['id']);
}
?>
<html>
	<head>
	<link rel="shortcut icon" href="favicon.ico">
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	 <meta name="viewport" content="width=device-width" />
	<title>
		CamargoMatch
	</title>
		<style>
		html, body {height: 100%}

	body {
		padding: 0;
		margin:0;
		font-family: "Raleway";
		color:#000;
		
	}
#bg {	position:absolute;
	position:fixed;
	top:0;
	width:100%;
	height:100%;
    margin:auto;
	overflow:hidden;
    z-index:-1;
	background-image: url("patterns/1.png");
}
#center {
position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
	z-index:2;
}
#center2 {
position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
	z-index:2;
}
.register,.login{
	display:none;
}
#wrap {
position:relative;
 margin-top:100%; color:grey; background-color:#fff; height:100%; background-image: url("patterns/2.png");
 
 }
 .onlymobile{
	 display:none !important;
 }
 #logo{
	 width:960px;height:169px;
 }
 .row{
	 width:500px;
 }
 @media (max-width:720px) {
	#bg{
		z-index:1;
	}
	.row{
		width:100%;
		opacity:0;
	}
	#bg,#wrap{
		width:100%;
	}
	#logo{
		width:350px;
		height:auto;
	}
	#wrap{
		display:none;
		width:0px;
		position:absolute;
		top:100%;
	}
	.slogan{
		font-size:12px;
	}
	.sobre{
		display:none;
	}
	.register,.login{
	display:inline;
	z-index:3;
	}
	.register{
		margin-left:10px;
	}
	.btn{
			border-color:#fff;
			background:none;
	color:#fff;
	z-index:9999;
	}
	.onlymobile{
	 display:inline-block !important;
 }
}
@media (max-width:720px) and (orientation:landscape) {
	#center{
		width:60%;
	}
}
		</style>
		    <script src="js/jquery.min.js"></script>
		<script src="js/smooth-scroll.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">	 
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/animate.css">	
	
	</head>
	<body>
		<div id="bg">
			<center id="center">
			<img id="logo" class="wow zoomInUp" src="camargomatch.png"></img><br>
			<p>
			<h3 class="wow zoomInDown slogan" style="color:#fff; font-family: 'Raleway';">A rede social do Camargo!</h3><br>
			<a  data-scroll href="#wrap" class="sobre"><button class="btn wow zoomInDown" style="background:none;border-color:#fff; color: #fff;">Sobre</button></a>
			</p>
			<p>
			<button class="btn wow fadeInLeft login onlymobile" style="background:none;border-color:#fff; color: #fff; font-size:12px;" onclick="location.href = 'login.php';">Login</button>
			<button class="onlymobile btn wow fadeInRight register" style="background:none;border-color:#fff; color: #fff; font-size:12px;" onclick="location.href = 'registro.php';">Registre-se</button>
			</center>
			</P>
		</div>

<div id="wrap" style="color:#fff; font-family: 'Raleway';">
			<center id="center2" class="">
				<div class="row" style="">
  <div class="col-sm-3 col-md-4 wow fadeInLeft">
    <div class="thumbnail" style="padding-top:20px;">
      <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="color:#555; font-size:50px;"></span>
      <div class="caption">
        <h3>Adaptável</h3>
      </div>
    </div>
  </div>
  <div class="col-sm-3 col-md-4 wow fadeInLeft">
    <div class="thumbnail" style="padding-top:20px;">
      <span class="glyphicon glyphicon-education" aria-hidden="true" style="color:#555; font-size:50px;"></span>
      <div class="caption">
        <h3>Intuitivo</h3>
      </div>
    </div>
  </div>
  <div class="col-sm-3 col-md-4 wow fadeInLeft">
    <div class="thumbnail" style="padding-top:20px;">
      <span class="glyphicon glyphicon-sunglasses" aria-hidden="true" style="color:#555; font-size:50px;"></span>
      <div class="caption">
        <h3>Exclusivo</h3>
      </div>
    </div>
  </div>
</div><br>
<a href="login.php" class=""><button class="btn wow fadeInRight" style="background:none;border-color:#000; color: #000;">Login</button></a><a href="registro.php" class=""><button class="btn wow fadeInRight" style="background:none;border-color:#000; color: #000; margin-left:10px">Registre-se</button></a><br><br>
<a href="sobre.php"><button class="btn wow fadeInUp" style="background:none;border-color:#000; color: #000;">Mais sobre (v1.2)</button></a>
<a href="profile_beta.html"><button class="btn wow fadeInUp" style="background:none;border-color:#000; color: #000;">Perfil beta</button></a>

			</center>
				</div>
	</body>
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