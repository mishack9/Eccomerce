<?php
error_reporting();
session_start();
include("./configuration/database.php");
if(isset($_SESSION['login'])){
    include("./payment.php");
}
 else {
    include("./login.php");
 }