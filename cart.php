<?php
session_start();

include("./configuration/database.php");
include("./configuration/function.php");
if(isset($_POST['add_to_cart'])){

  // if user already added to cart
  if(isset($_SESSION['cart'])){
    $product_array_ids = array_column($_SESSION['cart'], "id");
    //if product not added
    if(!in_array($_POST['id'], $product_array_ids)){
 
      $product_id = $_POST['id'];
      $product_image = $_POST['image1'];
      $product_title = $_POST['product_title'];
      $product_price = $_POST['product_price'];
      $product_quantity = $_POST['quantity'];
  
            $product_array = array(
                   'id' => $product_id,
                   'image1' => $product_image,
                   'product_title' => $product_title,
                   'product_price' => $product_price,
                   'quantity' => $product_quantity
            );
  
                $_SESSION['cart'][$product_id] = $product_array;

                 //get ip_address function


$ip_address =  getIPAddress();
$sql_check_cart = mysqli_query($conn, "SELECT * FROM cart WHERE product_id = '$product_id' AND ip_address = '$ip_address'");
if(mysqli_num_rows($sql_check_cart) > 0){
  echo "<script>alert('Product already added inside cart...');</script>";
} else {
  $sql_insert_cart = "INSERT INTO cart (product_id, ip_address, quantity) VALUES(?,?,?)";
  $stmt = mysqli_stmt_init($conn);
  $prepare = mysqli_stmt_prepare($stmt, $sql_insert_cart);
  if($prepare){
    mysqli_stmt_bind_param($stmt, "iii", $product_id, $ip_address, $product_quantity);
    mysqli_stmt_execute($stmt);
  }
}

      //if product already added
    }else{
       echo "<script>alert('Product already added inside cart...');</script>";
       //echo "<script>window.location='index.php';</script>";
       
    }

  }
  // if user is ading for the firsttime
  else
  {
    $product_id = $_POST['id'];
    $product_image = $_POST['image1'];
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['quantity'];

          $product_array = array(
                 'id' => $product_id,
                 'image1' => $product_image,
                 'product_title' => $product_title,
                 'product_price' => $product_price,
                 'quantity' => $product_quantity
          );

              $_SESSION['cart'][$product_id] = $product_array;
           
  } 

//calculate total
calculateTotal();



  //remove cart product
} elseif(isset($_POST['remove'])){
  $ip_address =  getIPAddress();
  $product_id = $_POST['id'];
  unset($_SESSION['cart'][$product_id]);

  //calculate total
  calculateTotal();
 
  $sql_remove_cart = mysqli_query($conn, "DELETE FROM cart WHERE  product_id = '$product_id'");


  //update cart quantity
}elseif (isset($_POST['edith'])) {
  $ip_address =  getIPAddress();
  $product_id = $_POST['id'];
  $quantity = $_POST['quantity'];

  $productArray = $_SESSION['cart'][$product_id];
  $productArray['quantity'] = $quantity;

  $_SESSION['cart'][$product_id] = $productArray;

  //calculate total
  calculateTotal();

  $sql_update_cart = mysqli_query($conn, "UPDATE cart SET quantity = '$quantity' WHERE product_id = '$product_id' ");

}





// function calculate total price of all products
function calculateTotal(){
  $total = 0;
  foreach($_SESSION['cart'] as $key => $data)
  {
    $product = $_SESSION['cart'][$key];

    $price = $product['product_price'];
    $quantity = $product['quantity'];

    $total = $total + $price * $quantity;
  }
    $_SESSION['total'] = $total;
}
?>


<?php include("./includes/header.php");  ?>


<!--cart--> 
<section class = "cart container mt-5 mb-5 py-5">
  <h2 class="text-success text-center "><em>USER_CART</em></h2>
    <div class="container border p-3 b-white" style = "box-shadow:4px 1px 4px; color:coral; border-radius:30px 12px 30px">
        <h2 class = "font-weight-bold">Your Cart</h2>
         
        <div class="table-responsive">
           <table class = "table table-strike table-all">
            <thead>
                <th>Product</th>
                <th>Quantity</th>
                <th>Sub-total</th>
            </thead>
          
            <tbody>
            <?php foreach($_SESSION['cart'] as $key => $value){ ?>
                <tr>
                    <td>
                        <div class="product-info">
                            <img src="assests/img/<?php echo $value['image1'] ?>" alt="<?php echo $value['image1'] ?>">
                            <div class="text-success">
                                <p><?php echo $value['product_title']  ?></p>
                                <small><span>$</span><?php echo $value['product_price']  ?></small>
                                <br>
                                <form action="" method = "POST">
                                  <input type="hidden" name = "id" value = "<?php echo $value['id']  ?>">
                                  <input type="submit" name = "remove" value = "Remove" style = "border:none; width:100px;">
                                </form>
                            </div>
                        </div>
                    </td>
                    <img src="./assests/img/<?php echo $value['image1'] ?>" alt="<?php echo $value['image1'] ?>">
                    <td>
                      <form action="" method = "POST">
                      <input type="hidden" name = "id" value = "<?php echo $value['id']  ?>" style = >
                        <input type="number" value = "<?php echo $value['quantity']  ?>" name = "quantity" style = "width:80px">
                        <input type="submit" name = "edith" value = "Update" style = "border:none; width:100px;">
                        </form>
                    </td>

                    <td>
                <span>$</span>
                <span class = "price"><?php  echo $value['product_price'] * $value['quantity'] ?></span>
                    </td>

                </tr> 
                <?php } ?>      
            </tbody>
           
           </table>

           <div class="cart-total">
            <table>
                
                <tr>
                    <td>Total-Amount</td>
                    <td>$ <?php echo $_SESSION['total'];  ?></td>
                </tr>
            </table>
           </div>
        
            </div>

        </div>

    <div class="check-out">
    <a href="checkout.php" class = "btn btn-primary" style = "color:alicebue; border:none; background-color:coral; padding:5px; width:20%">Checkout</a>
       </form>
    </div>
</section>








<!--footer --> 

<?php include("./includes/footer.php");  ?>