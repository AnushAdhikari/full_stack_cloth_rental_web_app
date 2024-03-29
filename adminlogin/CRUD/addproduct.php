<?php include('adminnavbar.php'); ?>
<!DOCTYPE html>
<html lang="en">
​
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="form-style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylelist.css">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- end of admindashboard css links -->
</head>
​
<body>    
​
    <div class="reg-form-div">
        <div class="reg-form-container product_wrap">
            <div class="title-wrapper product_title">
                <h3>Add Product</h3>
            </div>
            <form action="saveaddproduct.php" method="POST" class="add-product_wrap">
                <div class="form-element">
                <div class="form-element">
                    <div class="label-wrap" for="tag">Tag</div>
                    <select name="tag" id="tag" value="<?php echo $tag ?>" required>>
                        <option value="pants" >Pants</option>
                        <option value="hoodie">Hoodie</option>
                        <option value="weedingdress">Weeding Dress</option>
                        <option value="t-shirt">T-shirt</option>
                        <option value="jacket">Jackets</option>
                        <option value="sneakers">Sneakers</option>
                    </select>
                </div>
                </div>
                <div class="form-element">
                    <div class="label-wrap" for="product_name">Product Name</div>
                    <input type="text" name="product_name" id="product_name" value="" required />
                </div>
                <div class="form-element">
                    <div class="label-wrap" for="product_img">Product Image</div>
                    <input type="text" name="product_img" id="product_img" value="" required />
                </div>
                <div class="form-element">
                    <div class="label-wrap" for="product_img1">Product Image 1</div>
                    <input type="text" name="product_img1" id="product_img1" value="" />
                </div>
                <div class="form-element">
                    <div class="label-wrap" for="product_img2">Product Image 2</div>
                    <input type="text" name="product_img2" id="product_img2" value="" />
                </div>
                <div class="form-element">
                    <div class="label-wrap" for="product_img3product_img3">Product Image 3</div>
                    <input type="text" name="product_img3" id="product_img3" value=""/>
                </div>
                <div class="form-element">
                    <div class="label-wrap" for="brand_name">Brand Name</div>
                    <input type="text" name="brand_name" id="brand_name" value="" />
                </div>
                <div class="form-element">
                    <div class="label-wrap" for="rental_charge">Rental Charge</div>
                    <input type="text" name="rental_charge" id="rental_charge" value="" required />
                </div>
                <!-- <div class="form-element">
                    <div class="label-wrap" for="rent_days">Rental Days</div>
                    <input type="text" name="rent_days" id="rent_days" value="" required />
                </div> -->
                <div>
                    <div class="label-wrap" for="retail_price">Retail Price</div>
                    <input type="text" name="retail_price" id="retail_price" value="" required />
                </div>
                <div class="form-element">
                    <div class="label-wrap" for="size">Size</div>
                    <input type="text" name="size" id="size" value="" />
                </div>
                <!-- <div class="form-element">
                    <div class="label-wrap" for="delivery_date">Delivery Date</div>
                    <input type="date" name="delivery_date" id="delivery_date" value="" required />
                </div>
                <div class="form-element">
                    <div class="label-wrap" for="return_date">Return Date</div>
                    <input type="date" name="return_date" id="return_date" value="" required />
                </div> -->
                <div class="form-element">
                    <div class="label-wrap" for="product_info">Product Information</div>
                    <input type="text" name="product_info" id="product_info" value="" required />
                </div>
               <div class="form-element">
                    <div class="label-wrap" for="product_type">Product Type</div>
                    <select name="product_type" id="product_type" >
                        <option value="men" >Men</option>
                        <option value="women">Women</option>

                    </select>
                </div>
                 <input type="submit"  value="Add Product" />
            
            </form>
        </div>
​       </div>
</body>
</html>