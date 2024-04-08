<?php
ob_start();
session_start();
 include("../configuration/database.php"); 
 include("checklogin.php");
 check_login();
 include("./function/message_function.php"); 
 include("./includes/header.php"); 

 //delete product
/* if(isset($_POST['delete_product'])){
    $delete_product = $_POST['catergory_id'];

      $statement = $conn->prepare("DELETE FROM products WHERE id = ?");
      $statement->bind_param("i", $delete_product);
      if($statement->execute()){
       redirect("manage_product.php", "Produdct have been deleted successfully ....");
      }
      else
      {
       redirect("manage_product.php", "Failed while trying to delete this record....");
      }
  }
*/



 // add product
 if(isset($_POST['add_product'])){
    $catergory = $_POST['catergory'];
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $meta_title = $_POST['meta_title'];
     $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];
    $status = isset($_POST['status']) ? '1' : '0';
    $slug = $_POST['slug'];
    $validate_slug = preg_replace('/[^a-zA-Z\-]/', '-', $_POST['slug']);
    $string_to_slug = preg_replace('/-+/', '-', $validate_slug);
    $slug = $string_to_slug;

    $image1 = $_FILES['image1']['name'];
    $temp_image1 = $_FILES['image1']['tmp_name'];

    $image2 = $_FILES['image2']['name'];
    $temp_image2 = $_FILES['image2']['tmp_name'];

    $image3 = $_FILES['image3']['name'];
    $temp_image3 = $_FILES['image3']['tmp_name'];

    $image4 = $_FILES['image4']['name'];
    $temp_image4 = $_FILES['image4']['tmp_name'];


if($product_title != "" && $slug != "" && $meta_description != ""){

     $stmt = $conn->prepare("INSERT INTO products (catergory, product_title, product_price, meta_title, meta_description, meta_keyword, status, slug, image1, image2, image3, image4) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
     $stmt->bind_param("ssssssssssss", $catergory, $product_title, $product_price,  $meta_title, $meta_description, $meta_keyword, $status, $slug, $image1, $image2, $image3, $image4);
     if($stmt->execute()){ 
        
        move_uploaded_file($temp_image1, "../assests/img/$image1");
        move_uploaded_file($temp_image2, "../assests/img/$image2");
        move_uploaded_file($temp_image3, "../assests/img/$image3");
        move_uploaded_file($temp_image4, "../assests/img/$image4");
     redirect("manage_product.php", "New product Added Successfully...");
ob_end_flush();
exit(0);
     } else {
      redirect("manage_product.php", "Failed while adding product...");
     }
 }else{
    redirect("manage_product.php", "All fields are required...");
 }
}
 ?>

 <?php
   if(isset($_REQUEST['add'])){
    ?>
    <style>
        .form-control{
            border:1px solid grey;
            padding:5px;
        }
    </style>
    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                       
                        <div class="container mt-3">
   <div class="card p-3 mb-4">
    <div class="card-header">
        <div class="card-title">
            <a href="./manage_product.php" class = "btn btn-warning mx-5 px-5"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            <div class="text-center">
                <h3>Add_Product</h3>
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
                    <option value="<?php echo $cat->catergory_name ?>"><?php echo $cat->catergory_name ?></option>
                    <?php
                  }
                ?>
              </select>
        </div>
     </div>
       <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Product_Name</label>
            <input type="text" name = "product_title" required class = "form-control" placeholder = "Add product_name....">
        </div>
       </div>
       <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Product_Price</label>
            <input type="number" name = "product_price" required class = "form-control">
        </div>
       </div>
       <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Meta_title</label>
            <input type="text" name = "meta_title" required class = "form-control" placeholder = "Add meta_title....">
        </div>
       </div>
       <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Meta_description</label>
           <textarea name="meta_description" id="" cols="30" rows="10" required class = "form-control" placeholder = "Add Description...."></textarea>
        </div>
       </div>
       <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Meta_keyword</label>
            <input type="text" name = "meta_keyword" required class = "form-control" placeholder = "Add meta_keyword....">
        </div>
       </div>
       <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Status</label>
            <br>
            <input type="checkbox" name = "status" class = "">
        </div>
       </div>
       <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Slug</label>
            <input type="text" name = "slug" required class = "form-control" placeholder = "Add slug....">
        </div>
       </div>
      
       <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
        <div class="form-group">
            <label for="" class = "fw-bold">First_Image</label>
            <input type="file" name = "image1" required class = "form-control" placeholder = "Add catergory name....">
        </div>
     </div>
       <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Second_Image</label>
            <input type="file" name = "image2" required class = "form-control" placeholder = "Add meta_title....">
        </div>
       </div>
       <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Third_image</label>
            <input type="file" name = "image3" required class = "form-control" placeholder = "Add meta_title....">
        </div>
       </div>
       <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Fourth_Image</label>
            <input type="file" name = "image4" required class = "form-control" placeholder = "Add meta_title....">
        </div>
       </div>
       <div class="form-group">
     
            <input type="submit" name = "add_product" class = "btn btn-primary" value = "Add_Product">

        </div>
      
       
   
    </div>
    </form>
    </div>
   </div>
