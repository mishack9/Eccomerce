<!--footer --> 
<footer class = "mt-3 py-5">

   <div class="row container mx-auto ">
     <div class="footer-one col-lg-3 col-md-4 col-sm-6">
      <img src="assests/img/atm.jpg" class = "img-fluid mt-4" alt="">
      <h3 class="pt-3" style = "color:coral"><em>Your satisfaction is our concern</em></h3>
     </div>

     <div class="footer-one col-lg-3 col-md-4 col-sm-6">
    <h2 class = "pb-2">Features</h2>
    <ul class = "text-uppercase">
      <li><a href="">Men</a></li>
      <li><a href="">Women</a></li>
      <li><a href="">Children</a></li>
      <li><a href="">Custom</a></li>
      <li><a href="">Many-More</a></li>
    </ul>
     </div>

     <div class="footer-one col-lg-3 col-md-4 col-sm-6">
    
      <div class="">
        <h2 class = "text-uppercase text-info">Address</h2>
        <p>123 new karshi  nasarawa state</p>
      </div>
      <div class="">
        <h5 class = "text-uppercase">Phone-number</h5>
        <p>1233838</p>
      </div>
      <div class="">
        <h5 class = "text-uppercase">email</h5>
        <p>Example@gmail.com</p>
      </div>
     </div>

     <div class="footer-one col-lg-3 col-md-4 col-sm-6">
    <h3 class = "pb-2">Media</h3>
    <img src="./assests/img/shoplogo4.jpg"  class = "w-25 h-25 mt-2 mb-2" alt="">
    <img src="./assests/img/shoplogo4.jpg"  class = "w-25 h-25 mt-2 mb-2" alt="">
    <img src="./assests/img/shoplogo4.jpg"  class = "w-25 h-25 mt-2 mb-2" alt="">
    <img src="./assests/img/shoplogo4.jpg" class = "w-25 h-25 mt-2 mb-2" alt="">
    <img src="./assests/img/shoplogo4.jpg"  class = "w-25 h-25 mt-2 mb-2" alt="">
    <img src="./assests/img/shoplogo4.jpg"  class = "w-25 h-25 mt-2 mb-2" alt="">
     </div>

   </div>

    
   <div class="copy-right ">

     <div class="row container mx-auto">
          <div class="col-md-4 col-lg-3 col-sm-4 text-nowrap mb-2">
          <p class = "mt-4 pt-4 text-center">e-COMM @ 2023 alright reserved</p>
        </div>
          <div class="col-md-4 col-lg-3 col-sm-6">
          <a href=""><i class="fab fa-facebook" aria-hidden="true"></i></a>
           <a href=""><i class = "fab fa-instagram"></i></a>
            <a href=""><i class = "fab fa-twitter"></i></a>
        </div>
     </div>

   </div>

</footer>
<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script>
   var mainImg = document.getElementById("mainImg");
   var smallImg = document.getElementsByClassName("small-img");

for(let x = 0; x<4; x++){

            smallImg[x].onclick = function(){
            mainImg.src = smallImg[x].src;
            }

}

  
 

</script>
</body>
</html>