<?php
include("Main Admin PDD/paper-dashboard-master/examples/db_config.php");

session_start();

if (!isset($_SESSION['id1'])) {
    $_SESSION['id1'] = null;
} else {
    $id1 = $_SESSION['id1'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <style>
        .product .product-img>img {
            width: 250px;
            height: 200px;
        }

        .product-widget .product-img>img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    <!-- HEADER -->
    <header>
        <div id="header" style="background-color: #00004d;">
            <?php
            $query = "SELECT * FROM `header` limit 1";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $logo = $row['weblogo'];
                    $phone = $row['phone'];
                    $email = $row['email'];
                    $address = $row['address'];
                    $url = $row['url'];
                }
            }
            ?>
            <!-- TOP HEADER -->
            <div id="top-header" style="background-color: #00004d;">
                <div class="container">
                    <ul class="header-links pull-left">
                        <li>
                            <p style="color: white;"><i class="fa fa-phone"></i> <?php echo $phone; ?></p>
                        </li>
                        <li>
                            <p style="color: white;"><i class="fa fa-envelope-o"></i> <?php echo $email; ?></p>
                        </li>
                        <li><a href="<?php echo $url; ?>" target="_blank"><i class="fa fa-map-marker"></i> <?php echo $address; ?></a></li>
                    </ul>
                    <ul class="header-links pull-right">
                        <li>
                            <p style="color: white;"> JD</p>
                        </li>
                        <li><a href="Login.php"><i class="fa fa-user-o"></i> My Account</a></li>
                        <?php if (!isset($id1)) : ?>
                            <li><i class="fa fa-user-o"></i> Log out</li>
                        <?php else : ?>
                            <li><a href="logout.php"><i class="fa fa-user-o"></i> Log out</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <!-- /TOP HEADER -->

            <!-- MAIN HEADER -->
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="#" class="logo">
                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($logo); ?>" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form action="search.php" method="GET">
                                <select class="input-select" name="select">
                                    <option value="0">All Categories</option>
                                    <option value="Laptops">Laptops</option>
                                    <option value="Smartphones">Smartphones</option>
                                    <option value="Cameras">Cameras</option>
                                    <option value="Accessories">Accessories</option>
                                </select>
                                <input class="input" name="search" placeholder="Search here">
                                <button class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->
                            <?php if (!isset($id1)) : ?>
                                <div>
                                    <a href="wishlist.php">
                                        <i class="fa fa-heart-o"></i>
                                        <span>Your Wishlist</span>
                                        <div class="qty">*</div>
                                    </a>
                                </div>
                            <?php else :

                                $query5 = "SELECT * from wishlist where id_user = '$id1'  ";
                                $result5 = mysqli_query($conn, $query5);
                                if (mysqli_num_rows($result5) > 0) {
                                    $sum = mysqli_num_rows($result5);
                                } else {
                                    $sum = 0;
                                }
                            ?>
                                <div>
                                    <a href="wishlist.php">
                                        <i class="fa fa-heart-o"></i>
                                        <span>Your Wishlist</span>
                                        <div class="qty"><?php echo $sum; ?></div>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <?php if (!isset($id1)) : ?>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Your Cart</span>
                                        <div class="qty">*</div>
                                    </a>
                                    <div class="cart-dropdown">
                                        <div class="cart-list" style="overflow: hidden;">
                                            <div class="product-widget">
                                                <h3 class="product-name">Please Login first.</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php else :
                                $query5 = "SELECT * from cart where id_user = '$id1'  ";
                                $result5 = mysqli_query($conn, $query5);
                                if (mysqli_num_rows($result5) > 0) {
                                    $sum = mysqli_num_rows($result5);
                                } else {
                                    $sum = 0;
                                }

                                $query5 = "SELECT SUM(product_price) AS 'Total product cart'  
                                FROM cart  where id_user = '$id1' ";
                                $result5 = mysqli_query($conn, $query5);
                                while ($row1 = mysqli_fetch_assoc($result5)) {
                                    $total_price = $row1['Total product cart'];

                                    if ($total_price == 0) {
                                        $total_price = 0;
                                    } else {
                                        $total_price = $total_price;
                                    }
                                }

                            ?>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Your Cart</span>
                                        <div class="qty"><?php echo $sum; ?></div>
                                    </a>
                                    <div class="cart-dropdown">
                                        <div class="cart-list">
                                            <?php
                                            $query5 = "SELECT * from cart where id_user = '$id1'  ";
                                            $result5 = mysqli_query($conn, $query5);
                                            if (mysqli_num_rows($result5) > 0) {
                                                while ($row1 = mysqli_fetch_assoc($result5)) {
                                                    $id_product1 = $row1['id'];
                                                    $product_image = $row1['product_images'];
                                                    $product_name1 = $row1['product_name'];
                                                    $qty = $row1['qty'];
                                                    $price = $row1['product_price'];
                                            ?>
                                                    <div class="product-widget">
                                                        <div class="product-img">
                                                            <img src="Main Admin PDD/paper-dashboard-master/upload/<?php echo $product_image; ?>" alt="">
                                                        </div>
                                                        <div class="product-body">
                                                            <h3 class="product-name"><a href="#"><?php echo $product_name1; ?></a></h3>
                                                            <h4 class="product-price"><span class="qty"><?php echo $qty; ?>x</span><?php echo $price; ?> JD</h4>
                                                        </div>
                                                        <a href="index1.php?id_product_cart=<?php echo $id_product1; ?>&id1=<?php echo $id1; ?>" class="delete"><i class="fa fa-close"></i></a>
                                                    </div>
                                            <?php
                                                }
                                            } else {
                                                echo ' <h3 class="product-name">There is no product.</h3>';
                                            }
                                            ?>
                                        </div>
                                        <div class="cart-summary">
                                            <small><?php echo $sum; ?> Item(s) selected</small>
                                            <h5>SUBTOTAL: <?php echo $total_price; ?> JD</h5>
                                        </div>
                                        <div class="cart-btns">
                                            <a href="cart.php">View Cart</a>
                                            <a href="orders.php" style="background: black;">Your order</a>
                                            <a href="checkout.php">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;

                            if (isset($_GET['id_product_cart']) && isset($_GET['id1'])) {
                                $id1 = $_GET['id1'];
                                $id2 = $_GET['id_product_cart'];

                                $query4 = "SELECT * from cart where id = '$id2' ";
                                $result4 = mysqli_query($conn, $query4);
                                $sdf = mysqli_num_rows($result4);
                                if (mysqli_num_rows($result4) > 0) {

                                    while ($row3 = mysqli_fetch_assoc($result4)) {
                                        $id2 = $row3['id'];

                                        $query3 = "DELETE FROM `cart` where id_user = '$id1' and id = '$id2' ";
                                        $result3 = mysqli_query($conn, $query3);
                                        echo '<script>alert("The product was deleted."); </script>';
                                        echo '<script> window.location.href = "single-product-hot-deals.php"; </script>';
                                    }
                                }
                            }
                            ?>

                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation" style="background-color: #2C74B3;">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li><a href="index1.php">Home</a></li>
                    <li class="active"><a href="Hot-deals.php">Hot Deals</a></li>
                    <li><a href="product.php?filter=All Categories">All Categories</a></li>
                    <li><a href="product.php?filter=Laptops">Laptops</a></li>
                    <li><a href="product.php?filter=Smartphones">Smartphones</a></li>
                    <li><a href="product.php?filter=Cameras">Cameras</a></li>
                    <li><a href="product.php?filter=Accessories">Accessories</a></li>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->

    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="index1.php">Home</a></li>
                        <li><a href="Hot-deals.php">Hot Deals</a></li>
                        <li><a href="product.php?filter=<?php echo $_GET['category']; ?>"><?php echo $_GET['category']; ?></a></li>
                        <li class="active"><?php echo $_GET['name']; ?></li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <?php
            $id = $_GET['id'];
            $query = "SELECT * from hot_deales WHERE id = '$id' ";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $product_name = $row['product_name'];
                    $pieces = $row['product_images'];
                    $cata = $row['product_category'];
                    $days = $row['hot_deals_end'];
                    $date = $row['uploaded_on'];
                    $product_price = $row['product_price'];
                    $quantity_of_devices = $row['quantity_of_devices'];
                    $short_description = $row['short_description'];
                    $full_description = $row['full_description'];
                    $product_colors = $row['product_colors'];

                    $uploaded_on2 = date_create($date);

                    date_modify($uploaded_on2, "+$days  days");

                    $uploaded_on2 = date_format($uploaded_on2, "Y-m-d");
            ?>
                    <div class="row">
                        <!-- Product main img -->
                        <div class="col-md-5 col-md-push-2">
                            <div id="product-main-img">
                                <?php
                                $piece = explode(",", $pieces);
                                for ($i = 0; $i < count($piece); $i++) {
                                    if (!empty($piece[$i])) {
                                        echo '
                                <div class="product-preview">
                                    <img src="Main Admin PDD/paper-dashboard-master/upload/' . $piece[$i] . '"  style=" width: 450px; height: 450px;"alt="">
                                </div>
                                 ';
                                    } else {
                                    }
                                }
                                ?>

                            </div>
                        </div>
                        <!-- /Product main img -->

                        <!-- Product thumb imgs -->
                        <div class="col-md-2  col-md-pull-5">
                            <div id="product-imgs">
                                <?php
                                $piece = explode(",", $pieces);
                                for ($i = 0; $i < count($piece); $i++) {
                                    if (!empty($piece[$i])) {
                                        echo '
                                <div class="product-preview">
                                    <img src="Main Admin PDD/paper-dashboard-master/upload/' . $piece[$i] . '"  style=" width: 150px; height: 150px;" alt="">
                                </div>
                                 ';
                                    } else {
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <!-- /Product thumb imgs -->

                        <!-- Product details -->
                        <div class="col-md-5">
                            <div class="product-details">
                                <h2 class="product-name"><?php echo $product_name; ?></h2>
                                <div>
                                    <div class="product-rating">
                                        <?php
                                        $query = "SELECT * from review where id_product='$id' and point = 0";
                                        $result = mysqli_query($conn, $query);
                                        $num_rate1 = mysqli_num_rows($result);

                                        $query = "SELECT SUM(rate) as 'reting1' from review where id_product='$id' and point = 0 ";
                                        $result = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $rate = $row['reting1'];

                                                if (!$num_rate1 == 0) {
                                                    $new_rate = $rate / $num_rate1;

                                                    for ($j = 1; $j <= round($new_rate, '0'); $j++) {
                                                        echo ' <i class="fa fa-star"></i>';
                                                    }

                                                    $dis = 5 - $new_rate;
                                                    for ($y = 1; $y <= round($dis, '1'); $y++) {
                                                        echo ' <i class="fa fa-star-o"></i>';
                                                    }
                                                } else {
                                                    for ($j = 1; $j <= 5; $j++) {
                                                        echo ' <i class="fa fa-star"></i>';
                                                    }
                                                }
                                            }
                                        }

                                        ?>

                                    </div>
                                    <?php
                                    $query = "SELECT * from review where id_product='$id' and point = 0";
                                    $result = mysqli_query($conn, $query);
                                    $num_rate = mysqli_num_rows($result);
                                    ?>
                                    <a class="review-link" href=""><?php echo $num_rate; ?> Review(s) </a>
                                </div>
                                <div>

                                    <?php
                                    echo ' <h4 class="product-price">' . $product_price . ' JD</h4>';

                                    if ($quantity_of_devices > 0) {
                                        echo ' <span class="product-available">In Stock</span>';
                                    } else {
                                        echo ' <span class="product-available">Quantity is out</span>';
                                    }

                                    ?>

                                </div>
                                <p><?php echo $short_description; ?></p>
                                <form method="POST" action="cart.php">
                                    <?php
                                    if ($quantity_of_devices > 0) {
                                    ?>
                                        <div class="product-options">
                                            <label>
                                                Color
                                                <select class="input-select" name="color_hot">
                                                    <?php
                                                    $piece = explode(",", $product_colors);
                                                    for ($i = 0; $i < count($piece); $i++) {
                                                        echo '
                                                    <option value="' . $piece[$i] . '">' . $piece[$i] . '</option>
                                                    ';
                                                    }
                                                    ?>

                                                </select>
                                            </label>
                                        </div>

                                        <div class="add-to-cart">
                                            <div class="qty-label">
                                                Qty
                                                <div class="input-number">
                                                    <input type="number" value="1" name="qty_hot">
                                                    <span class="qty-up">+</span>
                                                    <span class="qty-down">-</span>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id_product_hot" value="<?php echo $id; ?>" />
                                            <button class="add-to-cart-btn" name="submit"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                        </div>
                                </form>
                            <?php } else {
                                        echo ' <span class="product-available">Quantity is out</span>';
                                    } ?>

                            <h5> Start in <?php echo $date; ?></h5>
                            <h5>Ends in <?php echo $uploaded_on2; ?> </h5>
                            <?php
                            if ($quantity_of_devices > 0) {
                            ?>
                                <ul class="product-btns">
                                    <li><a href="wishlist.php?id_hot=<?php echo $id; ?>&id1_hot=<?php echo $id1; ?>"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                                </ul>
                            <?php } else { ?>

                            <?php } ?>
                            <ul class="product-links">
                                <li>Category:</li>
                                <li><a href="#"><?php echo $cata ?></a></li>
                            </ul>



                            </div>
                        </div>
                        <!-- /Product details -->

                        <!-- Product tab -->
                        <div class="col-md-12">
                            <div id="product-tab">
                                <!-- product tab nav -->
                                <ul class="tab-nav">
                                    <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                                    <li><a data-toggle="tab" href="#tab2">Details</a></li>
                                    <li><a data-toggle="tab" href="#tab3">Reviews (<?php echo $num_rate; ?>)</a></li>
                                </ul>
                                <!-- /product tab nav -->

                                <!-- product tab content -->
                                <div class="tab-content">
                                    <!-- tab1  -->
                                    <div id="tab1" class="tab-pane fade in active">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p><?php echo $full_description ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /tab1  -->

                                    <!-- tab2  -->
                                    <div id="tab2" class="tab-pane fade in">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Description: <?php echo $short_description ?></p><br>
                                                <p>Add in: <?php echo $date; ?></p><br>
                                                <p>Number of days to ends: <?php echo $days ?></p><br>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /tab2  -->

                                    <!-- tab3  -->
                                    <div id="tab3" class="tab-pane fade in">
                                        <div class="row">

                                            <!-- Reviews -->
                                            <div class="col-md-6">
                                                <div id="reviews">
                                                    <ul class="reviews">
                                                        <?php
                                                        $query = "SELECT * from review where id_product='$id' and point = 0";
                                                        $result = mysqli_query($conn, $query);
                                                        $num_rate = mysqli_num_rows($result);
                                                        if (mysqli_num_rows($result) > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $id_user = $row['id_user'];
                                                                $id_user = $row['id_product'];
                                                                $name1 = $row['name'];
                                                                $email = $row['email'];
                                                                $review = $row['review'];
                                                                $time_uploade = $row['time_uploade'];
                                                                $rate = $row['rate'];
                                                        ?>
                                                                <li>
                                                                    <div class="review-heading">
                                                                        <h5 class="name"><?php echo $name1; ?></h5>
                                                                        <p class="date"><?php echo $time_uploade; ?></p>
                                                                        <div class="review-rating">
                                                                            <?php


                                                                            for ($j = 1; $j <= $rate; $j++) {
                                                                                echo ' <i class="fa fa-star"></i>';
                                                                            }
                                                                            $dis = 5 - $rate;
                                                                            for ($y = 1; $y <= round($dis, '0'); $y++) {
                                                                                echo ' <i class="fa fa-star-o empty"></i>';
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="review-body">
                                                                        <p><?php echo $review; ?></p>
                                                                    </div>
                                                                </li>
                                                        <?php
                                                            }
                                                        } else {
                                                            echo '<h6 class="sub-title">There is no any review.</h6>';
                                                        } ?>
                                                    </ul>

                                                </div>
                                            </div>
                                            <!-- /Reviews -->

                                            <!-- Review Form -->
                                            <div class="col-md-3">
                                                <div id="review-form">
                                                    <form class="review-form" method="POST">
                                                        <input class="input" type="text" name="name1" placeholder="Your Name" require>
                                                        <input class="input" type="email" name="name2" placeholder="Your Email" require>
                                                        <textarea class="input" placeholder="Your Review" name="name3" require></textarea>
                                                        <div class="input-rating">
                                                            <span>Your Rating: </span>
                                                            <div class="stars">
                                                                <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                                <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                                <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                                <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                                <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                            </div>
                                                        </div>
                                                        <button class="primary-btn" name="review">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /Review Form -->
                                            <?php
                                            if (isset($_POST['review'])) {
                                                if (!isset($_SESSION['id1'])) {
                                                    echo 'Login first to rateing the product;';
                                                } else {
                                                    $name1 = $_POST['name1'];
                                                    $name2 = $_POST['name2'];
                                                    $name3 = $_POST['name3'];
                                                    $name4 = $_POST['rating'];

                                                    $id1 = $_SESSION['id1'];
                                                    $query = "SELECT * from review where id_user = '$id1' and id_product='$id' and point = 0 ";
                                                    $result = mysqli_query($conn, $query);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $id_user = $row['id_user'];
                                                            $rate = $row['rate'];
                                                            $name = $row['name'];
                                                            $email = $row['email'];
                                                            $review = $row['review'];

                                                            $query3 = "UPDATE `review` SET `rate`='$name4',`name`='$name1',`email`='$name2',`review`='$name3',`time_uploade`= NOW() WHERE id_user = '$id1' and id_product='$id' and point = 0 ";
                                                            $result = mysqli_query($conn, $query3);

                                                            $query4 = "SELECT * from review where id_product='$id' ";
                                                            $result4 = mysqli_query($conn, $query4);
                                                            $num_rate1 = mysqli_num_rows($result4);
                                                            if (mysqli_num_rows($result4) > 0) {

                                                                $query11 = "SELECT SUM(rate) as 'reting1' from review where id_product='$id' and point = 0";
                                                                $result11 = mysqli_query($conn, $query11);
                                                                if (mysqli_num_rows($result11) > 0) {
                                                                    while ($row = mysqli_fetch_assoc($result11)) {
                                                                        $rate1 = $row['reting1'];

                                                                        $rate2 = $rate1 / $num_rate1;


                                                                        $query10 = "UPDATE `hot_deales` SET `rate`='$rate2' WHERE id = '$id' ";
                                                                        mysqli_query($conn, $query10);
                                                                    }
                                                                }
                                                            }
                                                            echo '<script> alert ("the Review edited."); </script>';
                                                            echo '<script> window.location.href = "single-product-hot-deals.php?id=' . $id . '&name=' . $product_name . '&category=' . $cata . '"; </script>';
                                                        }
                                                    } else {

                                                        $query = "INSERT INTO `review`(`id_user`, `id_product`, `rate`, `name`, `email`, `review`, `point`) VALUES
                                                ('$id1','$id','$name4','$name1','$name2','$name3','0') ";
                                                        $result = mysqli_query($conn, $query);


                                                        $query1 = "SELECT * from review where id_product='$id' and point = 0";
                                                        $result1 = mysqli_query($conn, $query1);
                                                        $num_rate1 = mysqli_num_rows($result1);
                                                        if (mysqli_num_rows($result1) > 0) {

                                                            $query11 = "SELECT SUM(rate) as 'reting1' from review where id_product='$id' and point = 0";
                                                            $result11 = mysqli_query($conn, $query11);

                                                            if (mysqli_num_rows($result11) > 0) {
                                                                while ($row = mysqli_fetch_assoc($result11)) {
                                                                    $rate1 = $row['reting1'];

                                                                    $rate3 = $rate1 / $num_rate1;


                                                                    $query = "UPDATE `hot_deales` SET `rate`='$rate3' WHERE id = '$id'";
                                                                    mysqli_query($conn, $query);
                                                                }
                                                            }
                                                        }
                                                        echo '<script> alert ("Add Review."); </script>';
                                                        echo '<script> window.location.href = "single-product-hot-deals.php?id=' . $id . '&name=' . $product_name . '&category=' . $cata . '"; </script>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- /tab3  -->
                                </div>
                                <!-- /product tab content  -->
                            </div>
                        </div>
                        <!-- /product tab -->
                    </div>
            <?php

                }
            }
            ?>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- Section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3 class="title">Hot Deals Products</h3>
                    </div>
                </div>

                <!-- product -->
                <?php
                $query = "SELECT * from hot_deales where id != '$id'";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row1 = mysqli_fetch_assoc($result)) {
                        $id = $row1['id'];
                        $product_name = $row1['product_name'];
                        $pieces = $row1['product_images'];
                        $cata = $row1['product_category'];
                        $days = $row1['hot_deals_end'];
                        $date = $row1['uploaded_on'];
                        $rate1 = $row1['rate'];
                        $product_price = $row1['product_price'];
                        $piece = explode(",", $pieces);


                        $uploaded_on2 = date_create($date);

                        date_modify($uploaded_on2, "+$days days");

                        $uploaded_on2 = date_format($uploaded_on2, "Y-m-d");

                ?>
                        <div class="col-md-3 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    <img src="Main Admin PDD/paper-dashboard-master/upload/<?php echo $piece[0]; ?>" style="width:250px; height=auto;" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category"><?php echo $cata; ?></p>
                                    <h3 class="product-name"><a href="single-product-hot-deals.php?id=<?php echo $id; ?>&name=<?php echo $product_name; ?>&category=<?php echo $$cata; ?>"><?php echo $product_name; ?></a></h3>
                                    <?php
                                    echo ' <h4 class="product-price">' . $product_price . ' JD</h4>';

                                    ?>

                                    <h5> Start in <?php echo $date; ?></h5>
                                    <h5>Ends in <?php echo $uploaded_on2; ?> </h5>
                                    <div class="product-rating">
                                        <?php
                                        for ($j1 = 1; $j1 <= round($rate1, '0'); $j1++) {
                                            echo ' <i class="fa fa-star"></i>';
                                        }

                                        $dis1 = 5 - $rate1;
                                        for ($y1 = 1; $y1 <= round($dis1, '1'); $y1++) {
                                            echo ' <i class="fa fa-star-o"></i>';
                                        }
                                        ?>
                                    </div>
                                    <div class="product-btns">
                                        <a href="wishlist.php?id=<?php echo $id1 ?>&id1=<?php echo $id1; ?>" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></a>
                                    </div>
                                </div>
                                <div class="add-to-cart">
                                    <a href="" class="add-to-cart-btn"><i class="fa fa-shopping-cart" style="margin-top: -10px; position: absolute;"></i> add to cart</a>
                                </div>
                            </div>
                        </div>

                <?php

                    }
                }
                ?>
                <!-- /product -->

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /Section -->

    <!-- FOOTER -->
    <footer id="footer" style="background-color: #00004d;">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">About Us</h3>
                            <p>We work to serve buyers in the best way possible.</p>
                            <?php
                            $query = "SELECT * FROM `header` limit 1";
                            $result = mysqli_query($conn, $query);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $logo = $row['weblogo'];
                                    $phone = $row['phone'];
                                    $email = $row['email'];
                                    $address = $row['address'];
                                    $url = $row['url'];
                                }
                            }
                            ?>
                            <ul class="footer-links">
                                <li>
                                    <p style="color: white;"><i class="fa fa-phone"></i> <?php echo $phone; ?></p>
                                </li>
                                <li>
                                    <p style="color: white;"><i class="fa fa-envelope-o"></i> <?php echo $email; ?></p>
                                </li>
                                <li><a href="<?php echo $url; ?>" target="_blank"><i class="fa fa-map-marker"></i> <?php echo $address; ?></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Categories</h3>
                            <ul class="footer-links">
                                <li><a href="Hot-deals.php">Hot Deals</a></li>
                                <li><a href="product.php?filter=Laptops">Laptops</a></li>
                                <li><a href="product.php?filter=Smartphones">Smartphones</a></li>
                                <li><a href="product.php?filter=Cameras">Cameras</a></li>
                                <li><a href="product.php?filter=Accessories">Accessories</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Service</h3>
                            <ul class="footer-links">
                                <li><a href="Login.php">My Account</a></li>
                                <li><a href="cart.php">View Cart</a></li>
                                <li><a href="wishlist.php">Wishlist</a></li>
                                <li><a href="orders.php">Track My Order</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-payments">
                            <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                            <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                        </ul>
                        <span class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>