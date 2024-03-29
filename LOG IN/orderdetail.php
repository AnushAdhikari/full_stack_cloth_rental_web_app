<?php include 'accountheader.php' ?>

<?php require_once("config.php");
if(!isset($_SESSION["login_sess"])) 
{
header("location:login.php"); 
}
$email=$_SESSION["login_email"];
$findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email= '$email'");
if($res = mysqli_fetch_array($findresult))
{
$username = $res['username']; 
$fname = $res['fname'];   
$lname = $res['lname'];  
$email = $res['email'];  
}

?>

<body>
<div class="container">
<div class="row">            
    <div class="col-sm-12">
         <table class="cart-table account-table table table-bordered bg-white text-dark">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Delivery Date</th>                     
                <th>Return Date</th>
                
            </tr>
        </thead>
        <tbody>
        <?php
        $orderid=$_GET['orderid'];
        $sql = "SELECT * FROM product_table WHERE orderid= '$orderid'";
        $result = mysqli_query($dbc, $sql);
        
        if ($result) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {                   
        ?>
        <tr>
                <td>
                  <?php echo $row["product_name"] ?>
                
                </td>               
             
                <td>               

                <?php echo date('M j g:i A', strtotime($row["delivery_date"]));  ?>     
                </td>
                <td>               

                <?php echo date('M j g:i A', strtotime($row["return_date"]));  ?>     
                </td>
                
            </tr>
        <?php 
            }
        }
        ?>
        </tbody>
    </table>


    </div>
</div>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</html>