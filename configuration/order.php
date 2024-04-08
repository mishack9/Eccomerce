
<?php
session_start();
include("./database.php");
include("./function.php");

if(isset($_POST['submit'])){
$user_id = $_POST['user_id'];
$ip_address = getIpAddress();
$total_price = $_SESSION['total'];
$invoice_number = mt_rand();
$order_status = "pending....";
$email = $_POST['email'];
$pincode = $_POST['pincode'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$tracking_id = "XAMPP".rand(4195, 5678).strtolower($email).$ip_address;
$payment_mode = "COD";
$payment_id = $_POST['payment_id'];
$date = date("Y-m-d h:i");

$query = "INSERT INTO orders (user_id, ip_address, total_price, invoice_number, order_status, email, pincode, phone, address, tracking_id, payment_mode, payment_id, date) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = mysqli_stmt_init($conn);
$prepare = mysqli_stmt_prepare($stmt, $query);
if($prepare){
    mysqli_stmt_bind_param($stmt, "isiisssisssis",  $user_id, $ip_address, $total_price, $invoice_number, $order_status, $email, $pincode, $phone, $address, $tracking_id, $payment_mode, $payment_id, $date);
    mysqli_stmt_execute($stmt);
    $order_id = $stmt->insert_id;
  }  else {
        $error = mysqli_error($conn);
        echo $error;
    }






foreach($_SESSION['cart'] as $key => $value){
    $products = $_SESSION['cart'][$key];

    $product_id = $products['id'];
    $product_title = $products['product_title'];
    $product_quantity = $products['quantity'];
    $product_price = $products['product_price'];
    $product_image = $products['image1'];
    //insert with user_id and ip_address and order_id

    $stmt = $conn->prepare("INSERT INTO order_list_items (order_id, user_id, ip_address, invoice_number, product_id, product_title, product_quantity, product_price, image, date) VALUES(?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("iisiisiisi", $order_id, $user_id, $ip_address, $invoice_number, $product_id, $product_title, $product_quantity, $product_price, $product_image, $date);
    $stmt->execute();

}

  $sql_delete_cart = mysqli_query($conn, "DELETE FROM cart WHERE product_id = '$product_id' AND ip_address = '$ip_address'");

     header("location: ../account.php?order=Your order have been submitted successfully....");
    
     

}