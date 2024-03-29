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
    <?php
                
                $sql = "SELECT * FROM orders WHERE email= '$email'";
                
                $result = mysqli_query($dbc, $sql);

                if ($result) {
                    ?>
     <table class="cart-table account-table table table-bordered bg-white text-dark">
        <thead>
            <tr>
                <th>Orderid</th>
                <th>Created At</th>                     
                <th>Total Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM orders WHERE email= '$email'";
        $result = mysqli_query($dbc, $sql);
        
        if ($result) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {                   
        ?>
        <tr>
                <td>
                    <div class="orderhost-id">
                <a href="orderdetail.php?orderid=<?php echo $row["id"] ?>">  <?php echo $row["id"] ?></a>
                </div>
                
                </td>
                
             
                <td>
                

                <?php echo date('M j g:i A', strtotime($row["created_at"]));  ?>     
                </td>
                <td>Rs.
                <?php echo $row["total_price"] ?>
                </td>
                <td>
                    <div id="view-order">
                    <a href="orderdetail.php?orderid=<?php echo $row["id"] ?>">View Detail</a> 
                </div>
                     
                </td>
            </tr>
        <?php 
            }
        }
        ?>
        </tbody>
    </table>
<?php } else {
    ?>
    <div class="order-response">  <h3>Not any order placed yet !!</h3></div>
    <?php
} ?>

    </div>
</div>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</html>