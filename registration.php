<?php
session_start();
include("./configuration/database.php");
include("./configuration/function.php");

if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirmpassword'];
  $phone = $_POST['phone'];
 $ip_address = getIpAddress();
  if($password !== $confirmpassword){
    header("location: registration.php?error=Password and confirm password not match..");
  }
  if(strlen($password) != 8){
    header("location: registration.php?error=Password length should be up to 8 digit..");
  }

    $pass = md5($password);
    $stmt1 = $conn->prepare("INSERT INTO `user`(username, email, password, ip_address, phone) VALUES(?,?,?,?,?)");
    $stmt1->bind_param("sssss", $username, $email, $pass, $ip_address, $phone);
    if($stmt1->execute()){
     
      $user_id = $stmt1->insert_id;
      $_SESSION['user_id'] = $user_id;
      echo "<script>alert('You have successfully registered an account....'); window.location.href='login.php'</script>";
   
    } else {
      header("location: registration.php?error=Fail to register user account...");
    }




  
} 


?>

<?php include("./includes/header.php"); ?>




<section class = "my-5 py-5">
    <div class="container text-center mt-3">
        <h2 class = "font-weight-bold">REGISTRATION FORM</h2>
      
    </div>
    <div class="mx-auto container">
      <form action="registration.php" method = "POST" role = "form" id = "login-form">
      <div class="form-group">
        <div class="text-center">
       <em> <span style = "color:red; font-size:15px;"><?php 
       
      if(isset($_GET['error'])){
        $error = $_GET['error'];
        echo $error;
      }
       ?>
      </span> </em>
        </div>
            <label for="" class = "fw-bold">Username</label>
            <input type="text" required class = "form-control" id="login-username" name = "username" placeholder = "Username">
        </div>

        <div class="form-group">
            <label for="" class = "fw-bold">Email</label>
            <input type="email" required class = "form-control"  onBlur = "useravailability()" id = "email" name = "email" placeholder = "Email">
            <span id = "checkuserAvailability" style = "font-size:15px">  <em> </em> </span>
        </div>

        <div class="form-group">
            <label for="" class = "fw-bold">Password</label>
            <input type="password" required class = "form-control" name="password" id="login-password" name = "password" placeholder = "Password">
        </div>

        <div class="form-group">
            <label for="" class = "fw-bold">Confirm_Password</label>
            <input type="text" required class = "form-control" id="login-password" name = "confirmpassword" placeholder = "Confirm_password">
        </div>

        <div class="form-group">
            <label for="" class = "fw-bold">Phone_Number</label>
            <input type="number" required class = "form-control" name="phone" id="login-password" name = "phone" placeholder = "">
        </div>

        <div class="form-group">
            <input type="submit" class = "btn btn-primary" value = "Register" style = "width:30%" id="submit" name = "submit">
        </div>

        <div class="form-group">
        <p>Already have an account ?<a href="login.php" id = "register-url" class = "btn">Login </a></p>
        </div>

      </form>
    </div>


</section>





<!--footer --> 
<?php include("./includes/footer.php"); ?>