
<?php
session_start() ;

require_once ("Cart/php/CreateDb.php");
require_once ("Cart/php/newcomponent.php");

$db = new CreateDb("logindb", "product_table");

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>>
                        $(function(){
                          $('#remove_item').click(function(){
                              if(confirm) {
                                  return true;
                              }

                              return false;
                          });
                        });
                        </script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}


?>

<?php  include 'mainheader.php' ?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                
                <hr>

                <?php

                $total = 0;
                    if (isset($_SESSION['cart']) && isset($_SESSION["login_email"])){
                        $cartdata = $_SESSION['cart'];   
                        // print_r($cartdata);                     
                        $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($cartdata as $item){

                                if ($row['product_id'] == $item['product_id']){
                                    cartElement($row['tag'], $row['product_id'],$row['product_name'],$row['product_img'],$row['brand_name'],$row['rental_charge'],$row['rent_days'],$row['retail_price'],$row['size'], $item['deliverydate'], $item['returndate'],$row['product_info']);

                                    $deliverydate = strtotime($item['deliverydate']);
                                    $returndate = strtotime($item['returndate']);
                                    $datediff = $returndate - $deliverydate;

                                   $days = round($datediff / (60 * 60 * 24));
                                   $rental_charge = $days * (float) $row['rental_charge'];

                                    $total = $total + (int)$rental_charge;
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                ?>

            </div>

        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>Rs.<?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>Rs.<?php
                            echo $total;
                            ?></h6>
                    </div>
                </div>
            </div>
            <div class=checkoutbtn>
                <a href="checkout/checkout.php">
        <button type="button" class="btn btn-secondary"><i class="fas fa-credit-card"></i> Check-Out</button>
                </a>
            </div>
        </div>
    </div>

</div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
