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
                </ul>
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
                                                <h3 class="product-name">Placse Login first.</h3>
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
                                        echo '<script> window.location.href = "cart.php"; </script>';
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
                    <h3 class="breadcrumb-header">Regular Page</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="index1.php">Home</a></li>
                        <li class="active">Cart</li>
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
                <?php if (isset($_GET['true'])) {
                    echo '<h3 class="title pb-25 text-center text-md-left text-capitalize">The product deleted</h3>';
                    $_GET['true'] = null;
                } else {
                    $_GET['true'] = null;
                } ?>

                <?php

                if (!isset($id1)) {
                    echo '<h3 class="title pb-25 text-center text-md-left text-capitalize">Please Login First</h3>';
                } else {

                    if (isset($_GET['id1']) && isset($_GET['id'])) {
                        $id1 = $_GET['id1'];
                        $id = $_GET['id'];

                        $query = "SELECT * from product where id = '$id' ";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $product_name = $row['product_name'];
                                $product_price = $row['product_price'];
                                $discount = $row['discount'];
                                $description2 = $row['short_description'];
                                $product_category = $row['product_category'];
                                $color = $row['product_colors'];
                                $pieces1 = $row['product_images'];
                                $piece = explode(",", $pieces1);
                                $piece2 = $piece[0];
                            }
                        }

                        $query5 = "SELECT * from cart where id_product = '$id'  and id_user = '$id1'";
                        $result5 = mysqli_query($conn, $query5);
                        if (mysqli_num_rows($result5) > 0) {
                            echo '<h3 class="title pb-25 text-center text-md-left text-capitalize">The product already exist</h3>';
                        } else {

                            if ($discount == null) {
                                $product_price = $product_price;
                            } else {
                                $product_price = $discount;
                            }

                            $query = "INSERT INTO `cart`(`product_name`, `product_images`, `id_user`, `product_category`, `short_description`, `product_colors`, `product_price`, `discount`, `qty`,`id_product`) VALUES
                         ('$product_name','$piece2','$id1','$product_category','$description2','$color','$product_price','$discount','1','$id')";
                            $result = mysqli_query($conn, $query);

                            echo '<h3 class="title pb-25 text-center text-md-left text-capitalize">Add product</h3>';
                            echo '<script> window.location.href = "cart.php"; </script>';
                        }
                    } elseif (isset($_GET['id1_hot']) && isset($_GET['id_hot'])) {

                        $id1 = $_GET['id1_hot'];
                        $id = $_GET['id_hot'];

                        $query = "SELECT * from hot_deales where id = '$id' ";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $product_name = $row['product_name'];
                                $product_price = $row['product_price'];
                                $description2 = $row['short_description'];
                                $product_category = $row['product_category'];
                                $color = $row['product_colors'];
                                $pieces1 = $row['product_images'];
                                $piece = explode(",", $pieces1);
                                $piece2 = $piece[0];
                            }
                        }

                        $query5 = "SELECT * from cart where id_product = '$id' and point =  '1' ";
                        $result5 = mysqli_query($conn, $query5);
                        if (mysqli_num_rows($result5) > 0) {
                            echo '<h3 class="title pb-25 text-center text-md-left text-capitalize">The product already exist</h3>';
                        } else {


                            $query = "INSERT INTO `cart`(`product_name`, `product_images`, `id_user`, `product_category`, `short_description`, `product_colors`, `product_price`, `discount`, `qty`,`id_product`,`point`) VALUES
                         ('$product_name','$piece2','$id1','$product_category','$description2','$color','$product_price','0','1','$id','1')";
                            $result = mysqli_query($conn, $query);

                            echo '<h3 class="title pb-25 text-center text-md-left text-capitalize">Add product</h3>';
                            echo '<script> window.location.href = "cart.php"; </script>';
                        }
                    } elseif (isset($_GET['id1_cart']) && isset($_GET['id_cart'])) {

                        $id1 = $_GET['id1_cart'];
                        $id = $_GET['id_cart'];

                        $query = "SELECT * from wishlist where id = '$id' ";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $id_product = $row['id_product'];
                                $product_name = $row['product_name'];
                                $product_price = $row['product_price'];
                                $description2 = $row['short_description'];
                                $product_category = $row['product_category'];
                                $color = $row['product_colors'];
                                $piece2 = $row['product_images'];
                            }
                        }

                      

                            if (isset($_GET['point'])) {

                            $query5 = "SELECT * from cart where id_product = '$id_product' and id_user = '$id1'";
                            $result5 = mysqli_query($conn, $query5);
                            if (mysqli_num_rows($result5) > 0) {
                                echo '<h3 class="title pb-25 text-center text-md-left text-capitalize">The product already exist</h3>';
                            }else{
                                $query = "INSERT INTO `cart`(`product_name`, `product_images`, `id_user`, `product_category`, `short_description`, `product_colors`, `product_price`, `discount`, `qty`,`id_product`,`point`) VALUES
                         ('$product_name','$piece2','$id1','$product_category','$description2','$color','$product_price','0','1','$id_product','1')";
                                $result = mysqli_query($conn, $query);

                                echo '<h3 class="title pb-25 text-center text-md-left text-capitalize">Add product</h3>';
                                echo '<script> window.location.href = "cart.php"; </script>';
                           }
                         } else {
                            $query5 = "SELECT * from cart where id_product = '$id_product' and id_user = '$id1'  and  point= '0'";
                            $result5 = mysqli_query($conn, $query5);
                            if (mysqli_num_rows($result5) > 0) {
                                echo '<h3 class="title pb-25 text-center text-md-left text-capitalize">The product already exist</h3>';
                            }else {

                                $query = "INSERT INTO `cart`(`product_name`, `product_images`, `id_user`, `product_category`, `short_description`, `product_colors`, `product_price`, `discount`, `qty`,`id_product`) VALUES
                         ('$product_name','$piece2','$id1','$product_category','$description2','$color','$product_price','0','1','$id_product')";
                                $result = mysqli_query($conn, $query);

                                echo '<h3 class="title pb-25 text-center text-md-left text-capitalize">Add product</h3>';
                                echo '<script> window.location.href = "cart.php"; </script>';
                          }
                        }
                        
                    } elseif (isset($_POST['submit'])) {
                        $color_hot = $_POST['color_hot'];
                        $qty_hot = $_POST['qty_hot'];
                        $id_product_hot = $_POST['id_product_hot'];

                        $query = "SELECT * from hot_deales where id = '$id_product_hot' ";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $product_name = $row['product_name'];
                                $product_price = $row['product_price'];
                                $description2 = $row['short_description'];
                                $product_category = $row['product_category'];
                                $pieces1 = $row['product_images'];
                                $piece = explode(",", $pieces1);
                                $piece2 = $piece[0];

                                $new_product_price = $product_price * $qty_hot;
                            }
                        }

                        $query5 = "SELECT * from cart where id_product = '$id' and id_user = '$id1' ";
                        $result5 = mysqli_query($conn, $query5);
                        if (mysqli_num_rows($result5) > 0) {
                            echo '<h3 class="title pb-25 text-center text-md-left text-capitalize">The product already exist</h3>';
                        } else {


                            $query = "INSERT INTO `cart`(`product_name`, `product_images`, `id_user`, `product_category`, `short_description`, `product_colors`, `product_price`, `discount`, `qty`,`id_product`,`point`) VALUES
                         ('$product_name','$piece2','$id1','$product_category','$description2','$color_hot','$new_product_price','0','$qty_hot','$id','1')";
                            $result = mysqli_query($conn, $query);

                            echo '<h3 class="title pb-25 text-center text-md-left text-capitalize">Add product</h3>';
                            echo '<script> window.location.href = "cart.php"; </script>';
                        }
                    } elseif (isset($_POST['submit1'])) {

                        $color_product = $_POST['color_product'];
                        $qty_product = $_POST['qty_product'];
                        $id_product_product = $_POST['id_product_product'];

                        $query = "SELECT * from product where id = '$id_product_product' ";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $product_name = $row['product_name'];
                                $product_price = $row['product_price'];
                                $discount = $row['discount'];
                                $description2 = $row['short_description'];
                                $product_category = $row['product_category'];
                                $pieces1 = $row['product_images'];
                                $piece = explode(",", $pieces1);
                                $piece2 = $piece[0];
                            }
                        }

                        $query5 = "SELECT * from cart where id_product = '$id_product_product' and id_user = '$id1' ";
                        $result5 = mysqli_query($conn, $query5);
                        if (mysqli_num_rows($result5) > 0) {
                            echo '<h3 class="title pb-25 text-center text-md-left text-capitalize">The product already exist</h3>';
                        } else {

                            if ($discount == null) {
                                $product_price = $product_price;

                                $new_product_price = $product_price * $qty_product;
                            } else {
                                $product_price = $discount;
                                $new_product_price = $product_price * $qty_product;
                            }

                            $query = "INSERT INTO `cart`(`product_name`, `product_images`, `id_user`, `product_category`, `short_description`, `product_colors`, `product_price`, `discount`, `qty`,`id_product`) VALUES
                         ('$product_name','$piece2','$id1','$product_category','$description2','$color_product','$new_product_price','$discount','$qty_product','$id')";
                            $result = mysqli_query($conn, $query);

                            echo '<h3 class="title pb-25 text-center text-md-left text-capitalize">Add product</h3>';
                            echo '<script> window.location.href = "cart.php"; </script>';
                        }
                    }

                ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <th scope="col">Product name</th>
                                <th scope="col">Product image</th>
                                <th scope="col">product category</th>
                                <th scope="col">colors</th>
                                <th scope="col">price</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                <?php

                                $id1 = $_SESSION['id1'];
                                $query2 = "SELECT * from cart where id_user = '$id1' ";
                                $result2 = mysqli_query($conn, $query2);
                                if (mysqli_num_rows($result2) > 0) {
                                    while ($row1 = mysqli_fetch_assoc($result2)) {
                                        $id2 = $row1['id'];
                                        $id_product = $row1['id_product'];
                                        $product_image = $row1['product_images'];
                                        $product_name1 = $row1['product_name'];
                                        $product_colors = $row1['product_colors'];
                                        $price = $row1['product_price'];
                                        $product_category1 = $row1['product_category'];
                                        $qty = $row1['qty'];
                                        $point = $row1['point'];

                                ?>
                                        <tr class="text-center">
                                            <td class="text-center">
                                                <span class="whish-list-price">
                                                    <?php if ($point == 0) { ?>
                                                        <a href="single-product-product.php?id=<?php echo $id_product; ?>&name=<?php echo $product_name1; ?>&category=<?php echo $product_category1; ?>">
                                                            <?php echo $product_name1; ?>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="single-product-hot-deals.php?id=<?php echo $id_product; ?>&name=<?php echo $product_name1; ?>&category=<?php echo $product_category1; ?>">
                                                            <?php echo $product_name1; ?>
                                                        </a><br><br>
                                                        <p style="color: red; font-weight: bold;">Hot deals </p>
                                                    <?php } ?>
                                                </span>
                                            </td>

                                            <td>
                                                <img src="Main Admin PDD/paper-dashboard-master/upload/<?php echo $product_image; ?>" alt="img" style="width: 150px; height: auto;">
                                            </td>

                                            <td class="text-center">
                                                <p> <?php echo $product_category1;  ?></p>
                                            </td>
                                            <td class="text-center">
                                                <?php $piece1 = explode(",", $product_colors);
                                                echo $piece1[0];

                                                ?>

                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-danger position-static my-badge"> <?php echo $price; ?> JD</span>
                                            </td>

                                            <td class="text-center">
                                                <span class="badge badge-danger position-static my-badge"><?php echo $qty; ?></span>
                                            </td>
                                            <td class="text-center">
                                                <a href="cart.php?id_user=<?php echo $id1; ?>&id_product=<?php echo $id2; ?>" class="input" style="color:#fff;  background:red; padding: 7px;"> Delete </a><br><br>

                                                <?php

                                                if ($point == 0) { ?>
                                                    <a href="checkout.php?id1=<?php echo $id1; ?>&id=<?php echo $id2; ?>" class="input" style="color:#fff;  background:black; padding: 7px;"> Buy </a>
                                                <?php } else { ?>
                                                    <a href="checkout.php?id1=<?php echo $id1; ?>&id=<?php echo $id2; ?>&point=1" class="input" style="color:#fff;  background:black; padding: 7px;"> Buy </a>
                                                <?php } ?>
                                            </td>

                                        </tr>
                            <?php  }
                                } else {
                                    echo '<h3 class="title pb-25 text-center text-md-left text-capitalize">There is no product in cart</h3>';
                                }
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
        <?php
        if (isset($_GET['id_user']) && isset($_GET['id_product'])) {
            $id1 = $_GET['id_user'];
            $id2 = $_GET['id_product'];

            $query4 = "SELECT * from cart where id = '$id2' ";
            $result4 = mysqli_query($conn, $query4);
            $sdf = mysqli_num_rows($result4);
            if (mysqli_num_rows($result4) > 0) {

                while ($row3 = mysqli_fetch_assoc($result4)) {
                    $id2 = $row3['id'];

                    $query3 = "DELETE FROM `cart` where id_user = '$id1' and id = '$id2' ";
                    $result3 = mysqli_query($conn, $query3);

                    echo '<script> window.location.href = "cart.php?true=true"; </script>';
                }
            }
        }
        ?>
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