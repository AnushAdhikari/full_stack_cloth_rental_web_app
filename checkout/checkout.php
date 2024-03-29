<!DOCTYPE html>

<html>
<head>
  <title>Check-out</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>


  <?php
  session_start();
  include('checkoutheader.php');
  require_once ("../Cart/php/CreateDb.php");
  ?>



  <?php 
    $con=mysqli_connect("localhost", "root", "", "logindb");

    if(mysqli_connect_error())
    {
    echo "Cannot Connect";
    }

    $db = new CreateDb("logindb", "product_table");

    $carttotal = 0;
    // print_r($_SESSION['cart']);
    if(!isset($_SESSION['cart']) || empty($_SESSION['cart']))
    {
        // header('location:checkout.php');
        // exit();
    }else{
        $cartdata = $_SESSION['cart'];
        $result = $db->getData();
        while ($row = mysqli_fetch_assoc($result)){
            foreach ($cartdata as $item){                                
                if ($row['product_id'] == $item['product_id']){
                    $productid = $item['product_id'];
                    $deliverydate = strtotime($item['deliverydate']);
                    $returndate = strtotime($item['returndate']);
                    $datediff = $returndate - $deliverydate;

                    $days = round($datediff / (60 * 60 * 24));
                    $rental_charge = $days * (float) $row['rental_charge'];
                    $carttotal = $carttotal + (float)$rental_charge;
                }
            }
        }
    }

    require_once('checkoutconfig.php');    
    require_once('helper.php');  
   

    //pre($_SESSION);

    if(isset($_POST['submit']))
    {
        if(isset($_POST['first_name'],$_POST['last_name'],$_POST['email'],$_POST['address'],$_POST['country'],$_POST['state'],$_POST['zipcode']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['country']) && !empty($_POST['state']) && !empty($_POST['zipcode']))
        {
           $firstName = $_POST['first_name'];

           if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) == false)
           {
                 $errorMsg[] = 'Please enter valid email address';
           }
           else
            {
                $firstName  = validate_input($_POST['first_name']);
                $lastName   = validate_input($_POST['last_name']);
                $email      = validate_input($_POST['email']);
                $address    = validate_input($_POST['address']);
                $country    = validate_input($_POST['country']);
                $state      = validate_input($_POST['state']); 
                $zipcode    = validate_input($_POST['zipcode']);
                $fullname = $firstName.' '.$lastName;
                $order_status = 'unfulfilled';
                $total_price = 0;
                if (isset($_SESSION['cart']) && isset($_SESSION["login_email"])){
                        $cartdata = $_SESSION['cart'];                        
                        $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($cartdata as $item){                                
                                if ($row['product_id'] == $item['product_id']){
                                    $productid = $item['product_id'];
                                    $total_price = $total_price + (int)$row['rental_charge'];
                                }
                            }
                        }
                    }else{
                        $errorMsg[] = 'Cart is empty !!';
                    }

                $sql = "INSERT INTO orders SET fullname='$fullname', email='$email',address='$address',country='$country',state='$state',zipcode='$zipcode', total_price='$total_price',order_status='$order_status'";
                
                // die();

                if (mysqli_query($con,$sql) === TRUE) {
                    $orderid = mysqli_insert_id($con);
                    foreach ($cartdata as $item){                                
                        $productid = $item['product_id'];
                        $delivery_date = $item['deliverydate'];
                        $return_date = $item['returndate'];
                        $sql = "UPDATE product_table SET delivery_date='$delivery_date', return_date='$return_date',orderid='$orderid',status='unpublish' WHERE product_id='$productid' ";
                        // $result = mysqli_query($con,$sql);
                        if (mysqli_query($con,$sql) === TRUE) {
                        } else {
                          echo "Error: " . $sql . "<br>" . $con->error;
                        }
                    }
                        unset($_SESSION['cart']);
                        // $_SESSION['confirm_order'] = true;
                        
                        // exit();
                        // header('Location: thank-you.php');
                    echo "<script>window.location = 'thank-you.php'</script>";
                } else
                {
                    $errorMsg[] = 'Unable to save your order. Please try again';
                }

           }
        }
        else
        {
            $errorMsg = [];

            if(!isset($_POST['first_name']) || empty($_POST['first_name']))
            {
                $errorMsg[] = 'First name is required';
            }
            else
            {
                $fnameValue = $_POST['first_name'];
            }

            if(!isset($_POST['last_name']) || empty($_POST['last_name']))
            {
                $errorMsg[] = 'Last name is required';
            }
            else
            {
                $lnameValue = $_POST['last_name'];
            }

            if(!isset($_POST['email']) || empty($_POST['email']))
            {
                $errorMsg[] = 'Email is required';
            }
            else
            {
                $emailValue = $_POST['email'];
            }

            if(!isset($_POST['address']) || empty($_POST['address']))
            {
                $errorMsg[] = 'Address is required';
            }
            else
            {
                $addressValue = $_POST['address'];
            }

            if(!isset($_POST['country']) || empty($_POST['country']))
            {
                $errorMsg[] = 'Country is required';
            }
            else
            {
                $countryValue = $_POST['country'];
            }

            if(!isset($_POST['state']) || empty($_POST['state']))
            {
                $errorMsg[] = 'State is required';
            }
            else
            {
                $stateValue = $_POST['state'];
            }

            if(!isset($_POST['zipcode']) || empty($_POST['zipcode']))
            {
                $errorMsg[] = 'Zipcode is required';
            }
            else
            {
                $zipCodeValue = $_POST['zipcode'];
            }


            if(isset($_POST['address2']) || !empty($_POST['address2']))
            {
                $address2Value = $_POST['address2'];
            }

        }
    }
  
  // $pageTitle = 'Demo PHP Shopping cart checkout page with Validation';
  // $metaDesc = 'Demo PHP Shopping cart checkout page with Validation';

   //  INSERT INTO `orders`(`id`, `fullname`, `email`, `address`, `country`, `state`, `zipcode`, `total_price`, `order_status`, `created_at`, `updated_at`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]')

   // $sql = "INSERT INTO orders SET fullname='$tag', email='$product_name',address='$product_img',country='$product_img1',state='$product_img2',zipcode='$product_img3', total_price='$brand_name',order_status='$created_at'";
   

   //  if (mysqli_query($con,$sql) === TRUE) {
   //    header("Location:productList.php");
   //  } else {
   //    echo "Error: " . $sql . "<br>" . $con->error;
   //  }

