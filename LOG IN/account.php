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
            <div class="col-sm-3">
            </div>
            <div class="col-sm-12">
                <!--      <form action="login_process.php" method="POST"> -->
                <div class="profileform">
                    <h1> My profile</h1>
                    <div class="user-log-out"><a href="logout.php" id='logout'
                            onclick='return confirm("Are You sure you want to logout?");'><span
                                class="logout1 btn btn-danger">Logout</span> </a></div>

                    <p> Welcome! <span style="color:#33CC00"><?php echo $username; ?></span> </p>
                    
                    <table class="table">
                        <tr>
                            <th>First Name </th>
                            <td><?php echo $fname; ?></td>
                        </tr>
                        <tr>
                            <th>Last Name </th>
                            <td><?php echo $lname; ?></td>
                        </tr>
                        <tr>
                            <th>Username </th>
                            <td><?php echo $username; ?></td>
                        </tr>
                        <tr>
                            <th>Email </th>
                            <td><?php echo $email; ?></td>
                        </tr>
                    </table>
                    <div class="wishlist-click">
                        <a href="../Page/pages/show-wishlist.php" class="my-wishlists btn btn-primary">
                        My Wishlists
                        </a>
                    </div>


                     <div class="order-history-wrapper">
                            <a href="orderhistory.php" class="order-history btn btn-info"> My orders </a>
                    </div>
                    <!-- css for wishlist are in its style.css -->
                </div>

                <div class="col-sm-3">
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript">
    $(function() {
        $('a#logout').click(function() {
            if (confirm('Are you sure to logout')) {
                return true;
            }

            return false;
        });
    });
    </script>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</html>