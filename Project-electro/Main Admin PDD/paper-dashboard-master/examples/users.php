<?php
session_start();

include("db_config.php");


?>

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
          Welcome <br> ELECTRO ADMIN
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
          <li>
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
          <li class="active ">
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
            <a class="navbar-brand" href="javascript:;">The users</a>
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
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">User information</h4>
                  <p class="card-category"> Here is all users</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive" style="overflow: hidden;">
                    <table class="table" id="tbIDate">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          First name
                        </th>
                        <th>
                          Last name
                        </th>
                        <th>
                          Username
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Phone number
                        </th>
                        <th>
                          Action
                        </th>
                      </thead>
                      <?php $i = 1; ?>
                      <tbody>
                        <?php
                        $query = "SELECT * from users";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                          while ($row1 = mysqli_fetch_assoc($result)) {
                            $id1 = $row1['id'];
                            $first_name = $row1['first_name'];
                            $last_name = $row1['last_name'];
                            $username = $row1['username'];
                            $email = $row1['email'];
                            $Phone = $row1['phone'];
                        ?>

                            <tr>
                              <td>
                                <?php echo $i; ?>
                              </td>
                              <td>
                                <?php echo $first_name; ?>
                              </td>
                              <td>
                                <?php echo $last_name; ?>
                              </td>
                              <td>
                                <?php echo $username; ?>
                              </td>
                              <td>
                                <?php echo $email; ?>
                              </td>
                              <td>
                                <?php echo $Phone; ?>
                              </td>
                              <td>
                                <form action="orders.php" method="post">
                                  <button type="submit" name="View_btn" value="View_btn" class="btn btn-primary">View orders</button>
                                  <input type="hidden" name="id" value=" <?php echo $id1; ?>">
                                </form>
                              </td>
                            </tr>

                        <?php $i++;
                          }
                        } ?>

                      </tbody>
                    </table>
                    <button class="btn" id="btn2" onclick="exportTableToExcel('tbIDate', 'Users information');">Download this table</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <footer class="footer footer-black  footer-white " style="position: relative; margin-top: 200px;">
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
    function exportTableToExcel(tableID, filename = '') {
      var downloadLink;
      var dataType = 'application/vnd.ms-excel';
      var tableSelect = document.getElementById(tableID);
      var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

      // Specify file name
      filename = filename ? filename + '.xls' : 'excel_data.xls';

      // Create download link element
      downloadLink = document.createElement("a");

      document.body.appendChild(downloadLink);

      if (navigator.msSaveOrOpenBlob) {
        var blob = new Blob(['\ufeff', tableHTML], {
          type: dataType
        });
        navigator.msSaveOrOpenBlob(blob, filename);
      } else {
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
      }
    }
  </script>
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

if(isset($_GET['id'])){

  $id = $_GET['id'];
  $query4 = "SELECT * from users where id = '$id' ";
  $result4 = mysqli_query($conn, $query4);
  if (mysqli_num_rows($result4) > 0) {
    while ($row3 = mysqli_fetch_assoc($result4)) {
      $id2 = $row3['id'];

      $query3 = "UPDATE `users` SET `point`='1' WHERE id = '$id2' ";
      mysqli_query($conn, $query3);
      echo '<script> window.location.href = "users.php"; </script>';
    }
  }

}

?>