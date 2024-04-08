
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
   <link rel = "stylesheet" href = "assests/css/style.css">
   <style>
  /*
    .pagination a{
        color:coral;
        width:50px;
        padding:8px;

    }
    */
    .pagination li:hover a{
        color:#ffff;
        background-color:orange;
       
    }
    .pagination{
      padding:20px;
     
    }
    .pagination li {
      padding:5px;
    }
    
   </style>
   <script>
    function useravailability(){
      $("#loaderIcon").show();
      jQuery.ajax({
       url: "checkuser.php",
       data: 'emailid='+$("#email").val(),
       type: "POST",

           success: function(data){
            $("#checkuserAvailability").html(data);
            $("#loaderIcon").hide();
           },
           error: function() {}
      });
    }
  </script>

<script>
  function availability(){
    $("#loaderIcon").show();
    jQuery.ajax({
      url: "checkuser.php",
      data: 'check='+$("#email").val(),
      type: "POST",
    
      success: function(data){
        $("#checkuserAvailability").html(data);
        $("#loaderIcon").hide();
      },
        error: function() {}
    });
  }
</script>

  <style>
     .pagination a{
        color:coral;
        width:50px;
        padding:8px;

    }
    .pagination li:hover a{
        color:#ffff;
        background-color:orange;
    }
  </style>

</head>
<body>
   <!--navbar-->
   <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-lg sticky-top">
  <div class="container-fluid">
   <img src="./assests/img/shoplogo4.jpg" class = "logo" alt="">
   <div class="brand">Ecomm</div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse nav-button" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="shop.php">Shop</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="all.php">Products</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>
<?php  if(isset($_SESSION['user_id'])) : ?>
        <li class="nav-item">
          <a href=""><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
          <a href="account.php"><i class="fa fa-user" aria-hidden="true"></i></a>
        </li>
<?php endif; ?>

       
      </ul>
     
    </div>
  </div>
</nav> 