<?php
error_reporting(0);
?>
<?php
  $msg = "";
  
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    $filename = $_FILES["uploadfile"]["name"];
    $filename1 = $_FILES["uploadfile1"]["name"];
    $filename2 = $_FILES["uploadfile2"]["name"];
    $filename3 = $_FILES["uploadfile3"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"]; 
    $tempname1 = $_FILES["uploadfile1"]["tmp_name"];
    $tempname2 = $_FILES["uploadfile2"]["tmp_name"];   
    $tempname3 = $_FILES["uploadfile3"]["tmp_name"];

    $folder = "Cart/upload/".$filename;
    $target_file = "Cart/upload/";      
    $db = mysqli_connect("localhost", "root", "", "logindb");  
        // Get all the submitted data from the form
//     if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_file)){
// echo " uploading your file.";
//     } else {
//     echo "Sorry, there was an error uploading your file.";
//   }
//     move_uploaded_file($_FILES["uploadfile1"]["tmp_name"], $target_file);
//     move_uploaded_file($_FILES["uploadfile2"]["tmp_name"], $target_file);
//      move_uploaded_file($_FILES["uploadfile3"]["tmp_name"], $target_file);

        $sql = "INSERT INTO earnthroughus (filename, filename1, filename2, filename3) VALUES ('$filename','$filename1','$filename2','$filename3')";
  
        // Execute query
        mysqli_query($db, $sql);
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $target_file))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }

       if (move_uploaded_file($tempname1, $target_file))  {
            $msg = "Image uploaded successfully1";
        }else{
            $msg = "Failed to upload image";
      }

       if (move_uploaded_file($tempname2, $target_file))  {
            $msg = "Image uploaded successfully2";
        }else{
            $msg = "Failed to upload image";
      }

       if (move_uploaded_file($tempname3, $target_file))  {
            $msg = "Image uploaded successfully3";
        }else{
            $msg = "Failed to upload image";
      }

      
  }
  $result = mysqli_query($db, "SELECT * FROM earnthroughus");
while($data = mysqli_fetch_array($result))
{
  
      ?>
<img src="<?php echo $data['Filename']; ?>">
  
<?php
}
?>