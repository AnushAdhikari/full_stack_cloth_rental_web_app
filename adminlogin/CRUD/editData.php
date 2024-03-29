<?php include('adminnavbar.php'); ?>
<!DOCTYPE html>
<html lang="en">
​
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update List</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="form-style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylelist.css">
</head>
​
<body>
    <?php          
            include 'connection.php';
            $uid = $_GET['id'];
            $sql= "SELECT * FROM product_table WHERE product_id=".$uid."";
            $result= mysqli_query($con,$sql);
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $product_id=$row['product_id'];
                    $tag=$row['tag'];
                    $product_info= $row['product_info'];
                    $product_name= $row['product_name'];
                    $product_img= $row['product_img'];
                    $product_img1= $row['product_img1'];
                    $product_img2= $row['product_img2'];
                    $product_img3= $row['product_img3'];
                    $brand_name= $row['brand_name'];
                    $rental_charge= $row['rental_charge'];
                    $retail_price= $row['retail_price'];
                    $size= $row['size'];
                    $product_type= $row['product_type'];
                    $status= $row['status'];
                }
            }
        ?>
​
    <div class="reg-form-div">
        <div class="reg-form-container">
            <div class="title-wrapper">
                <h3>Update</h3>
            </div>
            <form action="saveEdit.php?id=<?php echo $product_id?>" method="POST">
                <div class="form-element">
                    <div class="form-element">
                    <div class="label-wrap" for="tag">Tag</div>
                    <select name="tag" id="tag" value="<?php echo $tag ?>" required>
                        <option value="pants" <?php if($tag==='pants') echo 'selected="selected"';?>>Pants</option>
                        <option value="hoodie"<?php if($tag==='hoodie') echo 'selected="selected"';?>>Hoodie</option>
                        <option value="weedingdress" <?php if($tag==='weedingdress') echo 'selected="selected"';?>>Weeding Dress</option>
                        <option value="t-shirt"<?php if($tag==='t-shirt') echo 'selected="selected"';?>>T-shirt</option>
                        <option value="jacket"<?php if($tag==='jacket') echo 'selected="selected"';?>>Jackets</option>
                        <option value="sneakers" <?php if($tag==='sneakers') echo 'selected="selected"';?>>Sneakers</option>
                    </select>
                </div>
                </div>
                <div class="form-element">
                    <div class="label-wrap" for="product_name">Product Name</div>
                    <input type="text" name="product_name" id="product_name" value="<?php echo $product_name ?>" required />
                </div>
                <div class="form-element">
                    <div class="label-wrap" for="rental_charge">Product Image</div>
                    <input type="text" name="product_img" id="product_img" value="<?php echo $product_img ?>" required />
                </div>
                <div class="form-element">
                    <div class="label-wrap" for="rental_charge">Product Image 1</div>
                    <input type="text" name="product_img1" id="product_img1" value="<?php echo $product_img1 ?>" required />
                </div>
                <div class="form-element">
                    <div class="label-wrap" for="rental_charge">Product Image 2</div>
                    <input type="text" name="product_img2" id="product_img2" value="<?php echo $product_img2 ?>" required />
                </div>
                <div class="form-element">
                    <div class="label-wrap" for="rental_charge">Product Image 3</div>
                    <input type="text" name="product_img3" id="product_img3" value="<?php echo $product_img3 ?>" required />
                </div>
                <div class="form-element">
                    <div class="label-wrap"  for="brand_name">Brand Name</div>
                    <input type="text" name="brand_name" id="brand_name" value="<?php echo $brand_name ?>" />
                </div>
                <div class="form-element">
                    <div class="label-wrap" for="rental_charge">Rental Charge</div>
                    <input type="text" name="rental_charge" id="rental_charge" value="<?php echo $rental_charge ?>" required />
                </div>
             <!--    <div class="form-element">
                    <div class="label-wrap" for="rent_days">Rental Days</div>
                    <input type="text" name="rent_days" id="rent_days" value="<?php echo $rent_days ?>" required />
                </div> -->
                <div>
                    <div class="label-wrap"  for="retail_price">Retail Price</div>
                    <input type="text" name="retail_price" id="retail_price" value="<?php echo $retail_price ?>" required />
                </div>
                <div class="form-element">
                    <div class="label-wrap" for="size">Size</div>
                    <input type="text" name="size" id="size" value="<?php echo $size ?>" />
                </div>
                <!-- <div class="form-element">
                    <div class="label-wrap" for="delivery_date">Delivery Date</div>
                    <input type="date" name="delivery_date" id="delivery_date" value="<?php echo $delivery_date ?>" required />
                </div>
                <div class="form-element">
                    <div class="label-wrap" for="return_date">Return Date</div>
                    <input type="date" name="return_date" id="return_date" value="<?php echo $return_date ?>" required />
                </div>
 -->                <div class="form-element">
                    <div class="label-wrap" for="product_info">Product Information</div>
                    <input type="text" name="product_info" id="product_info" value="<?php echo $product_info ?>" required />
                </div>

                <div class="form-element">
                    <div class="label-wrap" for="product_type">Product Type</div>
                    <select name="product_type" id="product_type" >
                        <option value="men" <?php if($product_type==='men') echo 'selected="selected"';?>>Men</option>
                        <option value="women" <?php if($product_type==='women') echo 'selected="selected"';?>>Women</option>

                    </select>
                </div>

                <div class="form-element">
                    <div class="label-wrap" for="product_type">Status</div>
                    <select name="status" id="status" >
                        <option value="publish" <?php if($status==='publish') echo 'selected="selected"';?>>Publish</option>
                        <option value="unpublish" <?php if($product_type==='unpublish') echo 'selected="selected"';?>>Unpublish</option>

                    </select>
                </div>
               
                 <input type="submit"  value="Save" />
            
            </form>
        </div>
​       </div>
</body>
</html>