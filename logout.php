<?php
session_start();


    unset($_SESSION['login']);
    unset($_SESSION['username']);
    unset($_SESSION['user_id']);
    unset($_SESSION['email']);

    session_destroy();
    header("location: login.php");
