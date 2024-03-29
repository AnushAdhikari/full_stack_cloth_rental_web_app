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
            $sql= "SELECT * FROM category_table WHERE id=".$uid."";
            $result= mysqli_query($con,$sql);
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $id=$row['id'];
                    $category_name= $row['category_name'];
                    $category_img= $row['category_img'];
                    $tag=$row['tag'];
                    $product_type= $row['product_type'];
                }
            }
        ?>
​
    <div class="reg-form-div">
        <div class="reg-form-container">
            <div class="title-wrapper">
                <h3>Update</h3>
            </div>
            <form action="saveeditcategory.php?id=<?php echo $id?>" method="POST">
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
                    <div class="label-wrap" for="category_name">Category Name</div>
                    <input type="text" name="category_name" id="category_name" value="<?php echo $category_name ?>" required />
                </div>
                <div class="form-element">
                    <div class="label-wrap" for="category_img">Category Image</div>
                    <input type="text" name="category_img" id="category_img" value="<?php echo $category_img ?>" required />
                </div>

                <div class="form-element">
                    <div class="label-wrap" for="product_type">Product Type</div>
                    <select name="product_type" id="product_type" >
                        <option value="men" <?php if($product_type==='men') echo 'selected="selected"';?>>Men</option>
                        <option value="women" <?php if($product_type==='women') echo 'selected="selected"';?>>Women</option>

                    </select>
                </div>
               
                 <input type="submit"  value="Save" />
            
            </form>
        </div>
​       </div>
</body>
</html>