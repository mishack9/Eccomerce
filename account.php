<?php 
session_start();

include("./configuration/database.php");

include("./checklogin.php");
check_login();

if(isset($_POST['change_password'])){
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $email = $_SESSION['email'];

    if($password !== $confirm_password){
      header("location: account.php?error=Password does not match...");
    }
    if(strlen($password) != 8){
      header("location: account.php?error=Password must be atleast 8 characters...");
    }else{

  $stmt = $conn->prepare("UPDATE user SET password = ? WHERE email = ?");
  $stmt->bind_param("ss", md5($password), $email);
  if($stmt->execute()){
    header("location: account.php?successs=Password have been successfully changed...");
  } else {
    header("location: account.php?error=Fail while phasing this request..");
  }

}
}



?>
<?php  include("./includes/header.php"); ?>



<style>
  .btn{
    background-color:coral;
    color:aliceblue;
    border:none;
    width:60%;
  }
  .btn:hover{
    background-color:green;
    color:blue;
  }
</style>
<section class = "my-5 py-5">
<div class="text-center">
          <em> <span style = "color:green; font-size:15px;"><?php 
       
       if(isset($_GET['success'])){
         $success = $_GET['success'];
         echo $success;
         unset($_GET['success']);
       }
       
        ?>
        
       </span> </em>
       <div class="text-center">
          <em> <span style = "color:green; font-size:15px;"><?php 
       
       if(isset($_GET['order'])){
         $order = $_GET['order'];
         echo $order;
         unset($_GET['order']);
       }
       
        ?>
        
       </span> </em>

<div class="row container mx-auto justify-content-center">
      <div class="col-lg-6 col-md-6 col-sm-6">
        <h3 class = "fw-bold">Account Info</h3>
       <hr class = "mx-auto">
       <div class="account-info">
        <p>Name: <span style = "color:coral; font-width:bold"><?php echo $_SESSION['username'] ?></span></p>
        <p>Email: <span style = "color:coral; font-width:bold"><?php echo $_SESSION['email']  ?></span></p>
        <p><a href="" id = "order-btn">Your Order</a></p>
        <p><a href="logout.php" id = "logout-btn">Logout</a></p>
       </div>
</div>
      
       <div class="col-lg-6 col-md-6 col-sm-6 ">
        <form action="account.php" method = "POST" id = "account-form">
        <div class="text-center">
          <em> <span style = "color:red; font-size:15px;"><?php 
       
       if(isset($_GET['error'])){
         $error = $_GET['error'];
         echo $error;
        
       }
       
        ?>
        
       </span> </em>
       <div class="text-center">
          <em> <span style = "color:green; font-size:15px;"><?php 
       
       if(isset($_GET['successs'])){
         $successs = $_GET['successs'];
         echo $successs;
         
       }
      
       
        ?>
        
       </span> </em>
            <h3>Change Password</h3>
            <hr class = "mx-auto">
            <div class="form-group">
                <label for="" class = "fw-bold">Password</label>
                <input type="password" class = "form-control" id = "account-password" name = "password" placeholder = "password" required>
            </div>

            <div class="form-group">
                <label for="" class = "fw-bold">Confirm_Password</label>
                <input type="password" class = "form-control" id = "account-password-confirm" name = "confirm_password" placeholder = "Confirm_password" required>
            </div>

            <div class="form-group">
                <input type="submit" class = "rounded-pill" name = "change_password" id = "change-pass-btn" style = "border:none; width:30%" value = "Save">
            </div>

        </form>
   </div>  
    </div> 

</section>

<!--
<div class="text-center mt-4">
<?php //if(isset($_SESSION['login'])) {?>

<a href="checkout.php" class = "btn btn-primary text-light mx-5 px-5">Place_Order</a>

<?php//  } ?>
</div>

-->

<div class="container" >
<a href="shop.php" class = "text-primary mx-5 px-5" style = "text-decoration:none; font-size:20px">Continue shopping</a>
</div>


<!--orders--> 
<section class = "order container mt-2 mb-5 py-2">
    <div class="container border p-3">
        <h2 class = "font-weight-bold">Your Orders</h2>

        <div class="table-responsive">
           <table class = "mt-3 pt-3 table-all table-striped">
            <thead>
                <th>S/n</th>
                <th>Order_id</th>
                <th>Total_price</th>
                <th>Order_status</th>
                <th>Invoice</th>
                <th>Tracking_No</th>
                <th>Order_date</th>
                <th>Operation</th>
            </thead>
            <tbody>
<?php
  $counter = 1;
  if(isset($_SESSION['login'])){
  $user_id = $_SESSION['user_id'];
$statement = $conn->prepare("SELECT * FROM orders WHERE user_id = ?");
$statement->bind_param('i', $user_id);
$statement->execute();
$user = $statement->get_result();

while($count = $user->fetch_assoc()){
?>
                <tr>
        
<td><?php  echo $counter++ ?></td>
<td><?php echo $count['order_id'] ?></td>
<td><?php echo $count['total_price'] ?></td>
<td><?php echo $count['order_status'] ?></td>
<td><?php echo $count['invoice_number'] ?></td>
<td><?php echo $count['tracking_id'] ?></td>
<td><?php echo $count['date'] ?></td>
<td>
  
  <a href="view_order.php?track=<?php echo $count['tracking_id'] ?>"  class = "">View</a>
 
</td>                
                </tr>
<?php 
} } ?>
            </tbody>
           </table>

           
        </div>

    </div>

  
</section>



<!--footer --> 
<?php  include("./includes/footer.php"); ?>