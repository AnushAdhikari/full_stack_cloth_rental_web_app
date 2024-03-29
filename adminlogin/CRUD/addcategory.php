<?php include('adminnavbar.php'); ?>

<!DOCTYPE html>
<html lang="en">
​
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Category</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="form-style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="stylelist.css">
    <link href="../admindashboard/css/sb-admin-2.min.css" rel="stylesheet">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- end of admindashboard css links -->
</head>
​
<body>
    
    <div class="reg-form-div">
        <div class="reg-form-container category-wrap">
            <div class="title-wrapper category_title">
                <h3>Add Category</h3>
            </div>
            <form action="savecategory.php" method="POST" class="savecategory-wrap">
                <div class="form-element">
                    <div class="label-wrap" for="category_name">Category Name</div>
                    <input type="text" name="category_name" id="category_name" value="" required />
                </div>
                <div class="form-element">
                    <div class="label-wrap" for="category_img">Category Image</div>
                    <input type="text" name="category_img" id="category_img" value="" required />
                </div>
                <div class="form-element">
                    <div class="label-wrap" for="tag">Tag</div>
                    <select name="tag" id="tag" >
                        <option value="pants">Pants</option>
                        <option value="hoodie">Hoodie</option>
                        <option value="weedingdress">Weeding Dress</option>
                        <option value="t-shirt">T-shirt</option>
                        <option value="jacket">Jackets</option>
                        <option value="sneakers">Sneakers</option>
                    </select>
                </div>
                
               <div class="form-element">
                    <div class="label-wrap" for="product_type">Product Type</div>
                    <select name="product_type" id="product_type" >
                        <option value="men">Men</option>
                        <option value="women">Women</option>

                    </select>
                </div>
                 <input type="submit"  value="Add Category" />
            
            </form>
        </div>
​       </div>

</body>

</html>
