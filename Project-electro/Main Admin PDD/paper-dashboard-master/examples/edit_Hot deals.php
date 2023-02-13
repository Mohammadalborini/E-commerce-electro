<?php
session_start();

include("db_config.php");
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
    $result = $conn->query("SELECT * FROM hot_deales WHERE id='$id' ") or die($conn->error);
    while ($row = $result->fetch_assoc()) {
        $_SESSION['product_name'] =  $row['product_name'];
        $_SESSION['product_images'] =  $row['product_images'];
        $_SESSION['product_category'] =  $row['product_category'];
        $_SESSION['short_description'] =  $row['short_description'];
        $_SESSION['full_description'] =  $row['full_description'];
        $_SESSION['product_colors'] =  $row['product_colors'];
        $_SESSION['product_price'] =  $row['product_price'];
        $_SESSION['quantity_of_devices'] =  $row['quantity_of_devices'];
        $_SESSION['hot_deals_end'] =  $row['hot_deals_end'];
    }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Paper Dashboard 2 by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        input[type=text],
        input[type=file],
        input[type=radio] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .divs {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .divs label {
            color: black;
            font-size: 15px;
            font-weight: 900;
        }


        .divb {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            outline: none;
        }

        .divb {
            outline: none;
        }

        .divb:hover {
            background-color: #45a049;
            color: #fff;
            outline: none;
        }

        .divs:link,
        .divs:visited {
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 200px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .show {
            display: block;
        }




        .dropdown-content1 {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 200px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content1 a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content1 a:hover {
            background-color: #ddd;
        }

        .show1 {
            display: block;
        }



        .dropdown-content2 {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 200px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content2 a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content2 a:hover {
            background-color: #ddd;
        }

        .show2 {
            display: block;
        }

        .btn {
            width: 100%;
            background-color: red;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .dropdown-content3 {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 200px;
            overflow: auto;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content3 a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content3 a:hover {
            background-color: #ddd;
        }

        .show3 {
            display: block;
        }
    </style>
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
                <a href="https://www.creative-tim.com" class="simple-text logo-mini">
                    <div class="logo-image-small">
                        <img src="../assets/img/logo-small.png">
                    </div>
                    <!-- <p>CT</p> -->
                </a>
                <a href="https://www.creative-tim.com" class="simple-text logo-normal">
                    Welcome <br> Electro Admin
                    <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="./dashboard.php">
                            <i class="nc-icon nc-bank"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="./header.php">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <p>Header</p>
                        </a>
                    </li>
                    <li>
                        <a onclick="myFunction()" class="dropbtn">
                            <i class="nc-icon nc-bullet-list-67"></i>
                            Product
                        </a>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="./add produtc.php">
                                <i class="nc-icon nc-chat-33"></i>
                                <p>Add Product</p>
                            </a>

                            <a href="./produtc.php">
                                <i class="nc-icon nc-bullet-list-67"></i>
                                <p>Product</p>
                            </a>
                        </div>
                    </li>
                    <li class="active ">
                        <a href="./Hot deals.php">
                            <i class="nc-icon nc-align-left-2"></i>
                            <p>Hot deals</p>
                        </a>
                    </li>
                    <li>
                        <a href="./best seller.php">
                            <i class="nc-icon nc-cart-simple"></i>
                            <p>best seller</p>
                        </a>
                    </li>
                    <li>
                        <a href="./users.php">
                            <i class="nc-icon nc-single-02"></i>
                            <p>users</p>
                        </a>
                    </li>
                    <li>
                        <a href="./orders.php">
                            <i class="nc-icon nc-bag-16"></i>
                            <p>orders</p>
                        </a>
                    </li>

                    <li>
                        <a href="./logout.php">
                            <i class="fa fa-sign-out" style="font-size:24px"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="javascript:;">Offer section 1</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="nc-icon nc-zoom-split"></i>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item btn-rotate dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="nc-icon nc-bell-55"></i>
                                    <p>
                                        <?php

                                        $query1 = "SELECT first_name from  users  where point = 0 UNION All
                          SELECT product_name from  orders  where point2 = 0";
                                        $result1 = mysqli_query($conn, $query1);
                                        if (mysqli_num_rows($result1) > 0) {
                                            $num = mysqli_num_rows($result1);
                                        } else {
                                            $num = 0;
                                        }
                                        ?>
                                        <span><?php echo $num; ?></span>
                                        <span class="d-lg-none d-md-block">Some Actions</span>

                                    </p>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <?php
                                    $query = "SELECT * from users  where point = 0";
                                    $result = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row['id'];
                                            $first_name = $row['first_name'];
                                    ?>
                                            <a class="dropdown-item" href="users.php?id=<?php echo $id; ?>"><?php echo $first_name; ?>: User</a>
                                    <?php  }
                                    } ?>

                                    <?php
                                    $query = "SELECT * from orders  where point2 = 0";
                                    $result = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row1 = mysqli_fetch_assoc($result)) {
                                            $id2 = $row1['id'];
                                            $product_name = $row1['product_name'];
                                    ?>
                                            <a class="dropdown-item" href="orders.php?id=<?php echo $id2 ?>"><?php echo $product_name; ?> : Order</a>
                                    <?php   }
                                    } ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Offer section 1</h5>
                            </div>
                            <div class="divs">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <label for="image"> Product images </label>
                                    <?php
                                    $pieces1 = $_SESSION['product_images'];
                                    $piece = explode(",", $pieces1);
                                    for ($i = 0; $i < count($piece); $i++) {
                                        if (!empty($piece[$i])) {
                                            echo '
                                        <img src="../upload/' . $piece[$i] . '" style="width:100px; height:auto;" />
                                        ';
                                        }
                                    }
                                    ?>
                                    <input type="file" id="image" name="files[]" required multiple>
                                    <label for="name"> Product name </label>
                                    <input type="text" name="name1" id="name" required value="<?php echo $_SESSION['product_name']; ?>">
                                    <label for="name"> Short description </label>
                                    <input type="text" name="rname1" id="name" required value="<?php echo $_SESSION['short_description']; ?>">
                                    <label for="nameo"> Full description </label>
                                    <input type="text" name="name2" id="nameo" required value="<?php echo $_SESSION['full_description']; ?>">
                                    <label for="nameo1">Colors Example(Red,Blue,Black)</label>
                                    <input type="text" name="rname2" id="nameo1" required value="<?php echo $_SESSION['product_colors']; ?>">
                                    <label for="link1"> Price </label>
                                    <input type="text" name="name3" id="link1" required value="<?php echo $_SESSION['product_price']; ?>">
                                    <label for="link3"> Hot deals end (number of days to end) </label>
                                    <input type="text" name="name5" id="link3" required value="<?php echo $_SESSION['hot_deals_end']; ?>">
                                    <label for="link2"> Quantit of devices </label>
                                    <input type="text" name="name4" id="link2" required value="<?php echo $_SESSION['quantity_of_devices']; ?>">

                                    <label for="link" style="font-size:25px;"> Product category </label><br>

                                    <label for="Laptops"> Laptops </label>
                                    <input type="radio" name="link[]" value="Laptops" id="Laptops" required><br>
                                    <label for="Smartphones"> Smartphones </label>
                                    <input type="radio" name="link[]" value="Smartphones" id="Smartphones" required><br>
                                    <label for="Cameras"> Cameras </label>
                                    <input type="radio" name="link[]" value="Cameras" id="Cameras" required><br>
                                    <label for="Accessories"> Accessories </label>
                                    <input type="radio" name="link[]" value="Accessories" id="Accessories" required><br>

                                    <input type="submit" name="submit" value="Save">
                                    <a href="Hot deals.php" class="btn"> Back </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer footer-black  footer-white ">
                <div class="container-fluid">
                    <div class="row">
                        <nav class="footer-nav">
                            <ul>
                                <li><a href="https://www.creative-tim.com" target="_blank">Creative Tim</a></li>
                                <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                                <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
                            </ul>
                        </nav>
                        <div class="credits ml-auto">
                            <span class="copyright">
                                © <script>
                                    document.write(new Date().getFullYear())
                                </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
                            </span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script>
        /* When the user clicks on the button, 
  toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>


    <script>
        /* When the user clicks on the button, 
  toggle between hiding and showing the dropdown content */
        function myFunction1() {
            document.getElementById("myDropdown1").classList.toggle("show1");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn1')) {
                var dropdowns = document.getElementsByClassName("dropdown-content1");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show1')) {
                        openDropdown.classList.remove('show1');
                    }
                }
            }
        }
    </script>




    <script>
        /* When the user clicks on the button, 
  toggle between hiding and showing the dropdown content */
        function myFunction2() {
            document.getElementById("myDropdown2").classList.toggle("show2");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn2')) {
                var dropdowns = document.getElementsByClassName("dropdown-content2");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show2')) {
                        openDropdown.classList.remove('show2');
                    }
                }
            }
        }
    </script>

    <script>
        /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
        function myFunction3() {
            document.getElementById("myDropdown3").classList.toggle("show3");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn3')) {
                var dropdowns = document.getElementsByClassName("dropdown-content3");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show3')) {
                        openDropdown.classList.remove('show3');
                    }
                }
            }
        }
    </script>
