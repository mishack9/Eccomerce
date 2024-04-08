<?php
error_reporting(0);
session_start();

include("./configuration/database.php");
include("./configuration/function.php");

if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT id, username, email, password, ip_address FROM user WHERE email = ? AND password = ? LIMIT 1");
    $stmt->bind_param("ss", $email, $password);
    if($stmt->execute()){
      $stmt->bind_result($user_id, $username, $email, $password, $ipaddress);
      $stmt->store_result();

      if($stmt->num_rows() > 0 ){
        $stmt->fetch();
    
  
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['login'] = true;

        header("location: account.php?success=Successfully logged in...");
      } else {
        header("location: login.php?error=Invalid Credentails...");

      }

          

    } else {
      header("location: login.php?error=Fail while phasing request...");

    }
}

?>


<?php  include("./includes/header.php");  ?>



<section class = "my-5 py-5">
    <div class="container text-center mt-3 ">
        <h2 class = "font-weight-bold">LOGIN</h2>
      
    </div>


    <div class="mx-auto container">
      <form action="login.php" method = "POST" id = "login-form">
        <div class="form-group">
          <div class="text-center">
          <em> <span style = "color:red; font-size:15px;"><?php 
       
       if(isset($_GET['error'])){
         $error = $_GET['error'];
         echo $error;
       }
        ?>

       </span> </em>
       <div class="text-center">
          <em> <span style = "color:red; font-size:15px;"><?php 
       if(isset($_GET['success'])) {
        $success = $_GET['success'];
        echo $success;

       }
       ?>

      </span></em>
          </div>
            <label for="" class = "fw-bold">Email</label>
            <input type="text" class = "form-control" id="login-email" name = "email" placeholder = "Email">
        </div>

        <div class="form-group">
            <label for="" class = "fw-bold">Password</label>
            <input type="password" class = "form-control" name="password" id="login-password" placeholder = "Password">
        </div>

        <div class="form-group">
        <input type="submit" class = "btn btn-primary" value = "Login" style = "width:30%" id="" name = "login">
        </div>

        <div class="form-group">
        <a href="registration.php" id = "register-url" class = "btn">Don't have an account ? Register</a>
        </div>

      </form>
    </div>


</section>





<!--footer --> 
<?php include("./includes/footer.php"); ?>