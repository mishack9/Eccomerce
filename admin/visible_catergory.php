<?php
session_start();
 include("../configuration/database.php"); 
 include("checklogin.php");
 check_login();
 include("./function/message_function.php"); 
 include("./includes/header.php");

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
              $stmt = $conn->prepare("SELECT * FROM catergory WHERE status = 0");
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



<?php include("./includes/footer.php"); ?>
<?php include("./includes/scripts.php"); ?>