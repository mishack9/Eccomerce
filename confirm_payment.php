
<?php
session_start();
include("./configuration/database.php");
include("./configuration/function.php");
include("./checklogin.php");
check_login();
$ip = getIpAddress();
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
if(isset($_GET['payment'])){
    $payment = $_GET['payment'];    

    $statement = $conn->prepare("SELECT * FROM order_list_items WHERE order_id = ?");
    $statement->bind_param('i', $payment);
    $statement->execute();
    $order = $statement->get_result();

}    

    if(isset($_POST['pay'])){
        $product_price = $_POST['product_price'];
        $ip_address = $_POST['ip_address'];
        $invoice_number = $_POST['invoice_number'];
        $payment_type = $_POST['payment_type'];
    
      $query = "INSERT INTO payment (order_id, user_id, email, amount, ip_address, invoice_number, payment_type) VALUES(?,?,?,?,?,?,?)";
     $stmt = mysqli_stmt_init($conn);
     $prepare = mysqli_stmt_prepare($stmt, $query);
     if($prepare){
        mysqli_stmt_bind_param($stmt, "iisisis", $payment, $user_id, $email, $product_price, $ip_address, $invoice_number, $payment_type);
        mysqli_stmt_execute($stmt);
     } else {
        $error = mysqli_error($conn);
        echo $error;
     }
    
              $sql_complete = mysqli_query($conn, "UPDATE orders SET order_status = 'Paid' WHERE order_id = '$payment'");
        }



       




?>                                         


<?php  include("./includes/header.php");  ?>






<section class = "my-4 py-4">
    <div class="container text-center">
        <h2 class = "font-weight-bold">CONFIRM_PAYMENT</h2>
      
    </div>

<?php  $row = $order->fetch_assoc(); ?>
    <div class="mx-auto container">
      <form action="" method = "POST" id = "login-form">
        <div class="form-group">
          
          
            <label for="" class = "fw-bold">Amount</label>
            <input type="text" class = "form-control" id="" name = "product_price" placeholder = "" value = "<?php echo $row['product_price'] ?>">
        </div>

        <div class="form-group">
            <label for="" class = "fw-bold">Ip_address</label>
            <input type="text" class = "form-control" name="ip_address" id=""  value = "<?php echo $row['ip_address'] ?>">
        </div>

        <div class="form-group">
            <label for="" class = "fw-bold">Invoice_Number</label>
            <input type="text" class = "form-control" name="invoice_number" id=""  value = "<?php echo $row['invoice_number'] ?>">
        </div>

        <div class="form-group" style = " ">
            <label for="" class = "fw-bold">Payment_Method</label>
            <br>
            <select name="payment_type" id="" class = "form" style = "width:35%; ">
                <option value="paypal">Online</option>
                <option value="offline">Offline</option>
                <option value="Debit-card">Card</option>
            </select>
        </div>

        <div class="form-group mt-3">
        <input type="submit" class = "btn btn-primary" value = "Confirm_payment" style = "width:30%" id="" name = "pay">
        </div>

        

      </form>
    </div>



</section>



<?php  include("./includes/footer.php");  ?>