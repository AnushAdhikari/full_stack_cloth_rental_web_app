<?php          
session_start();

require_once ('Cart/php/CreateDb.php');
require_once ('Cart/php/newcomponent.php');
// create instance of Createdb class
$database = new CreateDb("logindb", "product_table");

$uid = $_GET['product_id'];


$result= $database->getproductData($uid);
// echo $uid;
if($result){
    while($row = mysqli_fetch_assoc($result)){
        $product_id=$row['product_id'];
        $tag=$row['tag'];
        $product_info= $row['product_info'];
        $product_name= $row['product_name'];
        $product_img= $row['product_img'];
        $product_img1= $row['product_img1'];
        $product_img2= $row['product_img2'];
        $product_img3= $row['product_img3'];
        $brand_name= $row['brand_name'];
        $rental_charge= $row['rental_charge'];
        $rent_days= $row['rent_days'];
        $retail_price= $row['retail_price'];
        $size= $row['size'];
        $delivery_date= $row['delivery_date'];
        $return_date= $row['return_date'];
        $product_type= $row['product_type'];
    }
}


// create instance of Createdb class
$database = new CreateDb("logindb", "product_table");

if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);

 
    if(isset($_SESSION['cart'])){

       if(count($_SESSION['cart']) < 6 ){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            // echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }
        }
        else{
            echo "<script>alert('Already 5 items in the cart..!')</script>";
      }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
  
}

?>
<?php  include 'mainheader.php' ?>

<!-- ======================================== Product Details============================= -->
<div class="container product-page">
   <div class="row text-center py-5">
      <div class="col-md-6  product-detail-image-wrap">
         <div class="row">
            <div class="col-md-4 col-lg-4 product-thumbnail-image-wrap" data-flickity ='{"wrapAround: true"}'>
               <?php if($product_img != '' ){  ?><img class="thumbnail active" src="<?php echo $product_img ?>"><?php } ?>
               <?php if($product_img1 != '' ){  ?><img class="thumbnail" src="<?php echo $product_img1 ?>"><?php } ?>
               <?php if($product_img2 != '' ){   ?><img class="thumbnail" src="<?php echo $product_img2 ?>"><?php } ?>
               <?php if($product_img3 != '' ){  ?><img class="thumbnail" src="<?php echo $product_img3 ?>"><?php } ?>
            </div>
            <div class="col-md-9 product-main-image-wrap">   
               <img class="thumbnail-main" src="<?php echo $product_img ?>">
            </div>
         </div>
      </div>
      <div class="col-md-6 product-detail-wrap" style="max-width: 400px; margin: 0 auto;   height: auto; border: 1px solid #adb5bd;">
         <div class="product-title">
            <h3 class="prod_heading" style="background: #f5deb37a; font-size: 20px;">  <?php echo $product_name?></h3>
            <div class="producttitle">
               <div class="brand_name-wrap" > <span>Brand Name: </span> <?php echo $brand_name?></div>
               <div class="rental_charge-wrap"><span>Rental Charge: </span>Rs.<span class="rental_price"><?php echo $rental_charge?></span> <span class="for1days"> For 1 days</span></div>
               <div class="retail_price-wrap"><span>Retail Price: </span>Rs.<?php echo $retail_price?></div>
               <div class="size-wrap" ><span>Size: </span><?php echo $size?></div>
               <!-- <div class="rent_days-wrap" ><span style=" font-family: papyrus,fantasy">Rent Days </span><span class="rent-day"><?php echo $rent_days?></span></div> -->
               <form action="addproduct.php" method="post">
                  <div class="rent-start-wrap">
                     <p>Delivery Date: <input type="text" name="deliverydate" id="datepicker" required=></p>
                  </div>
                  <div class="rent-end-wrap">
                     <p>Return Date:  <input style="margin-left: 10px;" type="text" name="returndate" id="datepicker1" required></p>
                  </div>

                  <div class="rental_charge-wrap" > <span>Total Rental Charge: </span> Rs.<span class="total_rental_price"></span> </div>
                  <?php if (isset($_GET['response'])){ if($_GET['response'] == 'true'){?>
                <div class="success-msg-added-cart">Product is added to the cart.</div>
               <?php } }?>
                  <div class="add-2-cart">
                  <button type="submit" class="btn btn-warning my-3" name="addproduct">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                  </div>

                  <input type='hidden' name='product_id' value="<?php echo $product_id?>">

               </form>
               <div id="vn-click">Product Info</div>
               <div class="product_info-warp" id="info" style="font-weight: bold;"><?php echo $product_info?></div>

               <div class="wishlist-wrap">
                    <a href="wishlist.php?id=<?php echo $_GET['product_id']?>" class="btn btn-primary wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i> Add to  Wish List </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<!-- ======================================== End Product Details============================= -->

