<?php
function check_login(){
    if(strlen($_SESSION['auth']) == 0){
        $host = $_SERVER['HTTP_HOST'];
        $url = rtrim(dirname($_SERVER['PHP_SELF']), "/\\");
        $extra = "login.php";
        $_SESSION['auth'] = "";
        header("location: http://$host$url/$extra?error=Login to access dashboard......");
    }
}