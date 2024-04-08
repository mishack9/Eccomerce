<?php
ob_start();
session_start();
 include("../configuration/database.php"); 
 include("checklogin.php");
 check_login();
 include("./function/message_function.php");
 include("./includes/header.php"); 

 if(isset($_POST['update_status'])){
    
    $orderstatus = $_POST['orderstatus'];
    $tracking_id = $_POST['tracking_id'];

     $statement = $conn->prepare("UPDATE orders SET order_status = ? WHERE tracking_id = ?");
     $statement->bind_param("ss",  $orderstatus, $tracking_id);
     if($statement->execute()){
        redirect('view_order.php?track=$tracking_id', 'Updated Successfully....');
        ob_end_flush();
     } else {
        redirect('view_order.php?track=$tracking_id', 'Failed to update order status....');
     }
}


 ?>

<?php 

if(isset($_GET['track'])){
   $tracking_id = $_GET['track'];
   $statement = $conn->prepare("SELECT * FROM orders WHERE tracking_id = ?");
   $statement->bind_param('s', $tracking_id);
   $statement->execute();
   $track = $statement->get_result();
   $count = $track->fetch_assoc();
} else {
    header("location: account.php");
}

?>


<div class="py-5">
    <div class="container bordered">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-6">
                    <div class="card pt-2 py-3">
                        <div class="card-header">
                        <div class="card-tools">
                            <a href="order.php" class="btn btn-primary mx-5 px-5 text-warning float-end">Back<i class="fa fas-reply text-light"></i></a>
                        </div>
                            <h4 class = "text-primary">User Order_Details</h4>
                        </div>
                       
                        <div class="card-body">
                            <div class="row container">
                                <div class="col-md-6 col-lg-6 col-sm-6">
                                    <h4><em class="text-center text-primary">Delivery Details</em></h4>
                                    <div class="row container">
                                        <div class="col-md-12 col-lg-12 col-sm-6">
                                          <label for="" class = "fw-bold">Name</label>
                                          <div class="border p-1 mt-2 mb-2">
                                          <?php echo $count['email'] ?>
                                         </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-sm-6">
                                          <label for="" class = "fw-bold">Phone_Number</label>
                                          <div class="border p-1 mt-2 mb-2">
                                          <?php echo $count['phone'] ?>
                                         </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-sm-6">
                                          <label for="" class = "fw-bold">Tracking_Number</label>
                                          <div class="border p-1 mt-2 mb-2">
                                          <?php echo $count['tracking_id'] ?>
                                         </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-sm-6">
                                          <label for="" class = "fw-bold">Phone_Number</label>
                                          <div class="border p-1 mt-2 mb-2">
                                          <?php echo $count['phone'] ?>
                                         </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-sm-6">
                                          <label for="" class = "fw-bold">Address</label>
                                          <div class="border p-1 mt-2 mb-2">
                                          <?php echo $count['address'] ?>
                                         </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-sm-6">
                                          <label for="" class = "fw-bold">Ip_Address</label>
                                          <div class="border p-1 mt-2 mb-2">
                                          <?php echo $count['ip_address'] ?>
                                         </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-sm-6">
                                          <label for="" class = "fw-bold">Code</label>
                                          <div class="border p-1 mt-2 mb-2">
                                          <?php echo $count['pincode'] ?>
                                         </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12 col-sm-6">
                                          <label for="" class = "fw-bold">Invoice</label>
                                          <div class="border p-1 mt-2 mb-2">
                                          <?php echo $count['invoice_number'] ?>
                                         </div>
                                        </div>
                                    </div> 
                                </div>


                                <div class="col-md-6 col-lg-6 col-sm-6">
                                   <h4><em class="text-center text-primary">Orders Details</em></h4>

                                       <div class="card-card-body">
                                        <div class="table-responsive">
                                            <table class = "table table-bordered table-striped">
                                                <thead>
                                                    <th>Product_image</th>
                                                    <th>Product_name</th>
                                                    <th>Product_price</th>
                                                    <th>Product_quantity</th>
                                                </thead>

                                                <tbody>
                                                <?php
                                             
                                            $query = mysqli_query($conn, "SELECT oli.*, p.*, us.*, o.user_id AS uid, o.order_id AS oid, o.tracking_id AS track FROM order_list_items oli,
                                             orders o, products p, user us WHERE o.order_id = oli.order_id AND o.user_id = oli.user_id AND p.id = oli.product_id AND oli.user_id = us.id AND o.user_id = us.id AND o.tracking_id = '$tracking_id'");
                                             if(mysqli_num_rows($query) > 0){
                                             foreach($query as  $data){   
                                             ?>

                                        <tr>
                                            <td class = "align-middle"><img src="../assests/img/<?php echo $data['image1'] ?>" alt="<?php echo $data['product_title'] ?>" style = "width:35px; height:35px"></td>
                                            <td class = "align-middle"><?php echo $data['product_title'] ?></td>
                                            <td  class = "align-middle"><?php echo $data['product_price'] ?></td>
                                            <td  class = "align-middle"><?php echo $data['product_quantity'] ?></td>
                                        </tr>

                                        <?php } 
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan = "3" class = "danger">No Order Details Available For Now....</td>
                                            </tr>
                                            <?php
                                        }  ?>
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                       </div>

                                       <hr>
                                       <div class="border p-1 mb-3">
                                        <label for="" class = "fw-bold">Payment_Mode::</label>
                                        <span style = "color:coral"><?php echo $count['payment_mode'] ?></span>
                                       </div>
                                          
                                       <form action="" method = "POST">
                                        <input type="hidden" name = "tracking_id" value = "<?php echo $count['tracking_id'] ?>">
                                        <label for="" class = "fw-bold">Orders_Status</label>
                                        <div class="border mb-3 p-2">
                                            <select name="orderstatus" id="" class = "form-select">
                                                
                                                <option value="0" <?php echo $count['order_status'] ==  0 ? 'selected' : '' ?> >Pending...</option>
                                                <option value="1" <?php echo $count['order_status'] ==  1 ? 'selected' : '' ?> >Paid....</option>
                                                <option value="2" <?php echo $count['order_status'] ==  2 ? 'selected' : '' ?> >Cancelled</option>
                                            </select>
                                        </div>

                                        <button type = "submit" name = "update_status" class = "btn btn-primary mx-5 px-5">Update</button>

                                       </form>

                                  <div class="container mt-5 py-5 my-5 text-center">
                                    <button class = "submit" name = "" class = "btn btn-secondary" style = "width:20%" onclick = "window.print()"><i class = "fas fa-print"></i></button>
                                  </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("./includes/footer.php"); ?>
<?php include("./includes/scripts.php"); ?>