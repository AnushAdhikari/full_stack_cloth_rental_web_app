<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">

            <div class="col-md-4 offset-md-4 form-forget">

                <div class="userloginforgetpassword">
                <form action="forgetpassword.php" method="POST" autocomplete="">
                    <h2 class="text-center">Forgot Password</h2>
                    <p class="text-center">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
                    <?php
                        if(mysqli_connect_error()){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>

                    <div class="form-group email_forgot ">
                        <input class="form-control" type="text" name="email" placeholder="Enter email address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group rest_pass">
                        <input class="form-control button" type="submit" name="check-email" value="Rest Password">
                    </div>
                    <div class="form-group already_have_acc">
                        Already have an account?
                    <a href="login.php"> Log In&#8594;</a>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    
</body>
</html>