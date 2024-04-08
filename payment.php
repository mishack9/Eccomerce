<?php
include("./checklogin.php");
check_login();
include("./configuration/database.php");
include("./configuration/function.php");



$ip = getIpAddress();
$stmt = $conn->prepare("SELECT * FROM user WHERE ip_address = ?");
$stmt->bind_param("s", $ip);
$stmt->execute();
$id = $stmt->get_result();
?>


<?php include("./includes/header.php");  ?>

<!--Payment-->
<section class = "my-3 py-3">
    <div class="container text-center pt-2">
        <h2 class = "font-weight-bold">SUBMIT YOUR ORDER TO PROCCED</h2>
      
    </div>


      <div class="card card-body mx-auto shadow-lg">
        <form action="configuration/order.php" method = "POST" role = "form">
            <div class="row justify-content-center  container">
               <div class="col-md-8 col-lg-8 col-sm-6">
    

<div class="input-group mb-3">
  <input type="text" required class="form-control" placeholder="Email" onBlur = "availability()" id = "email" name = "email" aria-label="Recipient's Email" aria-describedby="basic-addon2">
  <span class="input-group-text" id="basic-addon2">@example.com</span>
 <p><span id = "checkuserAvailability"><em></em></span></p> 
</div>

<div class="input-group mb-3">
  <input type="text" required class="form-control" placeholder="Pincode" name = "pincode" aria-label="Recipient's pincode" aria-describedby="basic-addon2">
  <span class="input-group-text" id="basic-addon2">123p54</span>
</div>

<div class="input-group mb-3">
  <input type="text" required class="form-control" placeholder="Phone number" name = "phone" aria-label="Recipient's pincode" aria-describedby="basic-addon2">
  <span class="input-group-text" id="basic-addon2">+123456</span>
</div>

<div class="input-group">
  <span class="input-group-text">Address</span>
  <textarea class="form-control" name = "address" aria-label="With textarea"></textarea>
</div>
               </div>


                  <div class="col-md-4 col-lg-4 col-sm-6 mb-5">
                    <div class="container text-center">
                      <?php
                      while($row = $id->fetch_assoc()){
                        $user_id = $row['id'];
                      }  ?>
                      <div class="text-center fw-bold text-primary"> 
                        Total_Price: $
                        <?php if(isset($_SESSION['total'])){  echo $_SESSION['total']; } ?>
                      </div>
                      <input type="hidden" name = "user_id" value = "<?php echo $user_id ?>">
                      <input type="submit" name = "submit" id = "submit" value = "Place Order" class = "btn mb-3"  style = "background-color:coral; color:white; width:40%"> 
                      <div id="paypal-button-container"></div>
                      <?php   ?>
                  
                    </div>
                  </div>
            </div>
        </form>
      </div>
 


</section>

<?php
if(isset($_SESSION['cart'])){
  foreach($_SESSION['cart'] as $key => $data){
    $products = $_SESSION['cart'][$key];
    $product_id = $products['id'];
    $product_quantity = $products['quantity'];
  }
}
?>



    <!-- Replace the "test" client-id value with your client-id -->
    <script src="https://www.paypal.com/sdk/js?client-id=AXNVUDRFFETqXYmbDWqVSBI0NoGggVntxIyhgPTAIgltkhulaT8gsR1XYCzwGbzcrjO3TTHIhI6UqCvi&currency=USD"></script>
    <script>
window.paypal
  .Buttons({
    async createOrder() {
      try {
        const response = await fetch("/api/orders", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          // use the "body" param to optionally pass additional order information
          // like product ids and quantities
          body: JSON.stringify({
            cart: [
              {
                id: "",
                quantity: "",
              },
            ],
          }),
        });
        
        const orderData = await response.json();
        
        if (orderData.id) {
          return orderData.id;
        } else {
          const errorDetail = orderData?.details?.[0];
          const errorMessage = errorDetail
            ? `${errorDetail.issue} ${errorDetail.description} (${orderData.debug_id})`
            : JSON.stringify(orderData);
          
          throw new Error(errorMessage);
        }
      } catch (error) {
        console.error(error);
        resultMessage(`Could not initiate PayPal Checkout...<br><br>${error}`);
      }
    },
    async onApprove(data, actions) {
      try {
        const response = await fetch(`/api/orders/${data.orderID}/capture`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
        });
        
        const orderData = await response.json();
        // Three cases to handle:
        //   (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
        //   (2) Other non-recoverable errors -> Show a failure message
        //   (3) Successful transaction -> Show confirmation or thank you message
        
        const errorDetail = orderData?.details?.[0];
        
        if (errorDetail?.issue === "INSTRUMENT_DECLINED") {
          // (1) Recoverable INSTRUMENT_DECLINED -> call actions.restart()
          // recoverable state, per https://developer.paypal.com/docs/checkout/standard/customize/handle-funding-failures/
          return actions.restart();
        } else if (errorDetail) {
          // (2) Other non-recoverable errors -> Show a failure message
          throw new Error(`${errorDetail.description} (${orderData.debug_id})`);
        } else if (!orderData.purchase_units) {
          throw new Error(JSON.stringify(orderData));
        } else {
          // (3) Successful transaction -> Show confirmation or thank you message
          // Or go to another URL:  actions.redirect('thank_you.html');
          const transaction =
            orderData?.purchase_units?.[0]?.payments?.captures?.[0] ||
            orderData?.purchase_units?.[0]?.payments?.authorizations?.[0];
          resultMessage(
            `Transaction ${transaction.status}: ${transaction.id}<br><br>See console for all available details`,
          );
          console.log(
            "Capture result",
            orderData,
            JSON.stringify(orderData, null, 2),
          );
        }
      } catch (error) {
        console.error(error);
        resultMessage(
          `Sorry, your transaction could not be processed...<br><br>${error}`,
        );
      }
    },
  })
  .render("#paypal-button-container");
  
// Example function to show a result to the user. Your site's UI library can be used instead.
function resultMessage(message) {
  const container = document.querySelector("#result-message");
  container.innerHTML = message;
}
    </script>
<?php  include("./includes/footer.php"); ?>