    <?php 
    session_start();
    require_once("config.php"); 
    if(isset($_SESSION["login_email"])) 
    {
    $email=$_SESSION["login_email"];
    $findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email= '$email'"); //finds if username or email is in data base or not //
    if($res = mysqli_fetch_array($findresult))
    {
        $username = $res['username']; 
    }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

<!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<link rel="stylesheet" href="../Page/pages/styles/navbar.css" />
<link rel="stylesheet" href="../Page/pages/styles/logo-nav.css" />
<link rel="stylesheet" href="../Page/pages/styles/sneaker.css" />
<link rel="stylesheet" href="../Page/pages/styles/collections.css" />
<link rel="stylesheet" href="../Page/pages/styles/description-collection.css" />
<link rel="stylesheet" href="../Page/pages/styles/scrollbar.css" />
<link rel="stylesheet" href="../Page/pages/styles/categorie.css" />
<link rel="stylesheet" href="../Page/pages/styles/products.css" />
<link rel="stylesheet" href="../Page/pages/styles/creator.css" />
<link rel="stylesheet" href="../Page/pages/styles/footer.css" />
<link rel="stylesheet" href="../Page/pages/styles/category.css" />
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="../Page/pages/Cart/style.css">



<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<link rel="stylesheet" href="styles/swiper.css"/>

<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet"/>
<title>Cloth Rental</title>
</head>
<body>
<div class="logo-nav">
<div class="login">
         <i class="fa fa-user-circle" aria-hidden="true"></i>
                                    <?php 
                            if(isset($_SESSION["login_email"])) 
                            { ?>
                                <!-- prints if username is logge in db prints username -->
                               <a href="account.php"> <span><?php echo $username ?> </span></a> 
                            <?php } else{ ?>
                                     <i class="fa fa-user-circle" aria-hidden="true"></i>
                                    <a href="login.php"><span>Sign In Or Register </span></a>
                            <?php }  ?>
</div>
<a href="../Page/pages/index.php">
<div class="logo">
    <img class="imglogo" src="../Page/pages/images/logo3.png" alt="" />
</div>
</a>
<div class="panier">
    <a href="../Page/pages/cart.php" class="nav-item nav-link active">
                <h5 class="px-5 cart">
                    <i class="fas fa-shopping-cart"></i> Cart
                                       <?php

                    if (isset($_SESSION['cart']) && isset($_SESSION["login_email"])){
                        $count = count($_SESSION['cart']);
                        // if user is logged in and has product in cart it shows number of products added to cart
                        echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                    }else{
                        echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                    }

                    ?>
                </h5>
            </a>
</div>
</div>
<nav>
<div class="hamburger">
    <div class="line1"></div>
    <div class="line2"></div>
    <div class="line3"></div>
</div>
<ul class="nav-links">
    <li><a href="../Page/pages/index.php">Home</a></li>
    <li><a href="../Page/pages/formen.php">Men's Collection</a></li>
    <li><a class="current" href="../Page/pages/forwomen.php">Women's Collection</a></li>
    <li><a href="../Page/pages/earnthroughus.php">Earn Through Us</a></li>
    <!-- <li>
        <form class="form-inline my-2 my-lg-0 ">
        <div class="search-box">
            <input class="form-control mr-sm-2" type="search" placeholder="search products..." aria-label="Search">
            <div class="result"></div>
        </div>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </li> -->
</ul>
</nav>
