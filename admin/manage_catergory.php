<?php
ob_start();
session_start();
 include("../configuration/database.php"); 
 include("checklogin.php");
 check_login();
 include("./function/message_function.php"); 
 include("./includes/header.php"); 

 //delete catergory
 /*
 if(isset($_POST['delete_catergory'])){
    $delete_catergory = $_POST['catergory_id'];
 
      $statement = $conn->prepare("DELETE FROM catergory WHERE id = ?");
      $statement->bind_param("i", $delete_catergory);
      if($statement->execute()){
       redirect("manage_catergory.php", "Catergory have been deleted successfully ....");
      }
      else
      {
       redirect("manage_catergory.php", "Failed while trying to delete this record....");
      }
  }
*/

 // add catergory
 if(isset($_POST['add_catergory'])){
    $catergory_name = $_POST['catergory_name'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];
    $status = isset($_POST['status']) ? '1' : '0';
    $slug = $_POST['slug'];
    $validate_slug = preg_replace('/[^a-zA-Z\-]/', '-', $_POST['slug']);
    $string_to_slug = preg_replace('/-+/', '-', $validate_slug);
    $slug = $string_to_slug;

     $stmt = $conn->prepare("INSERT INTO catergory (catergory_name, meta_title, meta_description, meta_keyword, status, slug) VALUES(?,?,?,?,?,?)");
     $stmt->bind_param("ssssss", $catergory_name, $meta_title, $meta_description, $meta_keyword, $status, $slug);
     if($stmt->execute()){
redirect("manage_catergory.php", "New Catergory Added Successfully...");
ob_end_flush();
exit(0);
     } else {
      redirect("manage_catergory.php", "Failed while adding catergory...");
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
            <a href="./manage_catergory.php" class = "btn btn-warning mx-5 px-5"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            <div class="text-center">
                <h3>Add_Catergory</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
    <form action="" method = "POST">
    <div class="row container">
    
     <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
        <div class="form-group">
            <label for="" class = "fw-bold">catergory_name</label>
            <input type="text" name = "catergory_name" required class = "form-control" placeholder = "Add catergory name....">
        </div>
     </div>
       <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
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
       <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Meta_keyword</label>
            <input type="text" name = "meta_keyword" required class = "form-control" placeholder = "Add meta_keyword....">
        </div>
       </div>
       <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Status</label>
            <br>
            <input type="checkbox" name = "status" class = "" placeholder = "Add meta_title....">
        </div>
       </div>
       <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
       <div class="form-group">
            <label for="" class = "fw-bold">Slug</label>
            <input type="text" name = "slug" required class = "form-control" placeholder = "Add slug....">
        </div>
       </div>
      
       <div class="form-group">
     
            <input type="submit" name = "add_catergory" class = "btn btn-primary" value = "Add_Catergory">

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
            <a href="" class = "btn btn-warning mx-5 px-5"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            <div class="text-center">
                <h3>Manage_Catergory</h3>
            </div>
        </div>
        <div class="card-tools">
            <a href="?add=add" class = "float-end btn btn-primary mx-5 px-5"><i class="fas fa-add"></i></a>
        </div>
    </div>
    <div class="card-body" id = "cat_table">
    <div class="row container">
        <div class="table responsive">
            <table class = "table table-all table-striped">
                <thead>
                    <th>S/n</th>
                    <th>catergory_name</th>
                    <th>Meta_title</th>
                    <th>Meta_keyword</th>
                    <th>Status</th>
                    <th>Delete</th>
                    <th>Edith</th>
                </thead>
            
            <?php
            $counter = 1;
              $stmt = $conn->prepare("SELECT * FROM catergory");
              $stmt->execute();
              $catergory = $stmt->get_result();
              while($row = $catergory->fetch_assoc()){
               
            ?>
            <tbody>
                <tr>
                    <td><?php echo $counter ++  ?></td>
                    <td><?php echo $row['catergory_name'] ?></td>
                    <td><?php echo $row['meta_title'] ?></td>
                    <td><?php echo $row['meta_keyword'] ?></td>
                    <td><?php echo $row['status'] == '0' ? 'Visible' : 'Hidden' ?></td>
                    <td>
                        <button type = "submit" name = " " value = "<?php echo $row['id'] ?>" class = "btn btn-danger delete_cat" ><i class = "fas fa-trash"></i></button>
                    </form>
                    </td>
                    <td>
                    <a href="edith_catergory.php?edith=<?php echo $row['id'] ?>" class = "btn btn-secondary"><i class="fas fa-pen"></i></a>
                    </td>
                </tr>
            </tbody>
            <?php } ?>
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