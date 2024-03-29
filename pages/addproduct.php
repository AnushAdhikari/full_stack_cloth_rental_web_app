<?php

session_start();

require_once ('Cart/php/CreateDb.php');
require_once ('Cart/php/newcomponent.php');


// create instance of Createdb class
$database = new CreateDb("logindb", "product_table");
// check if add to cart btn is clicked
if (isset($_POST['addproduct'])){
    // check if session for checking product is in cart or not
    
    if(isset($_SESSION['cart'])){
        if(count($_SESSION['cart']) <= 4 ){
        // if products are in cart, check if product is already on cart or not 
        $item_array_id = array_column($_SESSION['cart'], "product_id");
        // check for repeat produt id
        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'product.php?product_id=".$_POST['product_id']."'</script>";
        }else{
            // save product id in cart using session
            $count = count($_SESSION['cart']) + 1;
            $item_array = array(
                'product_id' => $_POST['product_id'],
                'returndate' => $_POST['returndate'],
                'deliverydate' => $_POST['deliverydate']
            );

            $_SESSION['cart'][$count] = $item_array;
        }
        // print_r($_SESSION['cart']); 
    }else{
         echo "<script>alert('Already 5 items in the cart..!')</script>";
        echo "<script>window.location = 'product.php?product_id=".$_POST['product_id']."'</script>";

    }

    }else{
        // if cart session is empty, save product id on cart session
        $item_array = array(
                'product_id' => $_POST['product_id'],
                'returndate' => $_POST['returndate'],
                'deliverydate' => $_POST['deliverydate']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        // print_r($_SESSION['cart']);
    }

    echo "<script>window.location = 'product.php?product_id=".$_POST['product_id']."&response=true'</script>";
}




?>