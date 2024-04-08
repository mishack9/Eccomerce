<?php

function check_login(){
    if(strlen($_SESSION['login']) == 0){
        $host = $_SERVER['HTTP_HOST'];
        $url = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = "./login.php";
        $_SESSION['login'] = "";
        header("location: http://$host$url/$extra");
    }
}