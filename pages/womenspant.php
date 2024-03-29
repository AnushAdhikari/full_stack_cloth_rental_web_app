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


<div id="collection-wrap" class="container imagedetail">
        <div class="row text-center py-5">
            <?php
                $product_type = 'women';
                $result = $database->getrelatedproduct($product_id,$tag,$product_type);
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['tag'], $row['product_id'],$row['product_name'],$row['product_img'],$row['product_img1'],$row['product_img2'],$row['product_img3'],$row['brand_name'],$row['rental_charge'],$row['rent_days'],$row['retail_price'],$row['size'], $row['delivery_date'], $row['return_date'],$row['product_info']);
                }
            ?>
        </div>
</div>

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