</div>

   </div>
    <?php
   } else {
    ?>
    <div class="container mt-3">
   <div class="card p-3">
    <div class="card-header">
        <div class="card-title">
            <a href="manage_product.php" class = "btn btn-warning mx-5 px-5"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            <div class="text-center">
                <h3>Manage_Products</h3>
            </div>
        </div>
        <div class="card-tools">
            <a href="?add=add" class = "float-end btn btn-primary mx-5 px-5"><i class="fas fa-add"></i></a>
        </div>
    </div>
    <div class="card-body" id = "product_table">
    <div class="row container">
        <div class="table responsive">
            <table class = "table table-all table-striped">
                <thead>
                    <th>S/n</th>
                    <th>Catergory_Name</th>
                    <th>Product_Name</th>
                    <th>Product_Price</th>
                    <th>Status</th>
                    <th>Image1</th>
                    <th>Image2</th>
                    <th>Delete</th>
                    <th>Edith</th>
                </thead>
            
            <?php
            $counter = 1;
            $product = getAll("products");
            if(mysqli_num_rows($product) > 0)
             {
                 while($row = mysqli_fetch_object($product)){
            ?>
            <tbody>
                <tr>
                    <td><?php echo $counter ++  ?></td>
                    <td><?php echo $row->catergory ?></td>
                    <td><?php echo $row->product_title ?></td>
                    <td><?php echo $row->product_price ?></td>
                    <td><?php echo $row->status == '0' ? 'Visible' : 'Hidden' ?></td>
                    <td><img src="../assests/img/<?php echo $row->image1 ?>" alt="" style = "object-fit:contain; height:45px !important; width:45px"></td>
                    <td><img src="../assests/img/<?php echo $row->image2 ?>" alt="" style = "object-fit:contain; height:45px !important; width:45px"></td>
                    <td>
                  
                        <button type = "submit" value = "<?php echo $row->id ?>"  class = "btn btn-danger delete-btn" ><i class = "fas fa-trash"></i></button>
                  
                    </td>
                    <td>
                    <a href="edith_product.php?edith=<?php echo $row->id ?>" class = "btn btn-secondary "><i class="fas fa-pen"></i></a>
                    </td>
                </tr>
            </tbody>
            <?php } } else {
                ?>
                <tr>
                    <td colspan = "9"><h3 class = "text-center text-danger"><em>No record available....</em></h3></td>
                </tr>
                <?php
            } ?>
            </table>
        </div>
    </div>
    </div>
   </div>
</div>
    <?php
   }
 ?>





<?php include("./includes/footer.php"); ?>
<?php include("./includes/scripts.php"); ?>