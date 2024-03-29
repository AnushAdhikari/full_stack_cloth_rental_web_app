<?php
include 'earnthrdatabase.php';
if(isset($_POST['submit']))
{
	$extension=array('jpeg','jpg','png','gif','gfif','PNG','JPEG','JPG','GIF','GFIF');
	$productimages = [];
	foreach ($_FILES['image']['tmp_name'] as $key => $value) {
		$filename=$_FILES['image']['name'][$key];
		$filename_tmp=$_FILES['image']['tmp_name'][$key];
		echo '<br>';
		$ext=pathinfo($filename,PATHINFO_EXTENSION);

		$finalimg='';
		if(in_array($ext,$extension))
		{
			if(!file_exists('images/'.$filename))
			{
			move_uploaded_file($filename_tmp, 'Cart/upload/'.$filename);
			$finalimg='Cart/upload/'.$filename;
				 array_push($productimages,$finalimg);
			}else
			{
				 $filename=str_replace('.','-',basename($filename,$ext));
				 $newfilename=$filename.time().".".$ext;
				 move_uploaded_file($filename_tmp, 'images/'.$newfilename);
				 $finalimg='Cart/upload/'.$newfilename;
				 array_push($productimages,$finalimg);
			}
			$creattime=date('Y-m-d h:i:s');
			//insert
			
			// $insertqry="INSERT INTO `images`( `img_name`, `created_at`) VALUES ('$finalimg','$creattime')";
			// mysqli_query($con,$insertqry);

			// header('Location: earnthroughus.php');
		}else
		{
			// display error
		}
	}
	print_r($productimages);

	function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tag = test_input(strtolower($_POST["tag"]));
        $product_name = test_input($_POST["product_name"]);
        $product_img = test_input($productimages[0]);
        $product_img1 = test_input($productimages[1]);
        $product_img2 = test_input($productimages[2]);
        $product_img3 = test_input($productimages[3]);
        $brand_name = test_input($_POST["brand_name"]);
        $rental_charge = test_input($_POST["rental_charge"]);
        // $rent_days = test_input($_POST["rent_days"]);
        $retail_price = test_input($_POST["retail_price"]);
        $size = test_input($_POST["size"]);
        // $delivery_date = test_input($_POST["delivery_date"]);
        // $return_date = test_input($_POST["return_date"]);
        $product_info = test_input($_POST["product_info"]);
        $product_type = test_input($_POST["product_type"]);
        $full_name = test_input($_POST["full_name"]);
        $email = $_POST["earn-email"];
        $status = 'unpublish';
    }
      
    

    $sql = "INSERT INTO product_table SET tag='$tag', product_name='$product_name',product_img='$product_img',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3', brand_name='$brand_name',rental_charge='$rental_charge', retail_price='$retail_price', size='$size', product_info='$product_info', product_type='$product_type',upload_by='$full_name',email='$email',status='$status'";
    // echo $sql;

	if (mysqli_query($con,$sql) === TRUE) {
	header('Location: earnthroughus.php');
	} else {
	echo "Error: " . $sql . "<br>" . $con->error;
	}
}
?>