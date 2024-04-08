<?php
session_start();
include("configuration/database.php");

$stmt = $conn->prepare("SELECT * FROM products ORDER BY id DESC LIMIT 16");
$stmt->execute();
$products = $stmt->get_result();

?>
<?php  include("./includes/header.php"); ?>

<!--feature-->
<section id = "feaature" class = "my-5 pb-5 mt-1">
  <div class="row mx-auto container-fluid">
  <?php
     while($row = $products->fetch_assoc()){
  ?>
    <div  onclick = "window.location.href='<?php echo 'product.php?product='. $row['id']  ?>';" class="product text-center col-lg-3 col-md-4 col-sm-6 mt-3 mb-3" >
      <img src="assests/img/<?php echo $row['image2'] ?>" class = "img-fluid mb-3" alt="">
      <div class="start">
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
      </div>
      <h5 class = "p-name"><?php echo $row['product_title'] ?></h5>
      <h4><i class="fas fa-naira-sign"></i><?php echo $row['product_price'] ?></h4>
      <a href="<?php echo 'product.php?product='. $row['id']  ?>"><button class = "buy-now text-uppercase">Buy</button></a>
    </div>
    <?php } ?>
  </div>
</section>







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



<!--footer --> 
<?php  include("./includes/footer.php"); ?>