<!DOCTYPE html>
<html>

<head>
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <!-- login form -->
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <!-- col-sm breaks into 3 parts and since we want our form to be in middle we put our form in div of middle (12) -->

            <div class="col-sm-4 login-form">
                <div class="loginform">
                    <h1>Log In</h1>
                    <p>Don't have an account? <a style="text-decoration: none;" href="signup.php">Sign Up&#8594;</a></p>

                    <?php
                if(isset($_GET['loginerror'])) {
                $loginerror=$_GET['loginerror'];
                }
                if(!empty($loginerror)){echo '<p style="font-size:15px;" class="errormsg">Invalid login credentials!!</p>'; } 
                ?>

                    <!-- on form submit, go to loginprocess.php  -->
                    <form action="loginprocess.php" method="POST">
                        <div class="mb-3">
                            <label for="Username" class="form-label">Username or Email</label>
                            <input type="text" id="Username" name="login_var"
                                value="<?php if(!empty($loginerror)){ echo  $loginerror; } ?>" required=""
                                class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required="">
                        </div>
                        <button type="submit" name="sublogin" class="loginbtn btn btn-primary">Log In</button>
                    </form>
                    <!-- login form end -->

                    <!-- forgotpassword -->
                    <div class="login_forgot_pass">

                        <a href="forgetpassword.php">Forgot Password?</a>
                        <!-- forgotpassword end -->
                    </div>
                    <!-- no account -->



                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</html>