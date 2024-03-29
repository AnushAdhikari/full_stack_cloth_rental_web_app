<?php
    include 'connection.php';
    $uid = $_GET['id'];
    $sql = "DELETE FROM product_table WHERE product_id=$uid";
    echo "<script>alert('Data deleted');</script>"; 
    $result = mysqli_query($con,$sql);
    if($result){
        header("Location:productList.php");

    }
?>