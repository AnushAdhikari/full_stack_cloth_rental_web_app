<?php

   session_start();
   if(!isset($_SESSION['adminloginId']))
   {
      header("location: adminlogin.php");
   }

   if(isset($_POST['Logout']))
{
   session_destroy();
   header("location: adminlogin.php");
}

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Admin Dashboard</title>
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" type="text/css" href="stylelist.css">
      <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   </head>
   <body>
      <nav class="adminnav navbar navbar-expand-lg navbar-light bg-light">
         <div class="container-fluid admindash">
            <a href="adminhome.php"><h1>Admin Dashboard</h1></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
               <ul class="navbar-nav">
                  <div class="dropdown--wrapper">
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="categorydrp navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Category
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="addcategory.php">Add Category</a></li>
                        <li><a class="dropdown-item" href="categorylist.php">Category List</a></li>
                     </ul>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="productdrp navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Product
                     </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="addproduct.php">Add Product</a></li>
                        <li><a class="dropdown-item" href="productList.php">Product List</a></li>
                     </ul>
                  </li>
               </div>
                  <div class="logoutbtn">
                  <li class="nav-item">
                     <form method="POST">
                        <button type="submit" id="adminlogout" name="Logout" onclick="return (confirm('Are you sure you want to log out'))">Log Out</button>
                     </form>
                  </li>
                  </div>

               </ul>
            </div>
         </div>

      </nav>