<?php

session_start() ;

require_once ('Cart/php/CreateDb.php');
require_once ('Cart/php/newcomponent.php');


// create instance of Createdb class
$database = new CreateDb("logindb", "product_table");

if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'product.php?product_id=".$_POST['product_id']."'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
    echo "<script>window.location = 'Cart/product.php?product_id=".$_POST['product_id']."'</script>";
}


?>
<?php  include 'mainheader.php' ?>
<!-- ======================= MAIN NAVBAR END =========================-->

  



<!-- ======================================== START PRODUCTS SLIDE  ================================================-->

<!-- <div class="swiper-container mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <div>
                <img src="images/3.jpg" alt=""/>
        </div>
            </div>
        
        </div> -->
        <!-- <div class="swiper-slide">
            <img src="" alt=""/>
        </div> -->
   <!--  </div>
    <div class="swiper-pagination"></div>
    </div>
 -->
<!-- ======================================== END PRODUCTS SLIDE ============================= -->

<div class="carousel" data-flickity='{ "wrapAround": true , "autoPlay": true, "freeScroll": true }'>
  <div class="carousel-cell">
      <img class="imagemen" src="images/13.jpg" alt=""/>
  </div>
  <div class="carousel-cell">
      <img class="imagemen" src="images/14.jpg" alt=""/>
  </div>
  <div class="carousel-cell">
      <img class="imagemen" src="images/15.jpg" alt=""/>
    
  </div>
  <div class="carousel-cell">
    <img class="imagemen" src="images/16.jpg" alt=""/>
  </div>
  <div class="carousel-cell">
      <img class="imagemen" src="images/17.jpg" alt=""/>
  </div>
</div>



<!--========================== START DESCRIPTION OF COLLECTION ======================-->
<div class="description_products">
<h1>COLLECTION</h1>
<p>
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
<a href="index.php">
    Cloth Rental
</a>
</div>

<!-- ==================================================categories=============================== -->

<?php
$product_type = 'men';
$result = $database->getrelatedcategorytype($product_type);
$rowcount=mysqli_num_rows($result);
if($rowcount > 0 ){ 
?>
<div class="categorie">
  <div class="container">
    <h2 class="catmen" style="text-transform: uppercase;">Categories For men Cloth</h2>
    <div class="categorie_list">
        <?php
        $product_type = 'men';
        $result = $database->getrelatedcategorytype($product_type);
        while ($row = mysqli_fetch_assoc($result)){
            $category = '<div class="one-categorie col-lg-4 col-md-6 col-sm-12">
                    <a href="category.php?tag='.$row['tag'].'&product_type=men">
                        <div class="card">
                            <img class="category_img" src="'.$row['category_img'].'" alt="" />
                        </div>
                        <div class="title">
                            <h2>'.$row['category_name'].'</h2>
                        </div>
                    </a>
                </div>';
                echo $category ;
        }
        ?>
        </div>
</div>
</div>

<?php } ?>








<!--========================== START FOOTER =================-->

<?php 
include 'footer.php';
?>
<!-- ===================================================================== -->












    <!-- STATIC JS FILES --> 
<script src="scripts/navbar.js"></script>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="scripts/swiper.js"></script>


</body>
</html>