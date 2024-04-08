<?php
ob_start();
session_start();
 include("../configuration/database.php"); 
 include("./function/message_function.php");
 include("checklogin.php");
 check_login(); 
 include("./includes/header.php"); 

  //update catergory
if(isset($_POST['edith_catergory'])){
    $cat_id = $_POST['cat_id'];
    $catergory_name = $_POST['catergory_name'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];
    $status = isset($_POST['status']) ? '1' : '0';
    $slug = $_POST['slug'];
    $validate_slug = preg_replace('/[^a-zA-Z\-]/', '-', $_POST['slug']);
    $string_to_slug = preg_replace('/-+/', '-', $validate_slug);
    $slug = $string_to_slug;
 
      $stsm1 = $conn->prepare("UPDATE catergory SET catergory_name = ?, meta_title = ?, meta_description = ?, meta_keyword = ?,  status = ?, slug = ? WHERE id = ?");
      $stsm1->bind_param("ssssssi", $catergory_name, $meta_title, $meta_description, $meta_keyword, $status, $slug, $cat_id);
      if($stsm1->execute()){
       redirect("manage_catergory.php", "Catergory record updated successfully....");
       ob_end_flush();
       exit(0);
      } else {
       redirect("manage_catergory.php", "Failed while trying to update this record....");
      }
 }



 if(isset($_GET['edith'])){
    $catergory = $_GET['edith'];

    $stmt = $conn->prepare("SELECT * FROM catergory WHERE id = ?");
    $stmt->bind_param("i", $catergory);
    $stmt->execute();
   $cat = $stmt->get_result();
   $row = $cat->fetch_assoc();
 }
 ?>

<div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard/catergory</li>
                        </ol>
                        <div class="container mt-3">
   <div class="card p-3 mb-4">
    <div class="card-header">
        <div class="card-title">
            <a href="./manage_catergory.php" class = "btn btn-warning mx-5 px-5"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            <div class="text-center">
                <h3>Edith_Catergory</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
    <form action="" method = "POST">
    <div class="row container">
    <input type="hidden" name = "cat_id" value = "<?php echo $row['id'] ?>">
     <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
        <div class="form-group">
            <label for="" class = "fw-bold">catergory_name</label>
            <input type="text" name = "catergory_name" class = "form-control" placeholder = "Add catergory name...." value = "<?php echo $row['catergory_name'] ?>">
        </div>
     </div>
       <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Meta_title</label>
            <input type="text" name = "meta_title" class = "form-control" placeholder = "Add meta_title...." value = "<?php echo $row['meta_title'] ?>">
        </div>
       </div>
       <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Meta_description</label>
           <textarea name="meta_description" id="" cols="30" rows="10" class = "form-control" placeholder = "Add Description...."><?php echo $row['meta_description'] ?></textarea>
        </div>
       </div>
       <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Meta_keyword</label>
            <input type="text" name = "meta_keyword" class = "form-control" placeholder = "Add meta_keyword...." value = "<?php echo $row['meta_keyword'] ?>">
        </div>
       </div>
       <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Status</label>
            <br>
            <input type="checkbox" name = "status" <?php echo $row['status'] == '1' ? 'checked' : '' ?> class = "" placeholder = "Add meta_title....">
        </div>
       </div>
       <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Slug</label>
            <input type="text" name = "slug" class = "form-control" placeholder = "Add slug...." value = "<?php echo $row['slug'] ?>">
        </div>
       </div>
      
       <div class="form-group">
     
            <input type="submit" name = "edith_catergory" class = "btn btn-primary" value = "Edith_Catergory">

        </div>
      
       
   
    </div>
    </form>
    </div>
   </div>
</div>

   </div>

   
<?php include("./includes/footer.php"); ?>
<?php include("./includes/scripts.php"); ?>