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
    <title>Order List</title>
</head>
<body>
    <?php
    if (isset($_POST['name']))
     require "orderprocess.php";
      ?>

    <form method="POST" target="">
        <input type="text" name="fullname" required="">
        <input type="email" name="email" required="">
        <input type="text" name="address" required="">
        <input type="text" name="country" required="">
        <input type="text" name="state" required="">
        <input type="text" name="zipcode" required="">
        <input type="text" name="total_price" required="">
        <input type="text" name="order_status" required="">
        <input type="text" name="created_at" required="">
        <input type="text" name="updated_at" required="">
        <input type="submit" name="Submit">
    </form>
</body>
</html>