</body>

</html>

<?php
if (isset($_POST['submit'])) {

    $name1 =  $_POST['name1'];
    $rname =  $_POST['rname1'];
    $name2 =  $_POST['name2'];
    $rname2 =  $_POST['rname2'];
    $name3 =  $_POST['name3'];
    $name4 =  $_POST['name4'];
    $name5 = $_POST['name5'];

    $link =  $_POST['link'];

    foreach ($link as $cart) {
    }

    // File upload configuration 
    $targetDir = "../upload/";
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    $fileNames = array_filter($_FILES['files']['name']);
    if (!empty($fileNames)) {
        foreach ($_FILES['files']['name'] as $key => $val) {
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;

            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server 
                if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                    // Image db insert sql 

                    $insertValuesSQL .= "" . $fileName . ",";
                } else {
                    $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
                }
            } else {
                $errorUploadType .= $_FILES['files']['name'][$key] . ' | ';
            }
        }
    }

    //Now run update query 	
    $id3 = $_SESSION['id'];
    $query = $conn->query("UPDATE `hot_deales` SET `product_name`='$name1',`product_images`='$insertValuesSQL',`product_category`='$cart',`short_description`='$rname',
    `full_description`='$name2',`product_colors`='$rname2',`product_price`='$name3',`quantity_of_devices`='$name4',`hot_deals_end`='$name5'
     WHERE id = '$id3' ");
    echo "<script> alert('Edit Hot deal.') </script>";
    echo '<script> window.location.href = "Hot deals.php"; </script>';
}

?>