?>

<div class="container checkout">

    <div class="row mt-3">

        <div class="col-md-6 order-md-1">
            <div class="errormsg_billing">
          <h4 class="mb-3">Billing</h4>
          <?php 
            if(isset($errorMsg) && count($errorMsg) > 0)
            {
                foreach($errorMsg as $error)
                {
                    echo '<div class="alert alert-danger">'.$error.'</div>';
                }
            }
          ?>
            </div>
            <form class="needs-validation" method="POST">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input required type="text" class="form-control" id="firstName" name="first_name" placeholder="First Name" value="<?php echo (isset($fnameValue) && !empty($fnameValue)) ? $fnameValue:'' ?>" >
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input required type="text" class="form-control" id="lastName" name="last_name" placeholder="Last Name" value="<?php echo (isset($lnameValue) && !empty($lnameValue)) ? $lnameValue:'' ?>" >
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input required type="email" class="form-control" id="email" name="email" placeholder="abcd@example.com" value="<?php echo (isset($emailValue) && !empty($emailValue)) ? $emailValue:'' ?>">
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input required type="text" class="form-control" id="address" name="address" placeholder="Your Address..." value="<?php echo (isset($addressValue) && !empty($addressValue)) ? $addressValue:'' ?>">
            </div>
            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" name="country" id="country" >
                  <option value="">Choose Your Country...</option>
                  <option value="Nepal" >Nepal</option>
                </select>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select class="custom-select d-block w-100" name="state" id="state" >
                  <option disabled="disabled">Choose Your State...</option>
                  <option value="Bagmati">Bagmati</option>
                </select>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input required type="text" class="form-control" id="zip" name="zipcode" placeholder="" value="<?php echo (isset($zipCodeValue) && !empty($zipCodeValue)) ? $zipCodeValue:'' ?>" >
              </div>
            </div>
            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input required id="cashOnDelivery" name="cashOnDelivery" type="radio" class="custom-control-input" checked="" >
                <label class="custom-control-label" for="cashOnDelivery">Khalti</label>
              </div>
            </div>
           
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" id="create-order" type="submit" name="submit" style="display: none"; >Create Order</button>

            
          </form>
          <button class="btn btn-primary btn-lg btn-block" id="payment-button" type="submit" name="submit" data-carttotal="<?php echo $carttotal ?>" >Pay from khalti</button>

            
        </div>
    </div>
</div>
<script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_c949aa0e746046999be8301cfeae3b1c",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI"
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    console.log(payload);
                    $('#create-order').trigger('click');
                    setTimeout(function() { 
                        window.location.href = "http://localhost/FYP/Page/pages/checkout/thank-you.php";
                    }, 2000);
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        var btnele = $("#payment-button");
        var carttotal = parseFloat(btnele.attr('data-carttotal'))*100;
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            var firstName = $('#firstName').val();
            var lastName = $('#lastName').val();
            var email = $('#email').val();
            var address = $('#address').val();
            var country = $('#country').val();
            var state = $('#state').val();
            var zip = $('#zip').val();
            // checkout.show({amount: carttotal});
            if(firstName != '' && lastName != ''  && email != ''  && address != ''  && state != ''  && zip != '' ){
                console.log(checkout);
                checkout.show({amount: carttotal});
            }else{
                return false;
            }
            
        }
    </script>
</body>
</html>



