<?php  
include 'config.php';
//get the username  
$username = $_GET["user"];  
  
//mysql query to select field username if it's equal to the username that we check '  
$result = mysql_query('delete from tbusuario where username = "'. $username .'"');  
 
?><script>window.location.href="adm.php";</script>