<?php
function rmcookie($name) 
    { 
        unset($_COOKIE[$name]); 
        return setcookie($name, NULL, -1); 
    } 

rmcookie("id");
rmcookie("nome");
rmcookie("sexo");
rmcookie("interesse");
rmcookie("foto");
rmcookie("username");
rmcookie("email");
rmcookie("relacionamento");
rmcookie("nascimento");
rmcookie("verified");
if(isset($_COOKIE['adm'])){
	rmcookie("adm");
}
header('Location: index.php');
?>