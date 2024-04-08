<?php
session_start();
include("../configuration/database.php");

if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = md5($_POST['password']);

     $stmt = $conn->prepare("SELECT id, username, email, password FROM admintable WHERE email = ? AND password = ? LIMIT 1");
     $stmt->bind_param("ss", $email, $password);
     $stmt->execute();
     $stmt->bind_result($user_id, $username, $useremail, $userpaswword);
     $stmt->store_result();

     if($stmt->num_rows() > 0){
      $stmt->fetch();
      $_SESSION['id'] = $user_id;
      $_SESSION['username'] = $usernamen;
      $_SESSION['email'] = $useremail;
      $_SESSION['auth'] = true;

      header("location: index.php?succes=successfully logged in...");

     } else {
      header("location: login.php?error=Invalid password...");
     }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
   <link rel = "stylesheet" href = "../assests/css/style.css">
   <script>
    function availability(){
      $("#loaderIcon").show();
      jQuery.ajax({
      type: "POST",
      url: "code.php",
      data: 'checkemail='+$("#email").val(),

      success: function(data){
        $("#checkuserAvailability").html(data);
        $("#loaderIcon").hide();
      },
      error:function(){}
      });
    }
   </script>
</head>
<body>
   

<section class = "my-5 py-5 mt-5">
    <div class="container text-center mt-5">
        <h2 class = "font-weight-bold">LOGIN FORM</h2>
      
    </div>
    <div class="mx-auto container mt-5">
      <form action="" method = "POST" role = "form" id = "login-form">
      <div class="form-group">
      <div class="text-center text-success" style = "font-size:17px">
           <span><em>
                    <?php
                    if(isset($_GET['success'])){ echo $_GET['success']; }
                    ?>
           </em></span>
         </div>
         <div class="text-center text-danger" style = "font-size:17px">
           <span><em>
                    <?php
                    if(isset($_GET['error'])){ echo $_GET['error']; }
                    ?>
           </em></span>
         </div>
        <div class="form-group">
            <label for="" class = "fw-bold">Email</label>
            <input type="email" required class = "form-control"  onBlur = "availability()" id = "email" name = "email" placeholder = "Email">
            <span id = "checkuserAvailability" style = "font-size:15px">  <em> </em> </span>
        </div>

        <div class="form-group">
            <label for="" class = "fw-bold">Password</label>
            <input type="password" required class = "form-control" name="password" id="login-password" name = "password" placeholder = "Password">
        </div>
        <div class="form-group">
            <input type="submit" class = "btn btn-primary" value = "Login" style = "width:30%" id="submit" name = "submit">
        </div>

        <div class="form-group">
        <p>Don't have an account ?<a href="register.php" id = "register-url" class = "btn">Register </a></p>
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