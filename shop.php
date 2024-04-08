<?php
session_start();
include("configuration/database.php");
if(isset($_POST['search'])){

    $product_catergory = $_POST['catergory'];
    $product_price = $_POST['price'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE catergory = ? AND product_price <= ? ");
    $stmt->bind_param("si", $product_catergory, $product_price);
    $stmt->execute();
    $products = $stmt->get_result();  
    

} else {
$stmt = $conn->prepare("SELECT * FROM products ORDER BY id DESC ");
$stmt->execute();
$products = $stmt->get_result();

}
?>

<?php include("./includes/header.php") ?>





<!--feature-->
<section id = "feaature" class = "my-5 py-5 mt-1">
  <div class="row mx-auto container-fluid">
    <div class="col-lg-9 col-md-9 col-sm-6">
<div class="text-center">
  <span style = "color:red; font-size:30px"><em>
   <?php


  ?>
  </em></span>
</div>
      <div class="row">
      <?php while($row = $products->fetch_assoc()){ ?>
    <div onclick = "window.location.href='<?php echo 'product.php?product='. $row['id']  ?>';" class="product text-center col-lg-3 col-md-4 col-sm-6 mb-5">
      <img src="assests/img/<?php echo $row['image1']  ?>" class = "img-fluid mb-3" alt="" style = "object-fit:contain">
      <h5 class = "p-name"><?php echo $row['product_title']  ?></h5>
      <h4><i class="fas fa-naira-sign"></i><?php echo $row['product_price']  ?></h4>
      <a href="<?php echo 'product.php?product='. $row['id']  ?>"><button class = "buy-now text-uppercase">Buy</button></a>
    </div>
    <?php } ?>
   
    </div>
    </div>


 <!--cateergory section-->
<div class="col-lg-3 col-md-3 col-sm-3">
 
<section id = "layout" class = "my-5">
  <div class="container border text-center">
    <h2><em>Catergories</em></h2>
  </div>
  <div class="container">
    <div class="card card-body mt-3 mb-3">
      <form action="" method = "POST">
        <label for="" class = "fw-bold" style = "color:coral"><em><h3>Select Catergory</h3></em></label>
        <hr style = "color:coral; border:2px solid" >
        
        <div class="form-group">
          <input type="radio" name = "catergory" class = "form-radio"/> Shoes
        </div>
<br>
        <div class="form-group">
        <input type="radio" name = "catergory" value = "watches" class = "form-radio" checkdate/> 
        <label for="form-check-label" for = "flexRadioDefaults">Watches</label>
        </div>
<br>
        <div class="form-group">
        <input type="radio" name = "catergory" value = "coats"  class = "form-radio" checked/> 
        <label for="form-check-label" for = "flexRadioDefaults">Coats</label>
        </div>
<br>
        <div class="form-group">
        <input type="radio" name = "catergory" value = "laptops"  class = "form-radio"/> 
        <label for="form-check-label" for = "flexRadioDefaults">Laptos</label>
        </div>
<br>
        <div class="form-group">
        <input type="radio" name = "catergory" value = "gawn"  class = "form-radio" checked/> 
        <label for="form-check-label" for = "flexRadioDefaults">Gawn</label>
        </div>

        <br>
        <div class="form-group">
        <input type="radio" name = "catergory" value = "headphones"  class = "form-radio" checked/> 
        <label for="form-check-label" for = "flexRadioDefaults">Headphones</label>
        </div>

        <br>
        <div class="form-group">
        <input type="radio" name = "catergory" value = "bags"  class = "form-radio" checked/> 
        <label for="form-check-label" for = "flexRadioDefaults">Bags</label>
        </div>

        <br>
        <div class="form-group">
        <input type="radio" name = "catergory" value = "caps"  class = "form-radio" checked/> 
        <label for="form-check-label" for = "flexRadioDefaults">Caps</label>
        </div>

        <br>
        <div class="form-group">
        <input type="radio" name = "catergory" value = "clothes"  class = "form-radio" checked/> 
        <label for="form-check-label" for = "flexRadioDefaults">Clothes</label>
        </div>

        <br>
        
       
        <div class="form-group mt-5">
        <label for="" class = "fw-bold nt-5">Price</label>
        <br>
        <input type="range" name = "price"  min = "1" value = "699868" max = "88888888" class = "form-range w-50"/>
        <div class="w-50">
          <span style = "float:left; color:blue">1</span>
          <span style = "float:right; color:blue">5888</span>
        </div>
  </div>
<br>

        <div class="form-group">
        <input type="submit" name = "search" value = "Search"  class = "btn btn-info text-white float-end"/> 
        </div>

        
      </form>
    </div>
  </div>
</section>


  </div>
    <!--pagination-->
    <nav arial-label = "page navigation example" class = "">
        <ul class = "pagination mt-5">
           <li class = "page-item"><a href="" class = "page-link">Back</a></li>
           <li class = "page-item"><a href="" class = "page-link">1</a></li>
           <li class = "page-item"><a href="" class = "page-link">2</a></li>
           <li class = "page-item"><a href="" class = "page-link">3</a></li>
           <li class = "page-item"><a href="" class = "page-link">4</a></li>
           <li class = "page-item"><a href="" class = "page-link">Next</a></li>
           
        </ul>
    </nav>
 

    </div>
</section>







<?php include("./includes/footer.php") ; ?>