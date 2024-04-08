
<?php
session_start();
include("./includes/header.php");
?>

<!--Home-->
<section id = "home">
  <div class="container">
    <h2>NEW AREA</h2>
    <h1 class = "text-white"><span>Best area for shopping</span> and many more</h1>
    <p class = "text-light">Shop for pleasure and Satisfaction..</p>
    <em>
      <p class = "text-light">Get the best experience out of the best !!!</p>
    </em>
    <a href="all.php"><button class = "">Shop_Now</button></a>
  </div>
</section>

<!--brand
<section id = "brand">
  <div class="row">
    <img src="./assests/img/logo.jpg" class = "img-fluid col-lg-3 col-md-6 col-sm-6" alt="">
    <img src="./assests/img/logo.jpg" class = "img-fluid col-lg-3 col-md-6 col-sm-6" alt="">
    <img src="./assests/img/logo.jpg" class = "img-fluid col-lg-3 col-md-6 col-sm-6" alt="">
    <img src="./assests/img/logo.jpg" class = "img-fluid col-lg-3 col-md-6 col-sm-6" alt="">
  </div>
</section>
-->

<!--New-->
<section id = "new" class = "w-100">
  <div class="row p-0 m-0">
    <!--one-->
    <div class="one col-lg-4 col-md-12 col-sm-6 p-0">
      <img src="./assests/img/shop.jpg" class = "img-fluid" alt="">
      <div class="details">
        <h2>Enjoy shoping for pleasure</h2>
        <button class = "text-uppercase">Shop-Now</button>
      </div>
    </div>
    <!--two-->
    <div class="one col-lg-4 col-md-12 col-sm-6 p-0">
      <img src="./assests/img/shop.jpg" class = "img-fluid" alt="">
      <div class="details">
        <h2>Enjoy shoping for pleasure</h2>
        <button class = "text-uppercase">Shop-Now</button>
      </div>
    </div>
    <!--three-->
     <div class="one col-lg-4 col-md-12 col-sm-6 p-0">
      <img src="./assests/img/shop.jpg" class = "img-fluid" alt="">
      <div class="details">
        <h2>Enjoy shoping for pleasure</h2>
        <button class = "text-uppercase">Shop-Now</button>
      </div>
    </div>
  </div>
</section>

<!--feature-->
<section id = "feaature" class = "my-5 pb-5 mt-1">
  <div class="container mt-3 py-1 my-1">
    <h3>Our Product</h3>
    <hr style = "width:100px; color:coral; border:2px solid coral">
    <h2>This are some of our products</h2>
  </div>
  <div class="row mx-auto container-fluid">
    <?php include("./configuration/get-product.php"); ?>
    <?php while($row = $product->fetch_assoc()) { ?>
    <div class="product text-center col-lg-3 col-md-4 col-sm-6">
      <img src="assests/img/<?php echo $row['image1'] ?>" class = "img-fluid mb-3" alt="" style = "object-fit:contain">
      <div class="start">
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
      </div>
      <h5 class = "p-name"><?php echo $row['product_title']  ?></h5>
      <h4><i class="fas fa-naira-sign-o"></i> <?php echo $row['product_price']  ?></h4>
      <a href="<?php echo "product.php?product=" .$row['id'] ?>"><button class = "buy-now text-uppercase">Buy</button></a>
    </div>
<?php } ?>
  </div>
</section>

<!-- banner --> 
<section id = "banner" class = "my-5 py-5 mt-1">
  <div class="container">
    <h2 class = "text-info">SALE'S</h2>
    <h1>best collection's <br> Up to 20% off discount</h1>
    <button class = "text-upper-case">Shop-now</button>
  </div>
</section>


<!--clothes--> 
<section id = "clothes" class = "my-5 pb-5 mt-1">
  <div class="container mt-3 my-1 py-5">
    <h3>Our Product</h3>
    <hr style = "width:100px; color:coral; border:2px solid coral">
    <h2>This are some of our products</h2>
  </div>
  <div class="row mx-auto container-fluid">
    <div class="product text-center col-lg-3 col-md-4 col-sm-6">
      <img src="assests/img/shop.jpg" class = "img-fluid mb-3" alt="">
      <div class="start">
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
      </div>
      <h5 class = "p-name">Clothes</h5>
      <h4><i class="fas fa-naira-sign"></i>345.55</h4>
      <button class = "buy-now text-uppercase">Buy</button>
    </div>
    <div class="product text-center col-lg-3 col-md-4 col-sm-6">
      <img src="assests/img/cloth.jpg" class = "img-fluid mb-3" alt="">
      <div class="start">
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
      </div>
      <h5 class = "p-name">Clothes</h5>
      <h4><i class="fas fa-naira-sign"></i>345.55</h4>
      <button class = "buy-now text-uppercase">Buy</button>
    </div>
    <div class="product text-center col-lg-3 col-md-4 col-sm-6">
      <img src="assests/img/cloth5.jpg" class = "img-fluid mb-3" alt="">
      <div class="start">
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
      </div>
      <h5 class = "p-name">Clothes</h5>
      <h4><i class="fas fa-naira-sign"></i>345.55</h4>
      <button class = "buy-now text-uppercase">Buy</button>
    </div>
    <div class="product text-center col-lg-3 col-md-4 col-sm-6">
      <img src="assests/img/cloth4.jpg" class = "img-fluid mb-3" alt="">
      <div class="start">
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
      </div>
      <h5 class = "p-name">Clothes</h5>
      <h4><i class="fas fa-naira-sign"></i>345.55</h4>
      <button class = "buy-now text-uppercase">Buy</button>
    </div>
  </div>
