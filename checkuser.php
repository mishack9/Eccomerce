<?php
include("./configuration/database.php");

if(!empty($_POST['emailid'])){
    $id = $_POST['emailid'];

    $stmt = $conn->prepare("SELECT email FROM user WHERE email = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->bind_result($num_row);
    $stmt->store_result();
    $stmt->fetch();
    if($num_row > 0){
        echo "<span style = 'color:red'><em>The email you enter already exit...</em></span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    } else {
        echo "<span style = 'color:green'><em>Available for registration...</em></span>";
        echo "<script>$('#submit').prop('disabled', false);</script>";  
    }
}



if(!empty($_POST['check'])){
    $checkemail = $_POST['check'];

    $stmt1 = $conn->prepare("SELECT email FROM user WHERE email = ?");
    $stmt1->bind_param("s", $checkemail);
    $stmt1->execute();
    $stmt1->bind_result($num);
    $stmt1->store_result();
    $stmt1->fetch();

    if($num > 0){
        echo "<span style = 'color:green'><em>Available to place order...</em></span>";
        echo "<script>$('#submit').prop('disabled', false);</script>";  
    } else {
        echo "<span style = 'color:red'><em>Please make sure to submit the email you used in registration in other to submit your orders...</em></span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    }
} 
