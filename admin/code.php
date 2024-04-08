<?php
include("../configuration/database.php");
include("./function/message_function.php");
//delete product
if(isset($_POST['delete_btn'])){
    $delete_product = $_POST['product_id'];
    $statement = $conn->prepare("DELETE FROM products WHERE id = ?");
    $statement->bind_param("i", $delete_product);
    if($statement->execute()){
        echo 200;
    // redirect("manage_product.php", "Produdct have been deleted successfully ....");
    }
    else
    {
        echo 500;
     //redirect("manage_product.php", "Failed while trying to delete this record....");
    }
}


// delete catergory
if(isset($_POST['delete_cat'])){
    $delete_catergory = $_POST['catergory_id'];
    $statement = $conn->prepare("DELETE FROM catergory WHERE id = ?");
    $statement->bind_param("i", $delete_catergory);
    if($statement->execute()){
        echo 200;
    // redirect("manage_product.php", "Produdct have been deleted successfully ....");
    }
    else
    {
        echo 500;
     //redirect("manage_product.php", "Failed while trying to delete this record....");
    }
}



//check email
if(!empty($_POST['emailid'])){
    $emailid = $_POST['emailid'];

    $stmt = $conn->prepare("SELECT email FROM admintable WHERE email = ?");
    $stmt->bind_param('s', $emailid);
    $stmt->execute();
    $stmt->bind_result($num_row);
    $stmt->store_result();
    $stmt->fetch();
    if($num_row > 0){
        echo "<span style = 'color:red;'><em>This Email Is Already Present Inside Our Database...</em></span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    } else {
        echo "<span style = 'color:green;'><em>Available for registration ...</em></span>";
        echo "<script>$('#submit').prop('disabled', false);</script>";
    }
}



if(!empty($_POST['checkemail'])){
    $checkemail = $_POST['checkemail'];

    $stmt = $conn->prepare("SELECT email FROM admintable WHERE email = ?");
    $stmt->bind_param('s', $checkemail);
    $stmt->execute();
    $stmt->bind_result($num_row);
    $stmt->store_result();
    $stmt->fetch();
    if($num_row > 0){
        echo "<span style = 'color:green;'><em>Available for login..</em></span>";
        echo "<script>$('#submit').prop('disabled', false);</script>";
    } else {
        echo "<span style = 'color:red;'><em>The email you enter does not exit ...</em></span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    }
}





