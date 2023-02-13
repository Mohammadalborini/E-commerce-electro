<?php

session_start();

if (!isset($_SESSION['id1'])) {
    $_SESSION['id1'] = null;
} else {
    $id1 = $_SESSION['id1'];
}


include("Main Admin PDD/paper-dashboard-master/examples/db_config.php");
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
                                        echo '<script> window.location.href = "index1.php"; </script>';
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
                    <li class="active"><a href="index1.php">Home</a></li>
                    <li><a href="Hot-deals.php">Hot Deals</a></li>
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
                    <h3 class="breadcrumb-header">Checkout</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="index1.php">Home</a></li>
                        <li class="active">Checkout</li>
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
            <form method="POST">

                <div class="row">

                    <div class="col-md-7">
                        <!-- Billing Details -->
                        <?php
                        $query = "SELECT * from users where id = '$id1' ";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row3 = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class="billing-details">
                                    <div class="section-title">
                                        <h3 class="title">Billing address</h3>
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="first-name" value="<?php echo $row3['first_name']; ?>" placeholder="First Name" require>
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="last-name" value="<?php echo $row3['last_name']; ?>" placeholder="Last Name" require>
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="email" name="email" value="<?php echo $row3['email']; ?>" placeholder="Email" require>
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="city" value="<?php echo $row3['city']; ?>" placeholder="City" require>
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="area" value="<?php echo $row3['area']; ?>" placeholder="Area" require>
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="tel" name="phone" value="<?php echo $row3['phone']; ?>" placeholder="Telephone" require>
                                    </div>
                                </div>
                        <?php }
                        } ?>

                        <!-- /Billing Details -->

                        <!-- Order notes -->
                        <div class="order-notes">
                            <textarea class="input" name="note" placeholder="Order Notes"></textarea>
                        </div>
                        <!-- /Order notes -->
                    </div>

                    <!-- Order Details -->
                    <div class="col-md-5 order-details">
                        <div class="section-title text-center">
                            <h3 class="title">Your Order</h3>
                        </div>
                        <div class="order-summary">
                            <?php
                            if (isset($_GET['id1']) && isset($_GET['id'])) {

                                $id1 = $_GET['id1'];
                                $id = $_GET['id'];
                            ?>
                                <div class="order-col">
                                    <div><strong>PRODUCT</strong></div>
                                    <div style="position: absolute;"><strong>PRICE</strong></div>
                                    <div><strong>TOTAL</strong></div>
                                </div>
                                <div class="order-products">
                                    <?php

                                    $query2 = "SELECT * from cart where id_user = '$id1' and id = '$id' ";
                                    $result2 = mysqli_query($conn, $query2);
                                    if (mysqli_num_rows($result2) > 0) {
                                        while ($row10 = mysqli_fetch_assoc($result2)) {
                                            $product_name = $row10['product_name'];
                                            $qty = $row10['qty'];
                                            $product_price1 = $row10['product_price'];

                                            $new_price = $product_price1 / $qty;
                                    ?>
                                            <div class="order-col">
                                                <div><?php echo $qty . 'x ' . $product_name; ?></div>
                                                <div style="position: absolute;"><?php echo $new_price; ?> JD </div>
                                                <div><?php echo $product_price1; ?> JD</div>
                                            </div>
                                    <?php
                                        }
                                    }

                                    ?>
                                </div>
                                <div class="order-col">
                                    <div>Shiping</div>
                                    <div><strong>FREE</strong></div>
                                </div>
                                <div class="order-col">
                                    <div><strong>TOTAL</strong></div>
                                    <div><strong class="order-total"><?php echo $product_price1; ?> JD</strong></div>
                                </div>
                        </div>
                    <?php
                            } else {
                    ?>
                        <div class="order-col">
                            <div><strong>PRODUCT</strong></div>
                            <div style="position: absolute;"><strong>PRICE</strong></div>
                            <div><strong>TOTAL</strong></div>
                        </div>
                        <div class="order-products">
                            <?php

                                $query2 = "SELECT * from cart where id_user = '$id1'";
                                $result2 = mysqli_query($conn, $query2);
                                if (mysqli_num_rows($result2) > 0) {
                                    while ($row1 = mysqli_fetch_assoc($result2)) {
                                        $product_name = $row1['product_name'];
                                        $qty = $row1['qty'];
                                        $product_price = $row1['product_price'];

                                        $new_price = $product_price / $qty;

                            ?>
                                    <div class="order-col">

                                        <div><?php echo $qty . 'x ' . $product_name; ?></div>
                                        <div style="position: absolute;"><?php echo $new_price; ?> JD </div>
                                        <div><?php echo $product_price; ?> JD</div>

                                    </div>
                            <?php
                                    }
                                } else {
                                    echo '   <h3 class="title">There is no any product in cart</h3>';
                                }

                            ?>
                        </div>
                        <div class="order-col">
                            <div>Shiping</div>
                            <div><strong>FREE</strong></div>
                        </div>
                        <div class="order-col">
                            <?php
                                $query3 = "SELECT sum(product_price) as total from cart where id_user = '$id1'";
                                $result3 = mysqli_query($conn, $query3);
                                while ($row3 = mysqli_fetch_assoc($result3)) {
                                    $total = $row3['total'];
                                }
                            ?>
                            <div><strong>TOTAL</strong></div>
                            <div><strong class="order-total"><?php echo $total; ?> JD</strong></div>
                        </div>
                    </div>
                <?php } ?>
                <div class="payment-method">
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-1" required>
                        <label for="payment-1">
                            <span></span>
                            Cash on dilvery
                        </label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-2" required>
                        <label for="payment-2">
                            <span></span>
                            Direct Bank Transfer
                        </label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-3" required>
                        <label for="payment-3">
                            <span></span>
                            Cheque Payment
                        </label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="input-radio">
                        <input type="radio" name="payment" id="payment-4" required>
                        <label for="payment-4">
                            <span></span>
                            Paypal System
                        </label>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
                <div class="input-checkbox">
                    <input type="checkbox" id="terms">
                    <label for="terms">
                        <span></span>
                        I've read and accept the <a href="#">terms & conditions</a>
                    </label>
                </div>
                <button type="submit" name="order" id="sendNewSms" disabled="disabled" class="primary-btn order-submit">Place order</button>
                </div>
                <!-- /Order Details -->
        </div>
        </form>
        <!-- /row -->

        <?php
        if (isset($_POST['order'])) {

            $first_name = $_POST['first-name'];
            $phone = $_POST['phone'];
            $city = $_POST['city'];
            $area = $_POST['area'];
            $note = $_POST['note'];



            $id_user = $id1;

            if (isset($_GET['id1']) && isset($_GET['id']) && isset($_GET['point'])) {

                $id1 = $_GET['id1'];
                $id = $_GET['id'];
                $order_id = rand(10000, 99999);

                $query2 = "SELECT * from cart where id_user = '$id1' and id = '$id' and point='1' ";
                $result2 = mysqli_query($conn, $query2);
                if (mysqli_num_rows($result2) > 0) {
                    while ($row1 = mysqli_fetch_assoc($result2)) {
                        $id2 = $row1['id'];
                        $id_product20 = $row1['id_product'];
                        $product_name = $row1['product_name'];
                        $qty = $row1['qty'];
                        $product_price = $row1['product_price'];
                        $product_images = $row1['product_images'];
                        $product_category = $row1['product_category'];
                        $product_colors = $row1['product_colors'];

                        $query3 = "INSERT INTO `orders`(`id_user`, `id_product`, `user_name`, `phone`, `product_name`, `product_image`, `product_category`, `color`, `total`, `qty`, `note`, `city`, `area`, `order_id`) VALUES
                     ('$id1','$id_product20','$first_name','$phone','$product_name','$product_images','$product_category','$product_colors','$product_price','$qty','$note','$city','$area','$order_id')";
                        mysqli_query($conn, $query3);

                        $query5 = "DELETE FROM `cart` where id_user = '$id1' and id = '$id2' and point='1' ";
                        mysqli_query($conn, $query5);


                        $query6 = "SELECT * from hot_deales where id = '$id_product20' ";
                        $result6 = mysqli_query($conn, $query6);
                        if (mysqli_num_rows($result6) > 0) {
                            while ($row3 = mysqli_fetch_assoc($result6)) {
                                $quantity_of_devices1 = $row3['quantity_of_devices'];
                                $numer_seller1 = $row3['numer_seller'];

                                $new_qty2 = $quantity_of_devices1 - $qty;

                                $new_numer_seller2 = $numer_seller1 + $qty;

                                $query20 = "UPDATE `hot_deales` SET `numer_seller`='$new_numer_seller2',`quantity_of_devices`='$new_qty2' WHERE id = '$id_product20' ";
                                $result20 = mysqli_query($conn, $query20);
                            }
                        }
                        echo '<script> alert ("Order has been add"); </script>';
                        echo '<script> window.location.href = "orders.php?add=add"; </script>';
                    }
                }
            } elseif (isset($_GET['id1']) && isset($_GET['id'])) {

                $id1 = $_GET['id1'];
                $id = $_GET['id'];
                $order_id = rand(10000, 99999);

                $query2 = "SELECT * from cart where id_user = '$id1' and id = '$id' ";
                $result2 = mysqli_query($conn, $query2);
                if (mysqli_num_rows($result2) > 0) {
                    while ($row1 = mysqli_fetch_assoc($result2)) {
                        $id2 = $row1['id'];
                        $id_product2 = $row1['id_product'];
                        $product_name = $row1['product_name'];
                        $qty = $row1['qty'];
                        $product_price = $row1['product_price'];
                        $id_product = $row1['id_product'];
                        $product_images = $row1['product_images'];
                        $product_category = $row1['product_category'];
                        $product_colors = $row1['product_colors'];

                        $query3 = "INSERT INTO `orders`(`id_user`, `id_product`, `user_name`, `phone`, `product_name`, `product_image`, `product_category`, `color`, `total`, `qty`, `note`, `city`, `area`, `order_id`) VALUES
                     ('$id1','$id_product','$first_name','$phone','$product_name','$product_images','$product_category','$product_colors','$product_price','$qty','$note','$city','$area','$order_id')";
                        mysqli_query($conn, $query3);

                        $query5 = "DELETE FROM `cart` where id_user = '$id1' and id = '$id2' ";
                        mysqli_query($conn, $query5);


                        $query6 = "SELECT * from product where id = '$id_product2' ";
                        $result6 = mysqli_query($conn, $query6);
                        if (mysqli_num_rows($result6) > 0) {
                            while ($row3 = mysqli_fetch_assoc($result6)) {
                                $quantity_of_devices = $row3['quantity_of_devices'];
                                $numer_seller = $row3['numer_seller'];

                                $new_qty = $quantity_of_devices - $qty;

                                $new_numer_seller = $numer_seller + $qty;

                                $query20 = "UPDATE `product` SET `numer_seller`='$new_numer_seller',`quantity_of_devices`='$new_qty' WHERE id = '$id_product2' ";
                                $result20 = mysqli_query($conn, $query20);
                            }
                        }


                        echo '<script> alert ("Order has been add"); </script>';
                        echo '<script> window.location.href = "orders.php?add=add"; </script>';
                    }
                }
            } else {

                $query2 = "SELECT * from cart where id_user = '$id1' ";
                $result2 = mysqli_query($conn, $query2);
                if (mysqli_num_rows($result2) > 0) {
                    while ($row1 = mysqli_fetch_assoc($result2)) {
                        $id2 = $row1['id'];
                        $id_product2 = $row1['id_product'];
                        $product_name = $row1['product_name'];
                        $qty = $row1['qty'];
                        $product_price = $row1['product_price'];
                        $product_images = $row1['product_images'];
                        $product_category = $row1['product_category'];
                        $product_colors = $row1['product_colors'];
                        $point = $row1['point'];
                        $order_id = rand(10000, 99999);

                        $query3 = "INSERT INTO `orders`(`id_user`, `id_product`, `user_name`, `phone`, `product_name`, `product_image`, `product_category`, `color`, `total`, `qty`, `note`, `city`, `area`, `order_id`) VALUES
                     ('$id1','$id_product2','$first_name','$phone','$product_name','$product_images','$product_category','$product_colors','$product_price','$qty','$note','$city','$area','$order_id')";
                        mysqli_query($conn, $query3);

                        $query5 = "DELETE FROM `cart` where id_user = '$id1' and id = '$id2' ";
                        mysqli_query($conn, $query5);


                        if ($point == 0){
                            $query6 = "SELECT * from product where id = '$id_product2' ";
                            $result6 = mysqli_query($conn, $query6);
                            if (mysqli_num_rows($result6) > 0) {
                                while ($row3 = mysqli_fetch_assoc($result6)) {
                                    $quantity_of_devices = $row3['quantity_of_devices'];
                                    $numer_seller = $row3['numer_seller'];

                                    $new_qty = $quantity_of_devices - $qty;

                                    $new_numer_seller = $numer_seller + $qty;

                                    $query20 = "UPDATE `product` SET `numer_seller`='$new_numer_seller',`quantity_of_devices`='$new_qty' WHERE id = '$id_product2' ";
                                    $result20 = mysqli_query($conn, $query20);
                                }
                            }

                        }else {
                            $query60 = "SELECT * from hot_deales where id = '$id_product2' ";
                            $result60 = mysqli_query($conn, $query60);
                            if (mysqli_num_rows($result60) > 0) {
                                while ($row30 = mysqli_fetch_assoc($result60)) {
                                    $quantity_of_devices = $row3['quantity_of_devices'];
                                    $numer_seller = $row30['numer_seller'];

                                    $new_qty = $quantity_of_devices - $qty;

                                    $new_numer_seller = $numer_seller + $qty;

                                    $query20 = "UPDATE `product` SET `numer_seller`='$new_numer_seller',`quantity_of_devices`='$new_qty' WHERE id = '$id_product2' ";
                                    $result20 = mysqli_query($conn, $query20);
                                }
                            }
                        }



                    }
                    echo '<script> alert ("Order has been add"); </script>';
                    echo '<script> window.location.href = "orders.php?add=add"; </script>';
                }
            }
        }
        ?>
    </div>
    <!-- /container -->
    </div>
    <!-- /SECTION -->
    <script>
        var checker = document.getElementById('terms');
        var sendbtn = document.getElementById('sendNewSms');
        // when unchecked or checked, run the function
        checker.onchange = function() {
            if (this.checked) {
                sendbtn.disabled = false;
            } else {
                sendbtn.disabled = true;
            }

        }
    </script>
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
                                <li><p style="color: white;"><i class="fa fa-phone"></i> <?php echo $phone; ?></p></li>
                                <li><p style="color: white;"><i class="fa fa-envelope-o"></i> <?php echo $email; ?></p></li>
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