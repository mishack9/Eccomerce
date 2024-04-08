<?php 
session_start();

include("./configuration/database.php");

include("./checklogin.php");
check_login();
include("./includes/header.php");
?>
<?php 
$user_id = $_SESSION['user_id'];
if(isset($_GET['track'])){
   $tracking_id = $_GET['track'];
   $statement = $conn->prepare("SELECT * FROM orders WHERE tracking_id = ? AND user_id = ?");
   $statement->bind_param('si', $tracking_id, $user_id);
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
                            <a href="account.php" class="btn btn-primary mx-5 px-5 text-warning float-end">Back<i class="fa fas-reply text-light"></i></a>
                        </div>
                            <h4 class = "text-primary">Your Order_Details</h4>
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
                                              $user_id = $_SESSION['user_id'];
                                            $query = mysqli_query($conn, "SELECT oli.*, p.*,   o.user_id AS uid, o.order_id AS oid, o.tracking_id AS track FROM order_list_items oli,
                                             orders o, products p WHERE o.order_id = oli.order_id AND o.user_id = '$user_id' AND P.id = oli.product_id");
                                             if(mysqli_num_rows($query) > 0){
                                             foreach($query as  $data){
                                                
                                             
                                            
                                        ?>

                                        <tr>
                                        <td class = "align-middle"><img src="./assests/img/<?php echo $data['image1'] ?>" alt="<?php echo $data['product_title'] ?>" style = "width:35px; height:35px"></td>
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
                                            <?php  if(isset($_SESSION['total'])) : ?>
                                            <div class="container float-end">
                                                <span class = "fw-bold">Total_Price</span> <span style = "color:coral"><?php echo $_SESSION['total']; ?> </span>
                                            </div>
                                            <?php  endif; ?>
                                        </div>
                                       </div>

                                       <hr>
                                       <div class="border p-1 mb-3">
                                        <label for="" class = "fw-bold">Payment_Mode::</label>
                                        <span style = "color:coral"><?php echo $count['payment_mode'] ?></span>
                                       </div>

                                       <div class="border p-1 mb-3">
                                        <label for="" class = "fw-bold">Order_status::</label>
                                        <span style = "color:coral"><?php 

                                        if($count['order_status'] ==  0){
                                            echo "Pending....";
                                        } else if($count['order_status'] == 1){
                                            echo "Paid....";
                                        } else if($count['order_status'] == 2) {
                                            echo "Cancelled....";
                                        }
                                         
                                         ?></span>
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


<!--footer --> 
<?php  include("./includes/footer.php"); ?>