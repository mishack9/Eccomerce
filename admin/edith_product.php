<?php
ob_start();
session_start();
 include("../configuration/database.php"); 
 include("checklogin.php");
 check_login();
 include("./function/message_function.php"); 
 include("./includes/header.php"); 
if(isset($_GET['edith'])){
    $id = $_GET['edith'];
 $product = getById("products", $id);
foreach($product as $products){

?>


<div class="container-fluid px-4 border overflow-auto vh-200">
                        <h1 class="mt-4">Dashboard</h1>
                       
                        <div class="container mt-3">
   <div class="card p-3 mb-4">
    <div class="card-header">
        <div class="card-title">
            <a href="./manage_product.php" class = "btn btn-warning mx-5 px-5"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            <div class="text-center">
                <h3>Update_Product</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
    <form action="" method = "POST" enctype = "multipart/form-data">
    <div class="row container">
    
     <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
        <div class="form-group">
            <label for="" class = "fw-bold">catergory_Name</label>
            <br>
              <select name="catergory" id="" class = "form-select">
                <option value="">--Select--</option>
                <?php
                  $catergory  = get_catergory($conn);
                  foreach($catergory as $cat){
                    ?>
                    <option value="<?php echo $cat->catergory_name ?>" <?php  echo $products['catergory'] == $cat->catergory_name ? 'selected' : ''  ?>><?php echo $cat->catergory_name ?></option>
                    <?php
                  }
                ?>
              </select>
        </div>
     </div>
       <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Product_Name</label>
            <input type="text" name = "product_title" required class = "form-control" value = "<?php  echo $products['product_title']  ?>" placeholder = "Add product_name....">
        </div>
       </div>
       <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Product_Price</label>
            <input type="number" name = "product_price" value = "<?php  echo $products['product_price']  ?>" required class = "form-control">
        </div>
       </div>
       <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Meta_title</label>
            <input type="text" name = "meta_title" required class = "form-control" value = "<?php  echo $products['meta_title']  ?>" placeholder = "Add meta_title....">
        </div>
       </div>
       <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Meta_description</label>
           <textarea name="meta_description" id="" cols="30" rows="10" required class = "form-control" placeholder = "Add Description...."><?php  echo $products['meta_description']  ?></textarea>
        </div>
       </div>
       <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Meta_keyword</label>
            <input type="text" name = "meta_keyword" value = "<?php  echo $products['meta_keyword']  ?>" required class = "form-control" placeholder = "Add meta_keyword....">
        </div>
       </div>
       <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Status</label>
            <br>
            <input type="checkbox" name = "status" <?php  echo $products['status'] == '1' ? 'checked' : ''  ?> class = "">
        </div>
       </div>
       <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Slug</label>
            <input type="text" name = "slug" value = "<?php  echo $products['slug']  ?>" required class = "form-control" placeholder = "Add slug....">
        </div>
       </div>
      
       <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
        <div class="form-group">
            <label for="" class = "fw-bold">First_Image</label>
            <div class="mt-2 mb-2">
            <img src="../assests/img/<?php echo $products['image1'] ?>" alt="" height = "100px">
            </div>
            <input type="file" name = "image1" required class = "form-control" placeholder = "Add catergory name....">
        </div>
     </div>
       <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Second_Image</label>
            <div class="mt-2 mb-2">
            <img src="../assests/img/<?php echo $products['image2'] ?>" alt="" height = "100px">
            </div>
            <input type="file" name = "image2" required class = "form-control" placeholder = "Add meta_title....">
        </div>
       </div>
       <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Third_image</label>
            <div class="mt-2 mb-2">
            <img src="../assests/img/<?php echo $products['image3'] ?>" alt="" height = "100px">
            </div>
            <input type="file" name = "image3" required class = "form-control" placeholder = "Add meta_title....">
        </div>
       </div>
       <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Fourth_Image</label>
            <div class="mt-2 mb-2">
            <img src="../assests/img/<?php echo $products['image4'] ?>" alt="" height = "100px">
            </div>
            <input type="file" name = "image4" required class = "form-control" placeholder = "Add meta_title....">
        </div>
       </div>
       <div class="form-group">
     
            <input type="submit" name = "update_product" class = "btn btn-primary" value = "Update_Product">

        </div>
      
       
   
    </div>
    </form>
    </div>
   </div>
</div>

   </div>

   <?php
}
                }

                ?>

 <?php include("./includes/footer.php"); ?>
<?php include("./includes/scripts.php"); ?>