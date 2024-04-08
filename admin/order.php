<?php
session_start();
 include("../configuration/database.php"); 
 include("checklogin.php");
 check_login();
 include("./function/message_function.php"); 
 include("./includes/header.php"); 
 ?>

<!--orders--> 
<section class = "order container mt-2 mb-5 py-2">
    <div class="container border p-3">
        <h2 class = "font-weight-bold">Users Orders</h2>

        <div class="table-responsive">
           <table class = "mt-3 pt-3 table table-all table-striped">
            <thead>
                <th>S/n</th>
                <th>Email</th>
                <th>Order_id</th>
                <th>User_id</th>
                <th>Total_price</th>
                <th>Order_status</th>
                <th>Invoice</th>
                <th>Tracking_No</th>
                <th>Order_date</th>
                <th>Operation</th>
            </thead>
            <tbody>
<?php
  $counter = 1;
/*   $status = 0;
$statement = $conn->prepare("SELECT * FROM orders WHERE order_status = ?");
$statement->bind_param('i', $status);
$statement->execute();
$user = $statement->get_result();

while($count = $user->fetch_assoc()){ */
  $sql = mysqli_query($conn, "SELECT od.*, us.email AS user_email FROM orders od, user us WHERE od.order_status = '0' AND od.user_id = us.id");
  while($count = mysqli_fetch_assoc($sql)){
?>
                <tr>
        
<td><?php  echo $counter++ ?></td>
<td><?php echo $count['email'] ?></td>
<td><?php echo $count['order_id'] ?></td>
<td><?php echo $count['user_id'] ?></td>
<td><?php echo $count['total_price'] ?></td>
<td><?php echo $count['order_status'] ?></td>
<td><?php echo $count['invoice_number'] ?></td>
<td><?php echo $count['tracking_id'] ?></td>
<td><?php echo $count['date'] ?></td>
<td>
  
  <a href="view_order.php?track=<?php echo $count['tracking_id'] ?>"  class = "btn btn-primary text-white">View</a>
 
</td>                
                </tr>
<?php
  } 
//  } ?>
            </tbody>
           </table>

           
        </div>

    </div>

  
</section>

<?php include("./includes/footer.php"); ?>
<?php include("./includes/scripts.php"); ?>