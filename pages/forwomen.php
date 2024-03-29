<?php

session_start() ;

require_once ('./Cart/php/CreateDb.php');
require_once ('./Cart/php/newcomponent.php');
$database = new CreateDb("logindb", "category_table");

?>
<?php  include 'mainheader.php' ?>
<!-- ======================= MAIN NAVBAR END =========================-->

  

<div class="carousel" data-flickity='{ "wrapAround": true , "autoPlay": true, "freeScroll": true }'>
  <div class="carousel-cell">
      <img class="imagewomen" src="images/8.jpg" alt=""/>
  </div>
  <div class="carousel-cell">
      <img class="imagewomen" src="images/9.jpg" alt=""/>
  </div>
  <div class="carousel-cell">
      <img class="imagewomen" src="images/10.jpg" alt=""/>
    
  </div>
  <div class="carousel-cell">
    <img class="imagewomen" src="images/11.jpg" alt=""/>
  </div>
  <div class="carousel-cell">
      <img class="imagewomen" src="images/12.jpg" alt=""/>
  </div>
</div>



<!--========================== START DESCRIPTION OF COLLECTION ======================-->
<div class="description_products">
<h1>COLLECTION</h1>
<p>
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
</p>
<a href="index.php">
    Cloth Rental
</a>
</div>

<!-- ==================================================categories=============================== -->
<?php
$product_type = 'women';
$result = $database->getrelatedcategorytype($product_type);
$rowcount=mysqli_num_rows($result);
if($rowcount > 0 ){ 
?>
<div class="categorie">
  <div class="container">
    <h2 class="catwomen" style="text-transform: uppercase;">Categories For Women Cloth</h2>
    <div class="categorie_list">
        <?php
        $product_type = 'women';
        $result = $database->getrelatedcategorytype($product_type);
        while ($row = mysqli_fetch_assoc($result)){
            $category = '<div class="one-categorie col-lg-4 col-md-6 col-sm-12">
                    <a href="category.php?tag='.$row['tag'].'&product_type=women">
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