</section>

<!--shoes-->
<section id = "clothes" class = "my-5 pb-5 mt-1">
  <div class="container mt-3 my-1 py-5">
    <h3>Our Product</h3>
    <hr style = "width:100px; color:coral; border:2px solid coral">
    <h2>This are some of our products</h2>
  </div>
  <div class="row mx-auto container-fluid">
    <div class="product text-center col-lg-3 col-md-4 col-sm-6">
      <img src="assests/img/shop.jpg" class = "img-fluid mb-3" alt="">
      <div class="start">
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
      </div>
      <h5 class = "p-name">Shoes</h5>
      <h4><i class="fas fa-naira-sign"></i>345.55</h4>
      <button class = "buy-now text-uppercase">Buy</button>
    </div>
    <div class="product text-center col-lg-3 col-md-4 col-sm-6">
      <img src="assests/img/cloth.jpg" class = "img-fluid mb-3" alt="">
      <div class="start">
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
      </div>
      <h5 class = "p-name">Shoes</h5>
      <h4><i class="fas fa-naira-sign"></i>345.55</h4>
      <button class = "buy-now text-uppercase">Buy</button>
    </div>
    <div class="product text-center col-lg-3 col-md-4 col-sm-6">
      <img src="assests/img/shoe.jpg" class = "img-fluid mb-3" alt="">
      <div class="start">
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
      </div>
      <h5 class = "p-name">Shoes</h5>
      <h4><i class="fas fa-naira-sign"></i>345.55</h4>
      <button class = "buy-now text-uppercase">Buy</button>
    </div>
    <div class="product text-center col-lg-3 col-md-4 col-sm-6">
      <img src="assests/img/shoe.jpg" class = "img-fluid mb-3" alt="">
      <div class="start">
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
      </div>
      <h5 class = "p-name">Shoes</h5>
      <h4><i class="fas fa-naira-sign"></i>345.55</h4>
      <button class = "buy-now text-uppercase">Buy</button>
    </div>
  </div>
</section>

<!--watches-->
<section id = "clothes" class = "my-5 pb-5 mt-1">
  <div class="container mt-3 my-1 py-5">
    <h3>Our Product</h3>
    <hr style = "width:100px; color:coral; border:2px solid coral">
    <h2>This are some of our products</h2>
  </div>
  <div class="row mx-auto container-fluid">
    <div class="product text-center col-lg-3 col-md-4 col-sm-6">
      <img src="assests/img/shop.jpg" class = "img-fluid mb-3" alt="">
      <div class="start">
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
      </div>
      <h5 class = "p-name">watch</h5>
      <h4><i class="fas fa-naira-sign"></i>345.55</h4>
      <button class = "buy-now text-uppercase">Buy</button>
    </div>
    <div class="product text-center col-lg-3 col-md-4 col-sm-6">
      <img src="assests/img/cloth.jpg" class = "img-fluid mb-3" alt="">
      <div class="start">
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
      </div>
      <h5 class = "p-name">watch</h5>
      <h4><i class="fas fa-naira-sign"></i>345.55</h4>
      <button class = "buy-now text-uppercase">Buy</button>
    </div>
    <div class="product text-center col-lg-3 col-md-4 col-sm-6">
      <img src="assests/img/shoe.jpg" class = "img-fluid mb-3" alt="">
      <div class="start">
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
      </div>
      <h5 class = "p-name">watch</h5>
      <h4><i class="fas fa-naira-sign"></i>345.55</h4>
      <button class = "buy-now text-uppercase">Buy</button>
    </div>
    <div class="product text-center col-lg-3 col-md-4 col-sm-6">
      <img src="assests/img/shoe.jpg" class = "img-fluid mb-3" alt="">
      <div class="start">
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
      </div>
      <h5 class = "p-name">Shoes</h5>
      <h4><i class="fas fa-naira-sign"></i>345.55</h4>
      <button class = "buy-now text-uppercase">Buy</button>
    </div>
  </div>
</section>


<?php include("./includes/footer.php") ; ?>