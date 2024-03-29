<?php
    include 'connection.php';
    $uid = $_GET['id'];
    $sql = "DELETE FROM category_table WHERE id=$uid";
    echo "<script>alert('Data deleted');</script>"; 
    $result = mysqli_query($con,$sql);
    if($result){
        header("Location:categorylist.php");

    }
?>