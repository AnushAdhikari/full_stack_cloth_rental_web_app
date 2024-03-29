<?php
include('wishlist-db.php');

if(!isset($_SESSION['customerid'])){
  echo $_SESSION['customerid'];
die();  
// header('location:show-wishlist.php');
}else{
 $pid = $_GET['product_id']; 
 $cid = $_GET['cid'];
 

    $delWishlist = "DELETE FROM wishlist WHERE pid='$pid' AND uid='$cid'";   

	if(mysqli_query($conn, $delWishlist)){
        header('location:show-wishlist.php');

    }else {
  echo "Error deleting record: " . $conn->error;
}
 









}

?>