<?php

$result = $database->getrelatedproduct($product_id,$tag,$product_type);
$rowcount=mysqli_num_rows($result);
if($rowcount > 0 ){ 

?>


<div id="collection-wrap" class="container imagedetail" >
    <h1>Related  Products</h1>
        <div class="row text-center py-5">
            <?php
                $result = $database->getrelatedproduct($product_id,$tag,$product_type);
                $rowcount=mysqli_num_rows($result);
                if($rowcount > 0 ){
                while ($row = mysqli_fetch_assoc($result)){

                    component($row['tag'], $row['product_id'],$row['product_name'],$row['product_img'],$row['product_img1'],$row['product_img2'],$row['product_img3'],$row['brand_name'],$row['rental_charge'],$row['rent_days'],$row['retail_price'],$row['size'], $row['delivery_date'], $row['return_date'],$row['product_info']);
                }
                }
            ?>
        </div>
</div>
<?php } ?>



    <!--========================== START FOOTER =================-->

<?php 
include 'footer.php';
?>

<!-- ===================================================================== -->








<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="scripts/swiper.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<!-- =======================datepicker script link==================================== -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>


          <script>
          $( function() {
            $( "#datepicker" ).datepicker({
                 dateFormat: 'yy-mm-dd',
                 minDate : 0
            });
          } );
           $(function () {
        $("#datepicker1").datepicker({
            changeMonth: true,
            changeYear: true,
            showAnim: 'slideDown',
            dateFormat: 'yy-mm-dd',
            minDate : 1,
            maxDate: 7
        }).on('change', function () {
            var days = getDays(this);
            $('.rent-day').html(days);
            // check for negative
            if(days < 1){
              alert('Return date must be later than delivery date !!');
              return false;
            }
            var price= parseFloat($('.rental_price').html());

            var total = parseFloat(days) * price;
            $('.total_rental_price').html(total);
        });

        function getDays(dateVal) {
            var
                birthday = new Date(dateVal.value),
                today = new Date($( "#datepicker" ).val()),
                ageInMilliseconds = new Date(birthday - today),
                years = ageInMilliseconds / (24 * 60 * 60 * 1000 * 365.25 ),
                months = 12 * (years % 1),
                days = Math.floor(30 * (months % 1) + 1);
            return days;

        }
    });
          </script>

          <script>
$(document).ready(function(){
    $("#vn-click").click(function(){
    $("#info").slideToggle(1000);
    });

    $('.thumbnail').click(function(){
    $('.thumbnail').removeClass('active');  
    $(this).addClass('active'); 
    var src = $(this).attr('src');
    $('.thumbnail-main').attr('src',src);
    });

    function days() {
    var a = $("#datepicker").datepicker('getDate').getTime(),
        b = $("#datepicker1").datepicker('getDate').getTime(),
        c = 24*60*60*1000,
        diffDays = Math.round(Math.abs((a - b)/(c)));
    console.log(diffDays); //show difference
    $('.rent-day').html(diffDays);
    }

    $('.ui-state-default').click(function(e){
        e.preventDefault();
        days();
        console.log('diffDays');
    });


});
</script>
<!-- =============================================================================================== -->
</body>
</html>
