<?php
function rmcookie($name) 
    { 
        unset($_COOKIE[$name]); 
        return setcookie($name, NULL, -1); 
    } 

rmcookie("id");
rmcookie("perclick");
rmcookie("persec");
rmcookie("points");
rmcookie("user");
header('Location: index.php');
?>