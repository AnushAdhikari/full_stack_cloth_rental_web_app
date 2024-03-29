<?php

	require("connection.php");

?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Log In</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">	
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" type="text/css" href="style.css">
<body>

<div class="container"> 
<div class="row">
	<div class="col-sm-4"></div> <!-- col-sm breaks into 3 parts and since we want our form to be in middle we put our form in div of middle (12) -->

	<div class="col-sm-4">
		<div class="adminlogin">
			<h1>Admin Log In</h1>

<form method="POST" action="">		
<div class="mb-3">
<label for="admin" class="form-label">Admin</label>
<input type="text" name="adminname" id="admin" class="form-control" placeholder="admin ">
</div>
<div class="mb-3">
<label for="password" class="form-label">Password</label>
<input type="password" name="adminpassword" id="password" class="form-control" placeholder="password">
</div>
<div class="form-group">
<div class="custom-control custom-checkbox small">
    <input type="checkbox" class="custom-control-input" id="customCheck">
    <label class="custom-control-label" for="customCheck">Remember
        Me</label>
</div>
</div>
<button type="submit" name="Signin" class="adminbtn btn btn-primary">Log In</button>
</form>	

<div class="text-center adminfogotpass">
    <a class="small" href="admindashboard/forgot-password.html">Forgot Password?</a>
</div>

<br>

<?php 

if(isset($_POST['Signin']))
{
	$query= "SELECT * FROM `adminlogin` WHERE `Admin_Name`='$_POST[adminname]' AND `Admin_Password`='$_POST[adminpassword]'";
	$result = mysqli_query($con, $query);
	if(mysqli_num_rows($result)==1)
	{
		session_start();
		$_SESSION['adminloginId']=$_POST['adminname'];
		header("location: AdminPanel.php"); 

	}
	else{
		echo "<script> alert('Incorrect Password');</script>";
	}
}

?>





		</div>
	</div>
	<div class="col-sm-4"></div>
</div>
</div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
