<?php  session_start(); 
   include 'mainheader.php' ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Earn Through Us</title>
   </head>
   <body>
      <div class="blur">
         <img class="blur" src="images/10.jpg">
         <div class="centered">Earn Through Us</div>
      </div>
      <div class="container ">
         <div class="justify">Giive us your outfit and we'll rent it for you. You will remain the rightful owner of your garment which is displayed on our collection. Every time someone rents it out, you earn a healthy percentage of our rental price, without having to bear any responsibilities like laundry or maintenance. These percentage brackets are decided after analysing the age, quality and design of the outfit. Hence, the better your garment's condition is, the more you earn! So come claim your riches and preserve your dearest outfits in style!.</div>
      </div>
      <div class="howitworks_wrapper">
      <div>
         <h1 class="howitworks">How it works</h1>
      </div>
      <div class="container iconsearnthroughus">
         <div>
            <i class="fas fa-image imageicon"></i>
            <p class="iconsp">You Upload Picture</p>
         </div>
         <div>
            <i class="fas fa-tv displayicon"></i>
            <p class="iconsp">We Display</p>
         </div>
         <div>
            <i class="fas fa-hand-holding-usd moneyicon"></i>
            <p class="iconsp">We Fulfill, Your Earn</p>
         </div>
      </div>
      <div class="howitworks_info container">
         <h1>NOTE</h1>
         <p>The cloth you upload to be rented should be in a good condition so that other customer can enjoy it with no regrets. You should upload your original cloth pictures but not pictures from internet or any other means.</p>

   </div>
      <div class="earn-through-us">
         <div class="">
            <div class="row">
               <div class="form earn-wrap col-12">
                  <form method="POST" action="earnfile-upload.php" enctype="multipart/form-data">
                     <div class="mb-3">
                        <div class="earn-fullname">
                           <label for="" class="form-label">Enter Your Full Name</label>
                           <input type="text" class="form-control" name="full_name" id="full-name" aria-describedby="emailHelp" required="required">
                        </div>
                     </div>
                     <div class="mb-3">
                        <div class="earn-email-add">
                           <label for="" class="form-label">Email address</label>
                           <input type="email" class="form-control" name="earn-email" aria-describedby="emailHelp" required="">
                           <div id="earn-emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                     </div>
                     <div class="mb-3">
                        <div class="earn-tag-wrap">
                           <label for="" class="form-label">Tag</label>
                           <select class="form-select" name="tag" id="tag" >
                              <option value="pants">Pants</option>
                              <option value="hoodie">Hoodie</option>
                              <option value="weedingdress">Weeding Dress</option>
                              <option value="t-shirt">T-shirt</option>
                              <option value="jacket">Jackets</option>
                              <option value="sneakers">Sneakers</option>
                           </select>
                        </div>
                     </div>
                     <div class="mb-3">
                        <div class="earn-product-name-wrap">
                           <label for="" class="form-label">Product Name</label>
                           <input type="text" class="form-control" name="product_name" required="">
                        </div>
                     </div>
                     <div class="mb-3">
                        <div class="chose-img">
                           <label class="">Product Image</label>
                           <br>
                           <input type="file" class="form-control" name="image[]" value=""/ required="">
                        </div>
                     </div>
                     <div class="mb-3">
                        <div class="chose-img1">
                           <label class="">Product Image 1</label>
                           <br>
                           <input type="file" class="form-control" name="image[]" value=""/ required="">
                        </div>
                     </div>
                     <div class="mb-3">
                        <div class="chose-img2">
                           <label class="">Product Image 2</label>
                           <br>
                           <input type="file" class="form-control" name="image[]" value=""/ required="">
                        </div>
                     </div>
                     <div class="mb-3">
                        <div class="chose-img3">
                           <label class="">Product Image 3</label>
                           <br>
                           <input type="file" class="form-control" name="image[]" value=""/ required="">
                        </div>
                     </div>
                     <div class="mb-3">
                        <div class="earn-brand-name-wrap">
                           <label for="" class="form-label">Brand Name</label>
                           <input type="text" class="form-control" name="brand_name" required="">
                        </div>
                     </div>

                     <div class="mb-3">
                        <div class="earn-retail-price-wrap">
                           <label for="" class="form-label">Rental Charge</label>
                           <input type="text" class="form-control" name="rental_charge" required="">
                        </div>
                     </div>

                     <div class="mb-3">
                        <div class="earn-retail-price-wrap">
                           <label for="" class="form-label">Retail Price</label>
                           <input type="text" class="form-control" name="retail_price" required="">
                        </div>
                     </div>
                     <div class="mb-3">
                        <div class="earn-product-size-wrap">
                           <label for="" class="form-label">Product size</label>
                           <input type="text" class="form-control" name="size" required="">
                        </div>
                     </div>
                     <div class="mb-3">
                        <div class="earn-product-info-wrap">
                           <label for="" class="form-label">Product information</label>
                           <input type="text" class="form-control" name="product_info" required="">
                        </div>
                     </div>
                     <div class="mb-3">
                        <div class="earn-product-type">
                           <label for="" class="form-label">Product Type</label>
                           <select class="form-select" name="product_type" id="product_type" required="">
                              <option value="men">Men</option>
                              <option value="women">Women</option>
                           </select>
                        </div>
                     </div>
                     <input id="delete-event" type="submit" class="btn btn-primary" name="submit" value="Submit">
                  </form>
               </div>
            </div>
         </div>
      </div>
<?php 
include 'footer.php';
?>
   </body>
   <script type="text/javascript">
$("#delete-event").click(function(e) {
    if (!$(this).data('confirmed')) {
       e.preventDefault()
    } else {
       bootbox.confirm("Are you sure you wish to delete this?", function(confirmed) {
          if(confirmed) {
              $(this).data('confirmed', 1).click();           
          }
       });        
    }
});​
   </script>
</html>