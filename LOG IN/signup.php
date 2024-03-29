<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4"></div>
        </div>

        <div class="row">


            <?php

if (isset($_POST['signup'])) {
extract($_POST); 
// all values will come to variable and don't have to repeat again and again to save varibales


#for first name
if(strlen($fname)<3){
	$error[] = 'Enter first name using atleast 3 characters';
}
if (strlen($fname)>20) {
	$error = 'First name not allowed more than 20 characters';
}
if (!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $fname)) {
	$error[] = 'Invalid Entry for First name!! Please Enter letters without any digit or special symbols';
}
// end of first name validation

// last name validation
if(strlen($lname)<3){
	$error[] = 'Enter Last name using atleast 3 characters';
}
if (strlen($lname)>20) {
	$error = 'Last name not allowed more than 20 characters';
}
if (!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $lname)) {
	$error[] = 'Invalid Entry for Last name!! Please Enter letters without any digit or special symbols';
}
// end of last name validation

// username validation
if(strlen($username)<3){
	$error[] = 'Enter username using atleast 3 characters';
}
if (strlen($username)>40) {
	$error = 'Username not allowed more than 40 characters';
}
 if(!preg_match("/^[a-zA-Z]/",$username)){
	$error[] = 'Invalid entry for username!! Username should start with an alphabet ';
}

// end of username validation

// email validation
	if (strlen($email)>40) {
	$error = 'Email not allowed more than 40 characters';
}
    if(!preg_match("/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/",$email)){
    $error[] = 'Invalid entry for email';
}

// end of email validation

if(strlen($password)<5){
	$error[] = 'The password should be at least 6 characterslong.';
}

if(strlen($password)>20){
	$error[] = 'The password should not be more than 50 characters.';
}

//  password
if ($confirmpassword == '') {
	$error[] = 'Please confrim password.';
}
// end for password

// confirmpassword
if ($password != $confirmpassword) {
	$error[] = 'Password do not match.';
}
// end for confirm password

$sql = "select * from users where (username = '$username' or email = '$email');";
$res = mysqli_query($dbc, $sql);
if (mysqli_num_rows($res) >0) {
	$row = mysqli_fetch_assoc($res);
	
		if($username==$row['username'])
 {
       $error[] ='Username alredy Exists.';
      } 
   if($email==$row['email'])
   {
        $error[] ='Email already Exists.';
      } 
  }
	 if(!isset($error)){ 
          $date=date('Y-m-d');
        $options = array("cost"=>4);
		$password = password_hash($password,PASSWORD_BCRYPT,$options);
        
        $sql = "INSERT INTO users SET fname='$fname', lname='$lname',username='$username',email='$email',password='$password',create_date='$date'";

       $result = mysqli_query($dbc,$sql);

       if($result)
{
 $done=2; 
}
else{
  $error[] ='Failed : Something went wrong';
}

}
}

?>


            <div class="errormsg-wrapper" style="margin-top: 20px;">
                <?php

if (isset($error)) {
foreach ($error as $error) {
	echo '<p class="errormsg">'.$error.' </p>';
}



}

?>
            </div>

            <div style="margin-top: 35px;" class="col-sm-12">
                <?php if(isset($done)) 
  { ?>
                <div class="successmsg">
                    <img style="width: 100%; height: 100%;" h src="images/a.jfif">
                    <span style="font-size:55px;">&#10003;</span> <br> You have registered successfully. <span
                        style="color: red;"> (Enjoy Renting)</span> <br>
                    <a href="login.php"
                        style="color:#fff; text-decoration: underline; color: blue; text-underline-position: under;">Login
                        here&#8594; </a>
                </div>

                <?php } else { ?>
                <!-- signup form start -->

                <div class="signupform">
                    <h1>Sign up</h1>
                    <!-- <img src="" alt="LOGO PICTURE" class="logo img-fluid"> -->
                    <p style="text-align: center; margin-top: 10px;">Already Have an Account? <a
                            style="text-decoration: none;" href="login.php">Log in&#8594;</a></p>


                    <form action="" method="POST">
                        <div class="form-group">
                            <label class="form-label" for="firstname">First Name</label>
                            <input type="text" id="firstname" class="form-control" name="fname"
                                value="<?php if (isset($error)) { echo $fname;}?>" required="">

                        </div>
                        <div class="form-group">
                            <label class="form-label" for="lastname">Last Name</label>
                            <input type="text" id="lastname" class="form-control" name="lname"
                                value="<?php if(isset($error)){ echo $lname;} ?>" required="">

                        </div>
                        <div class="form-group">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" id="username" class="form-control" name="username"
                                value="<?php if (isset($error)){echo $username; } ?>" required="">

                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="<?php if (isset($error)){echo $email; } ?>" required="">

                        </div>

                        <div class="form-group">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required="">

                        </div>
                        <div class="form-group">
                            <label class="form-label" for="confirmpassword">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword"
                                required="">

                        </div>
            
                       <!--  <div class="form-group">
                            <label class="form-label" for="confirmpassword">Status</label>
                            <input type="password" class="form-control" id="status" name="status" required="">

                        </div> -->
                        <button type="submit" name="signup" class="signbtn btn btn-primary" onclick="myFunction()">Sign
                            Up</button>



                    </form>
                    <?php } ?>


                </div>
                <!-- end of signupform -->

                <div class="col-sm-4"></div>
            </div>
            <!-- end of column -->
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</html>