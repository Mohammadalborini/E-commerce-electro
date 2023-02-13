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
        <div id="header" style="background-color: #00004d;">
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
                                <button class="search-btn" style="background: #2C74B3;">Search</button>
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
                                        echo '<script> window.location.href = "product.php"; </script>';
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
                    <li><a href="Hot-deals.php">Hot Deals</a></li>

                    <li <?php if ($_GET['filter'] == "All Categories") {
                            echo 'class="active" ';
                        } ?>><a href="product.php?filter=All Categories">All Categories</a></li>

                    <li <?php if ($_GET['filter'] == "Laptops") {
                            echo 'class="active" ';
                        } ?>><a href="product.php?filter=Laptops">Laptops</a></li>

                    <li <?php if ($_GET['filter'] == "Smartphones") {
                            echo 'class="active" ';
                        } ?>><a href="product.php?filter=Smartphones">Smartphones</a></li>

                    <li <?php if ($_GET['filter'] == "Cameras") {
                            echo 'class="active" ';
                        } ?>><a href="product.php?filter=Cameras">Cameras</a></li>

                    <li <?php if ($_GET['filter'] == "Accessories") {
                            echo 'class="active" ';
                        } ?>><a href="product.php?filter=Accessories">Accessories</a></li>


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
                        <li><a href="product.php?filter=All Categories">category</a></li>
                        <li><a href="#"><?php echo $_GET['filter']; ?></a></li>
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
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Top selling</h3>

                        <?php
                        $query = "SELECT * from product order by numer_seller DESC  limit 3";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) :
                            while ($row2 = mysqli_fetch_assoc($result)) :
                                $id4 = $row2['id'];
                                $product_name = $row2['product_name'];
                                $product_images = $row2['product_images'];
                                $product_category = $row2['product_category'];
                                $discount = $row2['discount'];
                                $product_price = $row2['product_price'];
                        ?>
                                <!-- product widget -->
                                <div class="product-widget">
                                    <div class="product-img">
                                        <?php
                                        $piece = explode(",", $product_images);
                                        echo '
                                             <img src="Main Admin PDD/paper-dashboard-master/upload/' . $piece[0] . '" alt="">
                                             ';

                                        ?>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"><?php echo $product_category; ?></p>
                                        <h3 class="product-name"><a href="single-product-product.php?id=<?php echo $id4; ?>&name=<?php echo $product_name; ?>&category=<?php echo $product_category; ?>"><?php echo $product_name; ?></a></h3>
                                        <?php
                                        if (!($discount) == null) {
                                            echo '<h4 class="product-price">' . $discount . ' JD<del class="product-old-price">' . $product_price . ' JD</del></h4>';
                                        } else {
                                            echo ' <h4 class="product-price">' . $product_price . ' JD</h4>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- /product widget -->
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <!-- /aside Widget -->
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="store-sort">
                            <form method="post">
                                <label>
                                    Sort By:
                                    <select class="input-select" name="filter">
                                        <option value="0">Popular</option>
                                        <option value="1">Rate (Low to High)</option>
                                        <option value="2">Rate (High to Low)</option>
                                        <option value="3">Price (Low to High)</option>
                                        <option value="4">Price (High to Low)</option>
                                    </select>
                                </label>
                                <button name="search" style="background: #2C74B3; color: white;">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /store top filter -->

                    <!-- store products -->

                    <?php

                    if (!isset($_POST['search'])) :

                    ?>
                        <div class="row">

                            <?php
                            $categ = $_GET['filter'];

                            if (!($categ == 'All Categories')) {
                            ?>
                                <?php

                                $query = "SELECT * from product where product_category = '$categ' ";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) :
                                    while ($row = mysqli_fetch_assoc($result)) :
                                        $id2 = $row['id'];
                                        $product_name = $row['product_name'];
                                        $uploaded_on = $row['uploaded_on'];
                                        $product_images = $row['product_images'];
                                        $discount = $row['discount'];
                                        $product_category = $row['product_category'];
                                        $product_price = $row['product_price'];
                                        $rate = $row['rate'];
                                ?>
                                        <!-- product -->
                                        <div class="col-md-4 col-xs-6">
                                            `
                                            <div class="product">
                                                <div class="product-img">
                                                    <?php
                                                    $piece = explode(",", $product_images);
                                                    echo '
                                             <img src="Main Admin PDD/paper-dashboard-master/upload/' . $piece[0] . '"  alt="" ">
                                             ';

                                                    ?>
                                                    <div class="product-label">
                                                        <?php
                                                        if (!($discount) == null) {

                                                            $new_dis = (1 - ($discount / $product_price)) * 100;
                                                            echo '  <span class="sale">-' . round($new_dis, 0) . '%</span>';
                                                        }
                                                        ?>
                                                        <?php
                                                        $uploaded_on = date_create($uploaded_on);

                                                        date_modify($uploaded_on, "+2 days");

                                                        $uploaded_on = date_format($uploaded_on, "Y-m-d");

                                                        $expire_time = strtotime($uploaded_on);

                                                        $today_time = strtotime(date("Y-m-d"));
                                                        if ($expire_time > $today_time) {
                                                            echo ' <span class="new" >NEW</span>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category"><?php echo $product_category; ?></p>
                                                    <h3 class="product-name"><a href="single-product-product.php?id=<?php echo $id2; ?>&name=<?php echo $product_name; ?>&category=<?php echo $product_category; ?>"><?php echo $product_name; ?></a></h3>
                                                    <?php
                                                    if (!($discount) == null) {
                                                        echo '<h4 class="product-price">' . $discount . ' JD<del class="product-old-price">' . $product_price . ' JD</del></h4>';
                                                    } else {
                                                        echo ' <h4 class="product-price">' . $product_price . ' JD</h4>';
                                                    }
                                                    ?>

                                                    <div class="product-rating">
                                                        <?php
                                                        for ($j = 1; $j <= round($rate, '0'); $j++) {
                                                            echo ' <i class="fa fa-star"></i>';
                                                        }

                                                        $dis = 5 - $rate;
                                                        for ($y = 1; $y <= round($dis, '1'); $y++) {
                                                            echo ' <i class="fa fa-star-o"></i>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="product-btns">
                                                        <a href="wishlist.php?id=<?php echo $id2; ?>&id1=<?php echo $id1; ?>" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></a>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <a href="cart.php?id=<?php echo $id2; ?>&id1=<?php echo $id1; ?>" class="add-to-cart-btn"><i class="fa fa-shopping-cart" style="margin-top: -10px; position: absolute;"></i> add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    <?php endwhile; ?>
                                    <?php endif;
                            } else {

                                $query = "SELECT * from product  ";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) :
                                    while ($row = mysqli_fetch_assoc($result)) :
                                        $id3 = $row['id'];
                                        $product_name = $row['product_name'];
                                        $uploaded_on = $row['uploaded_on'];
                                        $product_images = $row['product_images'];
                                        $discount = $row['discount'];
                                        $product_category = $row['product_category'];
                                        $product_price = $row['product_price'];
                                        $rate1 = $row['rate'];
                                    ?>
                                        <!-- product -->
                                        <div class="col-md-4 col-xs-6">

                                            <div class="product">
                                                <div class="product-img">
                                                    <?php
                                                    $piece = explode(",", $product_images);
                                                    echo '
                                             <img src="Main Admin PDD/paper-dashboard-master/upload/' . $piece[0] . '" alt="">
                                             ';

                                                    ?>
                                                    <div class="product-label">
                                                        <?php
                                                        if (!($discount) == null) {

                                                            $new_dis = (1 - ($discount / $product_price)) * 100;
                                                            echo '  <span class="sale">-' . round($new_dis, 0) . '%</span>';
                                                        }
                                                        ?>
                                                        <?php
                                                        $uploaded_on = date_create($uploaded_on);

                                                        date_modify($uploaded_on, "+2 days");

                                                        $uploaded_on = date_format($uploaded_on, "Y-m-d");

                                                        $expire_time = strtotime($uploaded_on);

                                                        $today_time = strtotime(date("Y-m-d"));
                                                        if ($expire_time > $today_time) {
                                                            echo ' <span class="new" >NEW</span>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category"><?php echo $product_category; ?></p>
                                                    <h3 class="product-name"><a href="single-product-product.php?id=<?php echo $id3; ?>&name=<?php echo $product_name; ?>&category=<?php echo $product_category; ?>"><?php echo $product_name; ?></a></h3>
                                                    <?php
                                                    if (!($discount) == null) {
                                                        echo '<h4 class="product-price">' . $discount . ' JD<del class="product-old-price">' . $product_price . ' JD</del></h4>';
                                                    } else {
                                                        echo ' <h4 class="product-price">' . $product_price . ' JD</h4>';
                                                    }
                                                    ?>

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
                                                        <a href="wishlist.php?id=<?php echo $id3; ?>&id1=<?php echo $id1; ?>" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></a>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <a href="cart.php?id=<?php echo $id3; ?>&id1=<?php echo $id1; ?>" class="add-to-cart-btn"><i class="fa fa-shopping-cart" style="margin-top: -10px; position: absolute;"></i> add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    <?php endwhile; ?>
                            <?php endif;
                            }

                            ?>
                        </div>
                    <?php elseif (isset($_POST['search']) && $_POST['filter'] == 0) :
                    ?>
                        <div class="row">

                            <?php
                            $categ = $_GET['filter'];

                            if (!($categ == 'All Categories')) {
                            ?>
                                <?php

                                $query = "SELECT * from product where product_category = '$categ' ";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) :
                                    while ($row = mysqli_fetch_assoc($result)) :
                                        $id4 = $row['id'];
                                        $product_name = $row['product_name'];
                                        $uploaded_on = $row['uploaded_on'];
                                        $product_images = $row['product_images'];
                                        $discount = $row['discount'];
                                        $product_category = $row['product_category'];
                                        $product_price = $row['product_price'];
                                        $rate2 = $row['rate'];
                                ?>
                                        <!-- product -->
                                        <div class="col-md-4 col-xs-6">

                                            <div class="product">
                                                <div class="product-img">
                                                    <?php
                                                    $piece = explode(",", $product_images);
                                                    echo '
                                             <img src="Main Admin PDD/paper-dashboard-master/upload/' . $piece[0] . '" alt="">
                                             ';

                                                    ?>
                                                    <div class="product-label">
                                                        <?php
                                                        if (!($discount) == null) {

                                                            $new_dis = (1 - ($discount / $product_price)) * 100;
                                                            echo '  <span class="sale">-' . round($new_dis, 0) . '%</span>';
                                                        }
                                                        ?>
                                                        <?php
                                                        $uploaded_on = date_create($uploaded_on);

                                                        date_modify($uploaded_on, "+2 days");

                                                        $uploaded_on = date_format($uploaded_on, "Y-m-d");

                                                        $expire_time = strtotime($uploaded_on);

                                                        $today_time = strtotime(date("Y-m-d"));
                                                        if ($expire_time > $today_time) {
                                                            echo ' <span class="new" >NEW</span>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category"><?php echo $product_category; ?></p>
                                                    <h3 class="product-name"><a href="single-product-product.php?id=<?php echo $id4; ?>&name=<?php echo $product_name; ?>&category=<?php echo $product_category; ?>"><?php echo $product_name; ?></a></h3>
                                                    <?php
                                                    if (!($discount) == null) {
                                                        echo '<h4 class="product-price">' . $discount . ' JD<del class="product-old-price">' . $product_price . ' JD</del></h4>';
                                                    } else {
                                                        echo ' <h4 class="product-price">' . $product_price . ' JD</h4>';
                                                    }
                                                    ?>

                                                    <div class="product-rating">
                                                        <?php
                                                        for ($j2 = 1; $j2 <= round($rate2, '0'); $j2++) {
                                                            echo ' <i class="fa fa-star"></i>';
                                                        }

                                                        $dis2 = 5 - $rate2;
                                                        for ($y2 = 1; $y2 <= round($dis2, '1'); $y2++) {
                                                            echo ' <i class="fa fa-star-o"></i>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="product-btns">
                                                        <a href="wishlist.php?id=<?php echo $id4; ?>&id1=<?php echo $id1; ?>" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></a>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <a href="cart.php?id=<?php echo $id4; ?>&id1=<?php echo $id1; ?>" class="add-to-cart-btn"><i class="fa fa-shopping-cart" style="margin-top: -10px; position: absolute;"></i> add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    <?php endwhile; ?>
                                    <?php endif;
                            } else {

                                $query = "SELECT * from product  ";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) :
                                    while ($row = mysqli_fetch_assoc($result)) :
                                        $id5 = $row['id'];
                                        $product_name = $row['product_name'];
                                        $uploaded_on = $row['uploaded_on'];
                                        $product_images = $row['product_images'];
                                        $discount = $row['discount'];
                                        $product_category = $row['product_category'];
                                        $product_price = $row['product_price'];
                                        $rate3 = $row['rate'];
                                    ?>
                                        <!-- product -->
                                        <div class="col-md-4 col-xs-6">

                                            <div class="product">
                                                <div class="product-img">
                                                    <?php
                                                    $piece = explode(",", $product_images);
                                                    echo '
                                             <img src="Main Admin PDD/paper-dashboard-master/upload/' . $piece[0] . '" alt="">
                                             ';

                                                    ?>
                                                    <div class="product-label">
                                                        <?php
                                                        if (!($discount) == null) {

                                                            $new_dis = (1 - ($discount / $product_price)) * 100;
                                                            echo '  <span class="sale">-' . round($new_dis, 0) . '%</span>';
                                                        }
                                                        ?>
                                                        <?php
                                                        $uploaded_on = date_create($uploaded_on);

                                                        date_modify($uploaded_on, "+2 days");

                                                        $uploaded_on = date_format($uploaded_on, "Y-m-d");

                                                        $expire_time = strtotime($uploaded_on);

                                                        $today_time = strtotime(date("Y-m-d"));
                                                        if ($expire_time > $today_time) {
                                                            echo ' <span class="new" >NEW</span>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category"><?php echo $product_category; ?></p>
                                                    <h3 class="product-name"><a href="single-product-product.php?id=<?php echo $id5; ?>&name=<?php echo $product_name; ?>&category=<?php echo $product_category; ?>"><?php echo $product_name; ?></a></h3>
                                                    <?php
                                                    if (!($discount) == null) {
                                                        echo '<h4 class="product-price">' . $discount . ' JD<del class="product-old-price">' . $product_price . ' JD</del></h4>';
                                                    } else {
                                                        echo ' <h4 class="product-price">' . $product_price . ' JD</h4>';
                                                    }
                                                    ?>

                                                    <div class="product-rating">
                                                        <?php
                                                        for ($j3 = 1; $j3 <= round($rate3, '0'); $j3++) {
                                                            echo ' <i class="fa fa-star"></i>';
                                                        }

                                                        $dis3 = 5 - $rate3;
                                                        for ($y3 = 1; $y3 <= round($dis3, '1'); $y3++) {
                                                            echo ' <i class="fa fa-star-o"></i>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="product-btns">
                                                        <a href="wishlist.php?id=<?php echo $id5; ?>&id1=<?php echo $id1; ?>" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></a>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <a href="cart.php?id=<?php echo $id5; ?>&id1=<?php echo $id1; ?>" class="add-to-cart-btn"><i class="fa fa-shopping-cart" style="margin-top: -10px; position: absolute;"></i> add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    <?php endwhile; ?>
                            <?php endif;
                            }

                            ?>
                        </div>

                    <?php elseif (isset($_POST['search']) && $_POST['filter'] == 3) : ?>

                        <div class="row">

                            <?php
                            $categ = $_GET['filter'];

                            if (!($categ == 'All Categories')) {
                            ?>
                                <?php

                                $query = "SELECT * from product where product_category = '$categ' order by product_price ASC";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) :
                                    while ($row = mysqli_fetch_assoc($result)) :
                                        $id6 = $row['id'];
                                        $product_name = $row['product_name'];
                                        $uploaded_on = $row['uploaded_on'];
                                        $product_images = $row['product_images'];
                                        $discount = $row['discount'];
                                        $product_category = $row['product_category'];
                                        $product_price = $row['product_price'];
                                        $rate4 = $row['rate'];
                                ?>
                                        <!-- product -->
                                        <div class="col-md-4 col-xs-6">

                                            <div class="product">
                                                <div class="product-img">
                                                    <?php
                                                    $piece = explode(",", $product_images);
                                                    echo '
                                             <img src="Main Admin PDD/paper-dashboard-master/upload/' . $piece[0] . '" alt="">
                                             ';

                                                    ?>
                                                    <div class="product-label">
                                                        <?php
                                                        if (!($discount) == null) {

                                                            $new_dis = (1 - ($discount / $product_price)) * 100;
                                                            echo '  <span class="sale">-' . round($new_dis, 0) . '%</span>';
                                                        }
                                                        ?>
                                                        <?php
                                                        $uploaded_on = date_create($uploaded_on);

                                                        date_modify($uploaded_on, "+2 days");

                                                        $uploaded_on = date_format($uploaded_on, "Y-m-d");

                                                        $expire_time = strtotime($uploaded_on);

                                                        $today_time = strtotime(date("Y-m-d"));
                                                        if ($expire_time > $today_time) {
                                                            echo ' <span class="new" >NEW</span>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category"><?php echo $product_category; ?></p>
                                                    <h3 class="product-name"><a href="single-product-product.php?id=<?php echo $id6; ?>&name=<?php echo $product_name; ?>&category=<?php echo $product_category; ?>"><?php echo $product_name; ?></a></h3>
                                                    <?php
                                                    if (!($discount) == null) {
                                                        echo '<h4 class="product-price">' . $discount . ' JD<del class="product-old-price">' . $product_price . ' JD</del></h4>';
                                                    } else {
                                                        echo ' <h4 class="product-price">' . $product_price . ' JD</h4>';
                                                    }
                                                    ?>

                                                    <div class="product-rating">
                                                        <?php
                                                        for ($j4 = 1; $j4 <= round($rate4, '0'); $j4++) {
                                                            echo ' <i class="fa fa-star"></i>';
                                                        }

                                                        $dis4 = 5 - $rate4;
                                                        for ($y4 = 1; $y4 <= round($dis4, '1'); $y4++) {
                                                            echo ' <i class="fa fa-star-o"></i>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="product-btns">
                                                        <a href="wishlist.php?id=<?php echo $id6; ?>&id1=<?php echo $id1; ?>" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></a>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <a href="cart.php?id=<?php echo $id6; ?>&id1=<?php echo $id1; ?>" class="add-to-cart-btn"><i class="fa fa-shopping-cart" style="margin-top: -10px; position: absolute;"></i> add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    <?php endwhile; ?>
                                    <?php endif;
                            } else {

                                $query = "SELECT * from product  order by product_price ASC";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) :
                                    while ($row = mysqli_fetch_assoc($result)) :
                                        $id7 = $row['id'];
                                        $product_name = $row['product_name'];
                                        $uploaded_on = $row['uploaded_on'];
                                        $product_images = $row['product_images'];
                                        $discount = $row['discount'];
                                        $product_category = $row['product_category'];
                                        $product_price = $row['product_price'];
                                        $rate5 = $row['rate'];
                                    ?>
                                        <!-- product -->
                                        <div class="col-md-4 col-xs-6">

                                            <div class="product">
                                                <div class="product-img">
                                                    <?php
                                                    $piece = explode(",", $product_images);
                                                    echo '
                                             <img src="Main Admin PDD/paper-dashboard-master/upload/' . $piece[0] . '" alt="">
                                             ';

                                                    ?>
                                                    <div class="product-label">
                                                        <?php
                                                        if (!($discount) == null) {

                                                            $new_dis = (1 - ($discount / $product_price)) * 100;
                                                            echo '  <span class="sale">-' . round($new_dis, 0) . '%</span>';
                                                        }
                                                        ?>
                                                        <?php
                                                        $uploaded_on = date_create($uploaded_on);

                                                        date_modify($uploaded_on, "+2 days");

                                                        $uploaded_on = date_format($uploaded_on, "Y-m-d");

                                                        $expire_time = strtotime($uploaded_on);

                                                        $today_time = strtotime(date("Y-m-d"));
                                                        if ($expire_time > $today_time) {
                                                            echo ' <span class="new" >NEW</span>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category"><?php echo $product_category; ?></p>
                                                    <h3 class="product-name"><a href="single-product-product.php?id=<?php echo $id7; ?>&name=<?php echo $product_name; ?>&category=<?php echo $product_category; ?>"><?php echo $product_name; ?></a></h3>
                                                    <?php
                                                    if (!($discount) == null) {
                                                        echo '<h4 class="product-price">' . $discount . ' JD<del class="product-old-price">' . $product_price . ' JD</del></h4>';
                                                    } else {
                                                        echo ' <h4 class="product-price">' . $product_price . ' JD</h4>';
                                                    }
                                                    ?>

                                                    <div class="product-rating">
                                                        <?php
                                                        for ($j5 = 1; $j5 <= round($rate5, '0'); $j5++) {
                                                            echo ' <i class="fa fa-star"></i>';
                                                        }

                                                        $dis5 = 5 - $rate5;
                                                        for ($y5 = 1; $y5 <= round($dis5, '1'); $y5++) {
                                                            echo ' <i class="fa fa-star-o"></i>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="product-btns">
                                                        <a href="wishlist.php?id=<?php echo $id7; ?>&id1=<?php echo $id1; ?>" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></a>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <a href="cart.php?id=<?php echo $id7; ?>&id1=<?php echo $id1; ?>" class="add-to-cart-btn"><i class="fa fa-shopping-cart" style="margin-top: -10px; position: absolute;"></i> add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    <?php endwhile; ?>
                            <?php endif;
                            }

                            ?>
                        </div>

                    <?php elseif (isset($_POST['search']) && $_POST['filter'] == 4) : ?>

                        <div class="row">

                            <?php
                            $categ = $_GET['filter'];

                            if (!($categ == 'All Categories')) {
                            ?>
                                <?php

                                $query = "SELECT * from product where product_category = '$categ' order by product_price DESC";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) :
                                    while ($row = mysqli_fetch_assoc($result)) :
                                        $id8 = $row['id'];
                                        $product_name = $row['product_name'];
                                        $uploaded_on = $row['uploaded_on'];
                                        $product_images = $row['product_images'];
                                        $discount = $row['discount'];
                                        $product_category = $row['product_category'];
                                        $product_price = $row['product_price'];
                                        $rate6 = $row['rate'];
                                ?>
                                        <!-- product -->
                                        <div class="col-md-4 col-xs-6">

                                            <div class="product">
                                                <div class="product-img">
                                                    <?php
                                                    $piece = explode(",", $product_images);
                                                    echo '
                                             <img src="Main Admin PDD/paper-dashboard-master/upload/' . $piece[0] . '" alt="">
                                             ';

                                                    ?>
                                                    <div class="product-label">
                                                        <?php
                                                        if (!($discount) == null) {

                                                            $new_dis = (1 - ($discount / $product_price)) * 100;
                                                            echo '  <span class="sale">-' . round($new_dis, 0) . '%</span>';
                                                        }
                                                        ?>
                                                        <?php
                                                        $uploaded_on = date_create($uploaded_on);

                                                        date_modify($uploaded_on, "+2 days");

                                                        $uploaded_on = date_format($uploaded_on, "Y-m-d");

                                                        $expire_time = strtotime($uploaded_on);

                                                        $today_time = strtotime(date("Y-m-d"));
                                                        if ($expire_time > $today_time) {
                                                            echo ' <span class="new" >NEW</span>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category"><?php echo $product_category; ?></p>
                                                    <h3 class="product-name"><a href="single-product-product.php?id=<?php echo $id8; ?>&name=<?php echo $product_name; ?>&category=<?php echo $product_category; ?>"><?php echo $product_name; ?></a></h3>
                                                    <?php
                                                    if (!($discount) == null) {
                                                        echo '<h4 class="product-price">' . $discount . ' JD<del class="product-old-price">' . $product_price . ' JD</del></h4>';
                                                    } else {
                                                        echo ' <h4 class="product-price">' . $product_price . ' JD</h4>';
                                                    }
                                                    ?>

                                                    <div class="product-rating">
                                                        <?php
                                                        for ($j6 = 1; $j6 <= round($rate6, '0'); $j6++) {
                                                            echo ' <i class="fa fa-star"></i>';
                                                        }

                                                        $dis6 = 5 - $rate6;
                                                        for ($y6 = 1; $y6 <= round($dis6, '1'); $y6++) {
                                                            echo ' <i class="fa fa-star-o"></i>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="product-btns">
                                                        <a href="wishlist.php?id=<?php echo $id8; ?>&id1=<?php echo $id1; ?>" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></a>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <a href="cart.php?id=<?php echo $id8; ?>&id1=<?php echo $id1; ?>" class="add-to-cart-btn"><i class="fa fa-shopping-cart" style="margin-top: -10px; position: absolute;"></i> add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    <?php endwhile; ?>
                                    <?php endif;
                            } else {

                                $query = "SELECT * from product  order by product_price DESC";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) :
                                    while ($row = mysqli_fetch_assoc($result)) :
                                        $id9 = $row['id'];
                                        $product_name = $row['product_name'];
                                        $uploaded_on = $row['uploaded_on'];
                                        $product_images = $row['product_images'];
                                        $discount = $row['discount'];
                                        $product_category = $row['product_category'];
                                        $product_price = $row['product_price'];
                                        $rate7 = $row['rate'];
                                    ?>
                                        <!-- product -->
                                        <div class="col-md-4 col-xs-6">

                                            <div class="product">
                                                <div class="product-img">
                                                    <?php
                                                    $piece = explode(",", $product_images);
                                                    echo '
                                             <img src="Main Admin PDD/paper-dashboard-master/upload/' . $piece[0] . '" alt="">
                                             ';

                                                    ?>
                                                    <div class="product-label">
                                                        <?php
                                                        if (!($discount) == null) {

                                                            $new_dis = (1 - ($discount / $product_price)) * 100;
                                                            echo '  <span class="sale">-' . round($new_dis, 0) . '%</span>';
                                                        }
                                                        ?>
                                                        <?php
                                                        $uploaded_on = date_create($uploaded_on);

                                                        date_modify($uploaded_on, "+2 days");

                                                        $uploaded_on = date_format($uploaded_on, "Y-m-d");

                                                        $expire_time = strtotime($uploaded_on);

                                                        $today_time = strtotime(date("Y-m-d"));
                                                        if ($expire_time > $today_time) {
                                                            echo ' <span class="new" >NEW</span>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category"><?php echo $product_category; ?></p>
                                                    <h3 class="product-name"><a href="single-product-product.php?id=<?php echo $id9; ?>&name=<?php echo $product_name; ?>&category=<?php echo $product_category; ?>"><?php echo $product_name; ?></a></h3>
                                                    <?php
                                                    if (!($discount) == null) {
                                                        echo '<h4 class="product-price">' . $discount . ' JD<del class="product-old-price">' . $product_price . ' JD</del></h4>';
                                                    } else {
                                                        echo ' <h4 class="product-price">' . $product_price . ' JD</h4>';
                                                    }
                                                    ?>

                                                    <div class="product-rating">
                                                        <?php
                                                        for ($j7 = 1; $j7 <= round($rate7, '0'); $j7++) {
                                                            echo ' <i class="fa fa-star"></i>';
                                                        }

                                                        $dis7 = 5 - $rate7;
                                                        for ($y7 = 1; $y7 <= round($dis7, '1'); $y7++) {
                                                            echo ' <i class="fa fa-star-o"></i>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="product-btns">
                                                        <a href="wishlist.php?id=<?php echo $id9; ?>&id1=<?php echo $id1; ?>" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></a>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <a href="cart.php?id=<?php echo $id9; ?>&id1=<?php echo $id1; ?>" class="add-to-cart-btn"><i class="fa fa-shopping-cart" style="margin-top: -10px; position: absolute;"></i> add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    <?php endwhile; ?>
                            <?php endif;
                            }

                            ?>
                        </div>



                    <?php elseif (isset($_POST['search']) && $_POST['filter'] == 1) : ?>

                        <div class="row">

                            <?php
                            $categ = $_GET['filter'];

                            if (!($categ == 'All Categories')) {
                            ?>
                                <?php

                                $query = "SELECT * from product where product_category = '$categ' order by rate ASC";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) :
                                    while ($row = mysqli_fetch_assoc($result)) :
                                        $id10 = $row['id'];
                                        $product_name = $row['product_name'];
                                        $uploaded_on = $row['uploaded_on'];
                                        $product_images = $row['product_images'];
                                        $discount = $row['discount'];
                                        $product_category = $row['product_category'];
                                        $product_price = $row['product_price'];
                                        $rate6 = $row['rate'];
                                ?>
                                        <!-- product -->
                                        <div class="col-md-4 col-xs-6">

                                            <div class="product">
                                                <div class="product-img">
                                                    <?php
                                                    $piece = explode(",", $product_images);
                                                    echo '
                                             <img src="Main Admin PDD/paper-dashboard-master/upload/' . $piece[0] . '" alt="">
                                             ';

                                                    ?>
                                                    <div class="product-label">
                                                        <?php
                                                        if (!($discount) == null) {

                                                            $new_dis = (1 - ($discount / $product_price)) * 100;
                                                            echo '  <span class="sale">-' . round($new_dis, 0) . '%</span>';
                                                        }
                                                        ?>
                                                        <?php
                                                        $uploaded_on = date_create($uploaded_on);

                                                        date_modify($uploaded_on, "+2 days");

                                                        $uploaded_on = date_format($uploaded_on, "Y-m-d");

                                                        $expire_time = strtotime($uploaded_on);

                                                        $today_time = strtotime(date("Y-m-d"));
                                                        if ($expire_time > $today_time) {
                                                            echo ' <span class="new" >NEW</span>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category"><?php echo $product_category; ?></p>
                                                    <h3 class="product-name"><a href="single-product-product.php?id=<?php echo $id10; ?>&name=<?php echo $product_name; ?>&category=<?php echo $product_category; ?>"><?php echo $product_name; ?></a></h3>
                                                    <?php
                                                    if (!($discount) == null) {
                                                        echo '<h4 class="product-price">' . $discount . ' JD<del class="product-old-price">' . $product_price . ' JD</del></h4>';
                                                    } else {
                                                        echo ' <h4 class="product-price">' . $product_price . ' JD</h4>';
                                                    }
                                                    ?>

                                                    <div class="product-rating">
                                                        <?php
                                                        for ($j6 = 1; $j6 <= round($rate6, '0'); $j6++) {
                                                            echo ' <i class="fa fa-star"></i>';
                                                        }

                                                        $dis6 = 5 - $rate6;
                                                        for ($y6 = 1; $y6 <= round($dis6, '1'); $y6++) {
                                                            echo ' <i class="fa fa-star-o"></i>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="product-btns">
                                                        <a href="wishlist.php?id=<?php echo $id10; ?>&id1=<?php echo $id1; ?>" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></a>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <a href="cart.php?id=<?php echo $id10; ?>&id1=<?php echo $id1; ?>" class="add-to-cart-btn"><i class="fa fa-shopping-cart" style="margin-top: -10px; position: absolute;"></i> add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    <?php endwhile; ?>
                                    <?php endif;
                            } else {

                                $query = "SELECT * from product  order by rate ASC";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) :
                                    while ($row = mysqli_fetch_assoc($result)) :
                                        $id11 = $row['id'];
                                        $product_name = $row['product_name'];
                                        $uploaded_on = $row['uploaded_on'];
                                        $product_images = $row['product_images'];
                                        $discount = $row['discount'];
                                        $product_category = $row['product_category'];
                                        $product_price = $row['product_price'];
                                        $rate7 = $row['rate'];
                                    ?>
                                        <!-- product -->
                                        <div class="col-md-4 col-xs-6">

                                            <div class="product">
                                                <div class="product-img">
                                                    <?php
                                                    $piece = explode(",", $product_images);
                                                    echo '
                                             <img src="Main Admin PDD/paper-dashboard-master/upload/' . $piece[0] . '" alt="">
                                             ';

                                                    ?>
                                                    <div class="product-label">
                                                        <?php
                                                        if (!($discount) == null) {

                                                            $new_dis = (1 - ($discount / $product_price)) * 100;
                                                            echo '  <span class="sale">-' . round($new_dis, 0) . '%</span>';
                                                        }
                                                        ?>
                                                        <?php
                                                        $uploaded_on = date_create($uploaded_on);

                                                        date_modify($uploaded_on, "+2 days");

                                                        $uploaded_on = date_format($uploaded_on, "Y-m-d");

                                                        $expire_time = strtotime($uploaded_on);

                                                        $today_time = strtotime(date("Y-m-d"));
                                                        if ($expire_time > $today_time) {
                                                            echo ' <span class="new" >NEW</span>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category"><?php echo $product_category; ?></p>
                                                    <h3 class="product-name"><a href="single-product-product.php?id=<?php echo $id11; ?>&name=<?php echo $product_name; ?>&category=<?php echo $product_category; ?>"><?php echo $product_name; ?></a></h3>
                                                    <?php
                                                    if (!($discount) == null) {
                                                        echo '<h4 class="product-price">' . $discount . ' JD<del class="product-old-price">' . $product_price . ' JD</del></h4>';
                                                    } else {
                                                        echo ' <h4 class="product-price">' . $product_price . ' JD</h4>';
                                                    }
                                                    ?>

                                                    <div class="product-rating">
                                                        <?php
                                                        for ($j7 = 1; $j7 <= round($rate7, '0'); $j7++) {
                                                            echo ' <i class="fa fa-star"></i>';
                                                        }

                                                        $dis7 = 5 - $rate7;
                                                        for ($y7 = 1; $y7 <= round($dis7, '1'); $y7++) {
                                                            echo ' <i class="fa fa-star-o"></i>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="product-btns">
                                                        <a href="wishlist.php?id=<?php echo $id11; ?>&id1=<?php echo $id1; ?>" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></a>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <a href="cart.php?id=<?php echo $id11; ?>&id1=<?php echo $id1; ?>" class="add-to-cart-btn"><i class="fa fa-shopping-cart" style="margin-top: -10px; position: absolute;"></i> add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    <?php endwhile; ?>
                            <?php endif;
                            }

                            ?>
                        </div>



                    <?php elseif (isset($_POST['search']) && $_POST['filter'] == 2) : ?>

                        <div class="row">

                            <?php
                            $categ = $_GET['filter'];

                            if (!($categ == 'All Categories')) {
                            ?>
                                <?php

                                $query = "SELECT * from product where product_category = '$categ' order by rate DESC";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) :
                                    while ($row = mysqli_fetch_assoc($result)) :
                                        $id12 = $row['id'];
                                        $product_name = $row['product_name'];
                                        $uploaded_on = $row['uploaded_on'];
                                        $product_images = $row['product_images'];
                                        $discount = $row['discount'];
                                        $product_category = $row['product_category'];
                                        $product_price = $row['product_price'];
                                        $rate9 = $row['rate'];
                                ?>
                                        <!-- product -->
                                        <div class="col-md-4 col-xs-6">

                                            <div class="product">
                                                <div class="product-img">
                                                    <?php
                                                    $piece = explode(",", $product_images);
                                                    echo '
                                             <img src="Main Admin PDD/paper-dashboard-master/upload/' . $piece[0] . '" alt="">
                                             ';

                                                    ?>
                                                    <div class="product-label">
                                                        <?php
                                                        if (!($discount) == null) {

                                                            $new_dis = (1 - ($discount / $product_price)) * 100;
                                                            echo '  <span class="sale">-' . round($new_dis, 0) . '%</span>';
                                                        }
                                                        ?>
                                                        <?php
                                                        $uploaded_on = date_create($uploaded_on);

                                                        date_modify($uploaded_on, "+2 days");

                                                        $uploaded_on = date_format($uploaded_on, "Y-m-d");

                                                        $expire_time = strtotime($uploaded_on);

                                                        $today_time = strtotime(date("Y-m-d"));
                                                        if ($expire_time > $today_time) {
                                                            echo ' <span class="new" >NEW</span>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category"><?php echo $product_category; ?></p>
                                                    <h3 class="product-name"><a href="single-product-product.php?id=<?php echo $id12; ?>&name=<?php echo $product_name; ?>&category=<?php echo $product_category; ?>"><?php echo $product_name; ?></a></h3>
                                                    <?php
                                                    if (!($discount) == null) {
                                                        echo '<h4 class="product-price">' . $discount . ' JD<del class="product-old-price">' . $product_price . ' JD</del></h4>';
                                                    } else {
                                                        echo ' <h4 class="product-price">' . $product_price . ' JD</h4>';
                                                    }
                                                    ?>

                                                    <div class="product-rating">
                                                        <?php
                                                        for ($j9 = 1; $j9 <= round($rate9, '0'); $j9++) {
                                                            echo ' <i class="fa fa-star"></i>';
                                                        }

                                                        $dis9 = 5 - $rate9;
                                                        for ($y9 = 1; $y9 <= round($dis9, '1'); $y9++) {
                                                            echo ' <i class="fa fa-star-o"></i>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="product-btns">
                                                        <a href="wishlist.php?id=<?php echo $id12; ?>&id1=<?php echo $id1; ?>" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></a>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <a href="cart.php?id=<?php echo $id12; ?>&id1=<?php echo $id1; ?>" class="add-to-cart-btn"><i class="fa fa-shopping-cart" style="margin-top: -10px; position: absolute;"></i> add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    <?php endwhile; ?>
                                    <?php endif;
                            } else {

                                $query = "SELECT * from product  order by rate DESC";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) :
                                    while ($row = mysqli_fetch_assoc($result)) :
                                        $id13 = $row['id'];
                                        $product_name = $row['product_name'];
                                        $uploaded_on = $row['uploaded_on'];
                                        $product_images = $row['product_images'];
                                        $discount = $row['discount'];
                                        $product_category = $row['product_category'];
                                        $product_price = $row['product_price'];
                                        $rate7 = $row['rate'];
                                    ?>
                                        <!-- product -->
                                        <div class="col-md-4 col-xs-6">

                                            <div class="product">
                                                <div class="product-img">
                                                    <?php
                                                    $piece = explode(",", $product_images);
                                                    echo '
                                             <img src="Main Admin PDD/paper-dashboard-master/upload/' . $piece[0] . '" alt="">
                                             ';

                                                    ?>
                                                    <div class="product-label">
                                                        <?php
                                                        if (!($discount) == null) {

                                                            $new_dis = (1 - ($discount / $product_price)) * 100;
                                                            echo '  <span class="sale">-' . round($new_dis, 0) . '%</span>';
                                                        }
                                                        ?>
                                                        <?php
                                                        $uploaded_on = date_create($uploaded_on);

                                                        date_modify($uploaded_on, "+2 days");

                                                        $uploaded_on = date_format($uploaded_on, "Y-m-d");

                                                        $expire_time = strtotime($uploaded_on);

                                                        $today_time = strtotime(date("Y-m-d"));
                                                        if ($expire_time > $today_time) {
                                                            echo ' <span class="new" >NEW</span>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category"><?php echo $product_category; ?></p>
                                                    <h3 class="product-name"><a href="single-product-product.php?id=<?php echo $id13; ?>&name=<?php echo $product_name; ?>&category=<?php echo $product_category; ?>"><?php echo $product_name; ?></a></h3>
                                                    <?php
                                                    if (!($discount) == null) {
                                                        echo '<h4 class="product-price">' . $discount . ' JD<del class="product-old-price">' . $product_price . ' JD</del></h4>';
                                                    } else {
                                                        echo ' <h4 class="product-price">' . $product_price . ' JD</h4>';
                                                    }
                                                    ?>

                                                    <div class="product-rating">
                                                        <?php
                                                        for ($j7 = 1; $j7 <= round($rate7, '0'); $j7++) {
                                                            echo ' <i class="fa fa-star"></i>';
                                                        }

                                                        $dis7 = 5 - $rate7;
                                                        for ($y7 = 1; $y7 <= round($dis7, '1'); $y7++) {
                                                            echo ' <i class="fa fa-star-o"></i>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="product-btns">
                                                        <a href="wishlist.php?id=<?php echo $id13; ?>&id1=<?php echo $id1; ?>" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></a>
                                                    </div>
                                                </div>
                                                <div class="add-to-cart">
                                                    <a href="cart.php?id=<?php echo $id13; ?>&id1=<?php echo $id1; ?>" class="add-to-cart-btn"><i class="fa fa-shopping-cart" style="margin-top: -10px; position: absolute;"></i> add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    <?php endwhile; ?>
                            <?php endif;
                            }

                            ?>
                        </div>

                    <?php endif; ?>
                    <!-- /store products -->

                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->



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