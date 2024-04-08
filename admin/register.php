<?php
session_start();
include("../configuration/database.php");

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmpassword'];
    $phone = $_POST['phone'];

    if($password !== $confirm_password){
        header("location: register.php?error=Your password and confirm_password does not match....");
    } else {
        $hash = md5($password);
       $statement = $conn->prepare("INSERT INTO admintable (username, email, password, phone) VALUES(?,?,?,?)");
       $statement->bind_param("sssi", $username, $email, $hash, $phone);
       if($statement->execute()){
        header("location: login.php?success=Account registration successfully...");
       } else {
        header("location: register.php?success=Fail while running this request...");
       }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registraion Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
   <link rel = "stylesheet" href = "../assests/css/style.css">
   <script>
    function  useravailability(){
        $("#loaderIcon").show();
        jQuery.ajax({
                   url: "code.php",
                   data: 'emailid='+$("#email").val(),
                   type: "POST",

                   success: function(data){
                    $("#checkuserAvailability").html(data);
                    $("#loaderIcon").hide();
                   },

                   error:function(){}
        })
    }
   </script>
</head>
<body>
   

<section class = "my-5 py-5">
    <div class="container text-center mt-3">
        <h2 class = "font-weight-bold">REGISTRATION FORM</h2>
      
    </div>
    <div class="mx-auto container">
      <form action="" method = "POST" role = "form" id = "login-form">
      <div class="form-group">
        <div class="text-center text-danger" style = "font-size:17px">
           <span><em>
                    <?php
                    if(isset($_GET['error'])){ echo $_GET['error']; }
                    ?>
           </em></span>
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
            <input type="password" required class = "form-control" id="login-password" name = "password" placeholder = "Password">
        </div>

        <div class="form-group">
            <label for="" class = "fw-bold">Confirm_Password</label>
            <input type="text" required class = "form-control" id="login-password" name = "confirmpassword" placeholder = "Confirm_password">
        </div>

        <div class="form-group">
            <label for="" class = "fw-bold">Phone_Number</label>
            <input type="number" required class = "form-control" id="login-password" name = "phone" placeholder = "">
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

<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
</body>
</html>