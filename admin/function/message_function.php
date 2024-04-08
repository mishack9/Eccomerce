<?php
include("../configuration/database.php");
function redirect($url, $message){
    $_SESSION['message'] = $message;
    header("location: ", $url);
    exit();
}



function get_catergory($conn){
    $output = array();
    $sql = mysqli_query($conn, "SELECT * FROM catergory WHERE status = 0");
    while($count = mysqli_fetch_object($sql)){
        $output[] = $count;
    }
    return $output;
}

function getAll($table){
    global $conn;
    $sql = "SELECT * FROM $table";
    return $result = mysqli_query($conn, $sql);
}

function getById($table, $id){
    global $conn;
    $sql = "SELECT * FROM $table WHERE id = $id";
    return $result = mysqli_query($conn, $sql);
}