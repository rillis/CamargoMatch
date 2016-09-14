<?php
include 'config.php';
if(!isset($_GET['type'])){
	die("ERROR");
}
$type = $_GET['type'];
$quantity = $_GET['quantity'];
$id = $_COOKIE['id'];
$points = $_COOKIE['points'];
$price = $_GET['price'];

if(intval($type)==0){
	if($points >= $price){
		echo "<script> persec2 = parent.persec; parent.persec=0; </script>";
		echo "<script> parent.clicks-=".$price."; </script>";
		echo '<script> parent.document.getElementById("points").innerHTML = "Points: "+parent.clicks.toFixed(1);</script>';
		echo '<script> document.cookie = "points="+parent.clicks;</script>';
		mysql_query('UPDATE users SET points = points - '.$price.' WHERE id='.$id);
		echo "<script> parent.persec=persec2; </script>";
		
		echo "<script> parent.perclick*=2; </script>";
		echo '<script> parent.document.getElementById("perclick").innerHTML = "Points/click: "+parent.perclick</script>';
		echo '<script> document.cookie = "perclick="+parent.perclick;</script>';
		mysql_query('UPDATE users SET perclick = perclick * 2 WHERE id='.$id);
		echo '<script> window.location="shop.php?success"; </script>';	
	}else{
		echo '<script> window.location="shop.php?fail"; </script>';
	}
}else{
	if($points >= $price){
		echo "<script> persec2 = parent.persec; parent.persec=0; </script>";
		echo "<script> parent.clicks-=".$price."; </script>";
		echo '<script> parent.document.getElementById("points").innerHTML = "Points: "+parent.clicks.toFixed(1);</script>';
		echo '<script> document.cookie = "points="+parent.clicks;</script>';
		mysql_query('UPDATE users SET points = points - '.$price.' WHERE id='.$id);
		echo "<script> parent.persec=persec2; </script>";
		
		echo "<script> parent.persec+=".$quantity."; </script>";
		echo '<script>parent.document.getElementById("persec").innerHTML = "Points/sec: "+parent.persec.toFixed(1);</script>';
		echo '<script> document.cookie = "persec="+parent.persec;</script>';
		mysql_query('UPDATE users SET persec = persec + '.$quantity.' WHERE id='.$id);
		echo '<script> window.location="shop.php?success"; </script>';
	}else{
		echo '<script> window.location="shop.php?fail"; </script>';
	}
}

?>