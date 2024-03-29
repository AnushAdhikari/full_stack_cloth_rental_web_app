<?php
    include 'connection.php';
    $uid = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tag = test_input(strtolower($_POST["tag"]));
        $product_name = test_input($_POST["product_name"]);
        $product_img = test_input($_POST["product_img"]);
        $product_img1 = test_input($_POST["product_img1"]);
        $product_img2 = test_input($_POST["product_img2"]);
        $product_img3 = test_input($_POST["product_img3"]);
        $brand_name = test_input($_POST["brand_name"]);
        $rental_charge = test_input($_POST["rental_charge"]);
        // $rent_days = test_input($_POST["rent_days"]);
        $retail_price = test_input($_POST["retail_price"]);
        $size = test_input($_POST["size"]);
        // $delivery_date = test_input($_POST["delivery_date"]);
        // $return_date = test_input($_POST["return_date"]);
        $product_info = test_input($_POST["product_info"]);
        $product_type = test_input($_POST["product_type"]);
        $status = test_input($_POST["status"]);
    }
      
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $sql = "UPDATE product_table SET tag='$tag', product_name='$product_name',product_img='$product_img',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3', brand_name='$brand_name', rental_charge='$rental_charge', retail_price='$retail_price', size='$size', product_info='$product_info', product_type='$product_type', status='$status' WHERE product_id='$uid' ";
   

    $result = mysqli_query($con,$sql);
    
    if($result){
        header("Location:productList.php");
    }
?>