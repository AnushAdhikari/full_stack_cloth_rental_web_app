<?php include('adminnavbar.php'); ?>
<!DOCTYPE html>
<html lang="en">
​
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="stylelist.css">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <title>Category List</title>
</head>
​
<body>
<table class="table">
  <thead>
    <table class="user-list-table categorylist">
        <tr class="categorylist_tableheading">
            <th> Tag </th>
            <th>Category Id</th>
            <th>Category Name</th>
            <th>Category Image</th>
            <th>Product Type</th>
            <th>Action</th>
        </tr>
  </thead>
  <tbody class="categorylist_tablebody">
            <?php
            include 'connection.php';
            $sql= "SELECT * from category_table";
            $result= mysqli_query($con,$sql);
            if($result){
                while($row = mysqli_fetch_assoc($result)){
            
            $id= $row['id'];
            $tag = $row['tag'];
            $category_name= $row['category_name'];
            $category_img= $row['category_img'];
            $product_type= $row['product_type'];

            ?>

            <tr>
            <td><?php echo $tag ?></td>
            <td><?php echo $id ?></td>
            <td><?php echo $category_name ?></td>
            <td><?php echo $category_img ?></td>
            <td><?php echo $product_type ?></td>
            <td>
                <a class="confirm-link " href="editcategory.php?id=<?php echo $id ?>"><i class="material-icons categorylist_edit_btn" title="Edit">&#xE254;</i></a>&nbsp;&nbsp;&nbsp;
                <a class="confirm-link" id="delete-link" href="deletecategory.php?id=<?php echo $id ?>"><i class="material-icons" title="Delete"  onclick="return (confirm('Are you sure you want to edit'))" id="delete_category">&#xE872;</i></a>
            </td>
        </tr>

            <?php

                }
            }            
        ?>
​
    </table>
  </tbody>
</table>

</body>
<script type="text/javascript">
$(function(){
  $('#delete_category').click(function(){
      if(confirm('Are you sure you want to edit')) {
          return true;
      }

      return false;
  });
});
</html>