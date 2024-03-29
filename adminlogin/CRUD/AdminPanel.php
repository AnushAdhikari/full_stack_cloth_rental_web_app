<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width, inittial scale=1.0">
	<title>Admin Panel</title>
</head>
<body>

	<?php

	include ("adminhome.php");

	?>


<?php 

	if(isset($_POST['Logout']))
	{
		session_destroy();
	
	}

?>
<script type="text/javascript">
$(function(){
  $('#adminlogout').click(function(){
      if(confirm('Are you sure to logout')) {
          return true;
      }

      return false;
  });
});
</script>
</body>


</html>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>