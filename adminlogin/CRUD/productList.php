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

        <!-- databales cdn link -->

        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
        
        <!-- ebd of datatables cdn link -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="stylelist.css">
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <title>Product List</title>    
</head>
<body>

<table class="user-list-table productlist" id="myTable">

  <thead>
           <tr class="productlist_heading">
            <th> Tag </th>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Product Image 1</th>
            <th>Product Image 2</th>
            <th>Product Image 3</th>
            <th>Brand Name</th>
            <th>Rental Charge</th>
            <th>Retail Price</th>
            <th>Size</th>   
            <th>Product Information</th>
            <th>Product Type</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
  </thead>
  <tbody>
                    <?php
            include 'connection.php';
            $sql= "SELECT * from product_table";
            $result= mysqli_query($con,$sql);
            if($result){
                while($row = mysqli_fetch_assoc($result)){
            $tag = $row['tag'];
            $product_id= $row['product_id'];
            $product_info= $row['product_info'];
            $product_name= $row['product_name'];
            $product_img= $row['product_img'];
            $product_img1= $row['product_img1'];
            $product_img2= $row['product_img2'];
            $product_img3= $row['product_img3'];
            $brand_name= $row['brand_name'];
            $rental_charge= $row['rental_charge'];
            // $rent_days= $row['rent_days'];
            $retail_price= $row['retail_price'];
            $size= $row['size'];
            // $delivery_date= $row['delivery_date'];
            // $return_date= $row['return_date'];
            $product_type= $row['product_type'];
            $status= $row['status'];

            ?>

            <tr>
            <td><?php echo $tag ?></td>
            <td><?php echo $product_id ?></td>
            <td><?php echo $product_name ?></td>
            <td><?php echo $product_img ?></td>
            <td><?php echo $product_img1 ?></td>
            <td><?php echo $product_img2 ?></td>
            <td><?php echo $product_img3 ?></td>
            <td><?php echo $brand_name ?></td>
            <td><?php echo $rental_charge ?></td>?
            <!-- <td><?php echo $rent_days ?></td> -->
            <td><?php echo $retail_price ?></td>
            <td><?php echo $size ?></td>
           <!--  <td><?php echo $delivery_date ?></td>
            <td><?php echo $return_date ?></td> -->
            <td><?php echo $product_info ?></td>
            <td><?php echo $product_type ?></td>
            <td><?php echo $status ?></td>
            <td>
                <a class="confirm-link" href="editData.php?id=<?php echo $product_id ?>"><i class="material-icons productlist_edit_btn" title="Edit">&#xE254;</i></a>&nbsp;&nbsp;&nbsp;
                <a class="confirm-link" id="delete-link" href="deleteData.php?id=<?php echo $product_id ?>"><i class="material-icons productlist_dlt_btn" title="Delete" onclick="return (confirm('Are you sure you want to edit'))" id="delete_product">&#xE872;</i></a></td>
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

<!-- datatable js links -->

<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<!-- end of datatables link -->


<script type="text/javascript">
$(function(){
  $('#delete_product').click(function(){
      if(confirm('Are you sure you want to edit')) {
          return true;
      }

      return false;
  });
});
</script>


<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</html>




<!-- datatable css -->
<style type="text/css">

div.dataTables_wrapper div.dataTables_length select {
    width: 56px;
    display: inline-block;
    font-size: 14px;
}
div#myTable_length label {
    margin: 0 0 0 60px;
}
div#myTable_filter label {
    margin-right: 60px;
}


</style>
<!-- end of datatable css -->