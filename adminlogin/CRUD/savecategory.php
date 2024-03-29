<?php
    include 'connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tag = test_input($_POST["tag"]);
        $category_name = test_input($_POST["category_name"]);
        $category_img = $_POST["category_img"];
        $product_type = test_input($_POST["product_type"]);
        

    }
      
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // $sql = "INSERT INTO category_table SET tag='$tag', category_name='$category_name',category_img='$category_img',product_type='$product_type'";
    $sql = "INSERT INTO `category_table`(`category_name`, `category_img`, `tag`, `product_type`) VALUES ('$category_name','$category_img','$tag','$product_type')";
   // echo $sql;

// echo $sql;
    $result = mysqli_query($con,$sql);
    
    if($result){
        header("Location:categorylist.php");

    }else{
    }
?>