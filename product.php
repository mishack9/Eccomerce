<?php
session_start();
include("./configuration/database.php");
if(isset($_GET['product'])){

  $product_id = $_GET['product'];
  $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
  $stmt->bind_param("i", $product_id);
  $stmt->execute();
  $single_product = $stmt->get_result();

} else {
    header("location: index.php");
}
?>
<?php include("./includes/header.php"); ?>



<!--product-->
<section class = "single-product container my-5">
<div class="container">
    <h1>Your selection</h1>
   
  </div>
    <div class="row my-3 py-4 align-items-right">
      <?php
       while($row = $single_product->fetch_assoc()){ 
       $cat = $row['catergory'];
         ?>
             <div class="col-md-6 col-lg-6 col-sm-12">
            <img src="assests/img/<?php echo $row['image1'] ?>" class = "img-fluid w-100 pb-1" alt="" id = "mainImg">
            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="assests/img/<?php echo $row['image1'] ?>" class = "small-img" width = "100%"  alt="">
                </div>
                <div class="small-img-col">
                    <img src="assests/img/<?php echo $row['image2'] ?>" class = "small-img" width = "100%"  alt="">
                </div>
                <div class="small-img-col">
                    <img src="assests/img/<?php echo $row['image3'] ?>" class = "small-img" width = "100%"  alt="">
                </div>
                <div class="small-img-col">
                    <img src="assests/img/<?php echo $row['image4'] ?>" class = "small-img" width = "100%"  alt="">
                </div>
            </div>
        </div>
       

      <div class="col-lg-6 col-md-12 col-sm-12">
        <h6><span style = "color:coral">Product</span></h6>
        <h3 class = "py-4"><?php echo $row['product_title'] ?></h3>
        <h2><i class = "fas fa-naira-sign"></i><?php echo $row['product_price'] ?></h2>
        <form action="cart.php" method = "POST">
        <input type="hidden" name = "id" value = " <?php echo $row['id'] ?>">
          <input type="hidden" name = "image1" value = " <?php echo $row['image1'] ?>">
          <input type="hidden" name = "product_title" value = " <?php echo $row['product_title'] ?>">
          <input type="hidden" name = "product_price" value = " <?php echo $row['product_price'] ?>">
        <input type="number" name = "quantity" value = "1">
        <button type = "submit" name = "add_to_cart" class = "buy-btn">Add To Cart</button>
        </form>
        <h4 class = "mt-5 mb-5">Product Details of the particular items</h4>
        <span>
        <?php echo $row['meta_description'] ?>
        </span>
      </div>

      <?php } ?>

    </div>
</section>


<!--related products-->
<section id = "related-product" class = "my-5 py-2 px-5 mt-1">
  <div class="container mt-3 py-5">
    <h1>Related Product'st</h1>
    <hr style = "width:30%; border:3px solid coral">
  </div>
  <div class="row mx-auto container-fluid">
    <?php
      $statement = $conn->prepare("SELECT * FROM products WHERE catergory = ? LIMIT 12");
      $statement->bind_param("s", $cat);
      $statement->execute();
      $related = $statement->get_result();
      while($count = $related->fetch_assoc()){
    ?>
    <div onclick = "window.location.href='<?php echo 'product.php?product='.$count['id'] ?>'" class="product text-center col-lg-3 col-md-4 col-sm-6">
      <img src="assests/img/<?php echo $count['image2'] ?>" class = "img-fluid mb-3" alt="">
      <div class="start">
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
      </div>
      <h5 class = "p-name"><?php  echo $count['product_title']  ?></h5>
      <h4><i class="fas fa-naira-sign"></i><?php echo $count['product_price'] ?></h4>
      <a href="<?php echo 'product.php?product='.$count['id'] ?>"><button class = "buy-now text-uppercase">Buy</button></a>
    </div>
 <?php 

      }

      ?>
    <!--pagination-->
    <nav arial-label = "page navigation example">
        <ul class = "pagination mt-5">
           <li class = "page-item"><a href="" class = "page-link">Previous</a></li>
           <li class = "page-item"><a href="" class = "page-link">1</a></li>
           <li class = "page-item"><a href="" class = "page-link">2</a></li>
           <li class = "page-item"><a href="" class = "page-link">3</a></li>
           <li class = "page-item"><a href="" class = "page-link">4</a></li>
           <li class = "page-item"><a href="" class = "page-link">Next</a></li>
           
        </ul>
    </nav>
  </div>
</section>



<?php  include("./includes/footer.php"); ?>