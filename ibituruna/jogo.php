<html>
<head>
<?php
include 'config.php';
if(!isset($_COOKIE['id'])){
	die("ERROR");
}
?>
<script>
function fix(number){
var result = number.split(".");
return result[0]+','+result[1];
}
</script>
<script>
var clicks = <?php echo $_COOKIE['points']; ?>;
var persec = <?php echo $_COOKIE['persec']; ?>;
var perclick = <?php echo $_COOKIE['perclick']; ?>;
</script>
<title>
IbiturunaClicker
</title>
<style>
body{
	overflow:hidden;
	background-color:#000;
	color:#fff;
	font-family:'Century Gothic';
	margin:0px;
}
a{
	position:absolute;
    width:100%;
    height:100%;
    top:0;
    left:0;
    text-decoration:none;
    z-index:10;
}
.logout{
	position:relative;
	background-color:#C43C3C;
	width:100px;
	height:35px;
	line-height:35px;
	text-align:center;
	top:20px;
	left:20px;
	color:#fff;
}
.shop{
	position:absolute;
	background-color:#4A53CE;
	width:100px;
	height:35px;
	line-height:35px;
	text-align:center;
	bottom:40px;
	left:50%;
	margin-left:-50px;
	color:#fff;
}
.points{
		height:30px;
		line-height:30px;
		top:20px;
		text-align:center;
		width:500px;
		position:absolute;
		left:50%;
		margin-left:-250px;
		font-size:29px;
}
.persec{
		font-size:14px;
		height:15px;
		line-height:15px;
		top:50px;
		text-align:center;
		width:500px;
		position:absolute;
		left:50%;
		margin-left:-250px;
}
.perclick{
		font-size:14px;
		height:15px;
		line-height:15px;
		top:65px;
		text-align:center;
		width:500px;
		position:absolute;
		left:50%;
		margin-left:-250px;
}
.ranking{
	border-left: 3px solid #77f;
	border-top: 3px solid #77f;
	min-width:160px;
	width:auto;
	max-width:290px;
	line-height:15px;
	font-size:14px;
	height:180px;
	background-color:#ccc;
	color:#000;
	padding:20px;
	position:absolute;
	bottom:0px;
	right:0px;
}
.pointranking{
	font-size:9px;
}
.ibituruna{
	width:212px;
	height:300px;
		position:absolute;
		left:50%;
		top:50%;
		margin-left:-106px;
		margin-top:-150px;
}
.tbshop{
	z-index:10;
	height:500px;
	width:700px;
	position:absolute;
	top:50%;
	left:50%;
	margin-left:-350px;
	margin-top:-250px;
	background-color: #fff;
	border: 5px solid #333;
	display:none;
}
</style>
<link rel="stylesheet" type="text/css" href="test.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
</head>
<body>
<iframe src="shop.php" id="PopUpInformation" class='tbshop'></iframe>
        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
		
<div class="logout">
<a href="logout.php"> </a>
&lt; Logoff
</div>
<span class="points" id="points">Points: <?php echo $_COOKIE['points']; ?></span>
<span class="persec" id="persec">Points/sec: <?php echo $_COOKIE['persec']; ?></span>
<span class="perclick" id="perclick">Points/click: <?php echo $_COOKIE['perclick']; ?></span>



<img src="ibituruna.svg" class="ibituruna" id="ibituruna" onclick="clicks+=perclick;document.getElementById('points').innerHTML = 'Points:'+clicks.toFixed(1);" onmousedown="document.getElementById('ibituruna').style.height = '280px';" onmouseup="document.getElementById('ibituruna').style.height = '300px';">

<div class="shop" style="cursor:pointer" onclick="document.getElementById('PopUpInformation').src=document.getElementById('PopUpInformation').src;var cont = $('#PopUpInformation');cont.show(0);">
Shop
</div>



<div id='ranking' class="ranking">
Ranking:<br>
01. abcdefgdsadsads <span class="pointranking">(100000000000)</span><br>
02. oi <span class="pointranking">(100000000000)</span><br>
03. oi <span class="pointranking">(100000000000)</span><br>
04. oi <span class="pointranking">(100000000000)</span><br>
05. oi <span class="pointranking">(100000000000)</span><br>
06. oi <span class="pointranking">(100000000000)</span><br>
07. oi <span class="pointranking">(100000000000)</span><br>
08. oi <span class="pointranking">(100000000000)</span><br>
09. oi <span class="pointranking">(100000000000)</span><br>
10. oi <span class="pointranking">(100000000000)</span>
</div>
<script src="//code.jquery.com/jquery.js"></script>
<script>
$(document).add(parent.document).mouseup(function(e) {
    var cont = $('#PopUpInformation');
    if (!cont.is(e.target) && cont.has(e.target).length === 0) {
        cont.hide(0);
    }
});
$(document).ready(function() {
	atualiza();
	atualizaseg();
});
function atualiza(){
	$.ajax({
  method: "POST",
  url: "debbug.php",
  data: { clicks: clicks.toFixed(1) }
});
	$.get("ranking.php?id=<?php echo $_COOKIE['id']; ?>", function(resultado){
		$('#ranking').html(resultado);
	})
	setTimeout('atualiza()', 500);
}
function atualizaseg(){
	clicks+=persec/100;
	document.getElementById('points').innerHTML = 'Points:'+fix(clicks.toFixed(1));
	setTimeout('atualizaseg()', 10);
}
</script>
</body>
</html>	