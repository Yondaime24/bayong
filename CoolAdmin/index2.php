<?php

  include('functions/functions.php');
  include('../config/dbconn.php');

  $sql2 = "SELECT sum(prod_qty) AS total_qty FROM order_details WHERE status='Delivered'";
  $stmt2 = $dbconn->query($sql2);
  $row1 = $stmt2->fetch_assoc();

  $sql3 = "SELECT sum(totalprice) AS `total` FROM `order` WHERE `status`='Delivered'";
  $stmt3 = $dbconn->query($sql3);
  $row2 = $stmt3->fetch_assoc();


    session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:admin_login_page.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>BAYONG</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <link href="css/badge2.css" rel="stylesheet" media="all">
    <link href="css/spanbadge.css" rel="stylesheet" media="all">

    <style>
      .error{
        color: red;
        font-style: italic;
      }
      .icon2{
        font-size: 50px;
      }
    </style>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
               <h1 style="color: white; margin-left: 35px;">BAYONG</h1>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">


                    <div class="image img-cir img-120">

                        <img src="../assets/img/defaults.jpg" alt="">

                    </div>


                    <h4 class="name"> 
                            <?php
                            include('../config/dbconn.php');
                            $query=mysqli_query($dbconn,"SELECT * FROM `admin` WHERE user_id='".$_SESSION['id']."'");
                            $row=mysqli_fetch_array($query);
                            echo ''.$row['firstname'].' '.$row['lastname'].'';
                            ?>
                    </h4>

                    <a href="index2.php">Administrator</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a href="index2.php">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="customer.php">
                                <i class="fas fa-user"></i>Customers</a>
                        </li>

                         <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-shopping-basket"></i>Products
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="products.php">
                                        <i class="fas fa-shopping-basket"></i>All Products</a>
                                </li>
                                <li>
                                    <a href="addProduct.php">
                                        <i class="fas fa-plus"></i>Add Product</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-shopping-cart"></i>Orders
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="packagingProd.php">
                                        <i class="fas fa-gift"></i>Packaged</a>
                                </li>
                                <li>
                                    <a href="shippingProd.php">
                                        <i class="fas fa-car"></i>Shipping</a>
                                </li>
                                 <li>
                                    <a href="deliveredProd.php">
                                        <i class="fas fa-check"></i>Delivered</a>
                                </li>
                                <li>
                                    <a href="canceledProd.php">
                                        <i class="zmdi zmdi-block-alt"></i>Canceled</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-sign-in-alt"></i>Logs
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="userLog.php">
                                        <i class="far fa-user"></i>User Logs</a>
                                </li>
                                <li>
                                    <a href="adminLog.php">
                                        <i class="far fa-user"></i>Admin Logs</a>
                                </li>
                            </ul>
                        </li>
                      
                      
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <!-- <a href="#">
                                    <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                                </a> -->
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item js-item-menu">
                                    <?php
                                        $query = "SELECT * FROM `order` where `status` = 'Pending' order by `order_date` DESC";
                                        if(count(fetchAll($query))>0){
                                    ?>
                                    <span class="badge"><?php echo count(fetchAll($query)); ?></span>
                                   <?php
                                        }
                                    ?>
                                    <h3 style="color: white">Orders</h3>
                                    <div class="notifi-dropdown js-dropdown">
                                    <div class="notifi__title">
                                    <?php
                                        $query = "SELECT * FROM `order` where `status` = 'Pending' order by `order_date` DESC";
                                        if(count(fetchAll($query))>0){
                                    ?>
                                        <p>You Have <?php echo count(fetchAll($query)); ?> New Orders</p>
                                    <?php
                                        }
                                    ?>
                                    </div>
                                     <div class="scroll2">

                                        <?php 
                                           $query = "SELECT * from `order` WHERE `status`='Pending' order by `order_date` DESC";
                                           if(count(fetchAll($query))>0){
                                              foreach(fetchAll($query) as $i){
                                        ?>

                                        <a class="notifi__item" href="viewOrder.php?order_id=<?php echo $i['order_id'] ?>&&user_id=<?php echo $i['user_id'] ?>">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="content">
                                                <p style="color: black"><u><?php echo $i['firstname'] ?> <?php echo $i['middlename'] ?> <?php echo $i['lastname'] ?></u> ordered a bayong!</p>
                                                <span class="date"><?php echo date('F j, Y / g:i a',strtotime($i['order_date'])) ?></span>
                                            </div>
                                        </a>
                                       
                                     <?php 
                                    }
                                 }
                                 else{
                                          echo "<div class=\"notifi__title\">
                                                     <p style=\"color: red\">No Orders Yet</p>
                                                </div>";
                                        }
                                 ?>
                              </div>
                                    </div>
                                </div>

                                <div class="header-button-item js-item-menu">
                                    <?php
                                        $query = "SELECT * FROM `msg` where `user_type` = 'customer' && `status` = 'unread' order by `date_sent` DESC";
                                        if(count(fetchAll($query))>0){
                                    ?>
                                    <span class="badge"><?php echo count(fetchAll($query)); ?></span>
                                   <?php
                                        }
                                    ?>
                                    <i class="zmdi zmdi-email"></i>
                                    <div class="notifi-dropdown js-dropdown">
                                    <div class="notifi__title">
                                    <?php
                                        $query = "SELECT * FROM `msg` where `user_type` = 'customer' && `status` = 'unread' order by `date_sent` DESC";
                                        if(count(fetchAll($query))>0){
                                    ?>
                                        <p>You Have <?php echo count(fetchAll($query)); ?> New Messages</p>
                                    <?php
                                        }
                                    ?>
                                    </div>
                                     <div class="scroll2">

                                    <?php 
                                          $query = "SELECT * FROM `msg` where `user_type` = 'customer' order by `date_sent` DESC";
                                            if(count(fetchAll($query))>0){
                                              foreach(fetchAll($query) as $i){
                                    ?>
                                             
                                      <?php if ($i['status']=='unread') { ?>

                                        <a class="notifi__item" href="customerMsg.php?msg_id=<?php echo $i['msg_id'] ?>&&user_id=<?php echo $i['user_id'] ?>">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-email"></i>
                                            </div>
                                            <div class="content">
                                                <small style="color: black">From: <?php echo $i['sender_name'] ?></small>
                                                    <p><b>You have a new message</b></p>
                                                <small style="color: black;"><?php echo date('F j, Y / g:i a',strtotime($i['date_sent'])) ?></small>
                                            </div>
                                        </a>
                                            

                                        <?php  }else if ($i['status']=='read') { ?>

                                        <a class="notifi__item" href="customerMsg.php?msg_id=<?php echo $i['msg_id'] ?>&&user_id=<?php echo $i['user_id'] ?>">
                                            <div class="bg-c1 img-cir img-40" style="background: gray">
                                                <i class="zmdi zmdi-email-open"></i>
                                            </div>
                                            <div class="content">
                                                <small style="color: gray">From: <?php echo $i['sender_name'] ?></small>
                                                    <p style="color: gray">Message opened</p>
                                                <small style="color: gray;"><?php echo date('F j, Y / g:i a',strtotime($i['date_sent'])) ?></small>
                                            </div>
                                        </a>

                                        <?php } ?>

                                      <?php 
                                          }
                                        }

                                        else{
                                          echo "<div class=\"notifi__title\">
                                                     <p style=\"color: red\">No Messages Yet</p>
                                                </div>";
                                        }

                                      ?>

                              </div>
                                    </div>
                                </div>

                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">

                                            <a href="../pages/admin_account_update.php?user_id=<?php echo $_SESSION['id'] ?>">


                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">


                                            <a href="../pages/admin_signup.php">


                                                <i class="zmdi zmdi-plus"></i>Add Admin Account</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="../pages/logout.php">
                                                <i class="zmdi zmdi-power"></i>Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">You are here:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="index2.php">Home</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item">Dashboard</li>
                                        </ul>
                                    </div>
                                    <a class="au-btn au-btn-icon au-btn--green" href="addProduct.php">
                                        <i class="zmdi zmdi-plus"></i>add product</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- STATISTIC-->
            <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
          
                          

                            <div class="col-md-6 col-lg-3">
                                 <a href="packagingProd.php">
                                <div class="statistic__item">
                                    <?php

                                        $query = "SELECT * from `order` where `status` = 'Packaged'";
                                        if(count(fetchAll($query))>0){
                                    ?>

                                  <?php
                                  if(count(fetchAll($query))==1){
                                    ?>
                                    <center>
                                    <div class="number" style="font-size: 20px; background: red; color: white"><?php echo count(fetchAll($query)); ?></div>
                                   <div class="number" style="font-size: 20px;">Packaged Item!</div>
                                   <small><b>To be Delivered</b></small>
                                   </center>
                                  <?php
                                    }else{
                                  ?>
                                   <center>
                                    <div class="number" style="font-size: 20px; background: red; color: white"><?php echo count(fetchAll($query)); ?></div>
                                   <div class="number" style="font-size: 20px;">Packaged Items!</div>
                                    <small><b>To be Delivered</b></small>
                                   </center>
                                    <?php }
                                  ?>           

                                    <?php
                                        }else{
                                          echo "No Packaged Items Yet!";
                                        }
                                    ?>
                                    <div class="icon2">
                                        <i class="fas fa-gift"></i>
                                    </div>
                                    <small><u>Click to view details</u></small>
                                </div>
                                </a>
                            </div>

                              <div class="col-md-6 col-lg-3">
                                 <a href="shippingProd.php">
                                <div class="statistic__item">
                                    <?php

                                        $query = "SELECT * from `order` where `status` = 'Shipping'";
                                        if(count(fetchAll($query))>0){
                                    ?>

                                  <?php
                                  if(count(fetchAll($query))==1){
                                    ?>
                                    <center>
                                    <div class="number" style="font-size: 20px; background: red; color: white"><?php echo count(fetchAll($query)); ?></div>
                                   <div class="number" style="font-size: 20px;">Shipping Item!</div>
                                   <small><b>Being Delivered</b></small>
                                   </center>
                                  <?php
                                    }else{
                                  ?>
                                   <center>
                                    <div class="number" style="font-size: 20px; background: red; color: white"><?php echo count(fetchAll($query)); ?></div>
                                   <div class="number" style="font-size: 20px;">Shipping Items!</div>
                                    <small><b>Being Delivered</b></small>
                                   </center>
                                    <?php }
                                  ?>           

                                    <?php
                                        }else{
                                          echo "No Shipped Items Yet!";
                                        }
                                    ?>
                                    <div class="icon2">
                                        <i class="fas fa-car"></i>
                                    </div>
                                    <small><u>Click to view details</u></small>
                                </div>
                                </a>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                 <a href="deliveredProd.php">
                                <div class="statistic__item">
                                    <?php

                                        $query = "SELECT * from `order` where `status` = 'Delivered'";
                                        if(count(fetchAll($query))>0){
                                    ?>

                                  <?php
                                  if(count(fetchAll($query))==1){
                                    ?>
                                    <center>
                                    <div class="number" style="font-size: 20px; background: red; color: white"><?php echo count(fetchAll($query)); ?></div>
                                   <div class="number" style="font-size: 20px;">Item Delivered!</div>
                                   <small><b>Successfully Delivered</b></small>
                                   </center>
                                  <?php
                                    }else{
                                  ?>
                                   <center>
                                    <div class="number" style="font-size: 20px; background: red; color: white"><?php echo count(fetchAll($query)); ?></div>
                                   <div class="number" style="font-size: 20px;">Items Delivered!</div>
                                    <small><b>Successfully Delivered</b></small>
                                   </center>
                                    <?php }
                                  ?>           

                                    <?php
                                        }else{
                                          echo "No Items Delivered Yet!";
                                        }
                                    ?>
                                    <div class="icon2">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <small><u>Click to view details</u></small>
                                </div>
                                </a>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                 <a href="canceledProd.php">
                                <div class="statistic__item">
                                    <?php

                                        $query = "SELECT * from `order` where `status` = 'Canceled'";
                                        if(count(fetchAll($query))>0){
                                    ?>

                                  <?php
                                  if(count(fetchAll($query))==1){
                                    ?>
                                    <center>
                                    <div class="number" style="font-size: 20px; background: red; color: white"><?php echo count(fetchAll($query)); ?></div>
                                   <div class="number" style="font-size: 20px;">Item Canceled!</div>
                                   <small><b>Canceled Order</b></small>
                                   </center>
                                  <?php
                                    }else{
                                  ?>
                                   <center>
                                    <div class="number" style="font-size: 20px; background: red; color: white"><?php echo count(fetchAll($query)); ?></div>
                                   <div class="number" style="font-size: 20px;">Items Canceled!</div>
                                    <small><b>Canceled Orders</b></small>
                                   </center>
                                    <?php }
                                  ?>           

                                    <?php
                                        }else{
                                          echo "No Items Canceled Yet!";
                                        }
                                    ?>
                                    <div class="icon2">
                                         <i class="zmdi zmdi-block-alt"></i>
                                    </div>
                                    <small><u>Click to view details</u></small>
                                </div>
                                </a>
                            </div>


                             <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <?php

                                        $query = "SELECT * from `order_details` where `status` = 'Delivered'";
                                        if(count(fetchAll($query))>0){
                                    ?>

                                      <?php
                                      if(count(fetchAll($query))==1){
                                        ?>
                                            <h2 class="number"><?php echo $row1["total_qty"];?></h2>
                                            <span class="desc">Item Sold</span>
                                      <?php
                                        }else{
                                      ?>
                                             <h2 class="number"><?php echo $row1["total_qty"];?></h2>
                                             <span class="desc">Total Items Sold</span>
                                      </ul>
                                        <?php }
                                      ?>           

                                        <?php
                                            }else{
                                              echo "No Total Items Yet!";
                                            }
                                        ?>
                                  
                                    <div class="icon">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <?php
                                        $query = "SELECT * from `order` WHERE `status`='Delivered'";
                                        if(count(fetchAll($query))>0){
                                    ?>
                                         <h2 class="number">&#8369;<?php echo $row2["total"];?></h2>
                                            <span class="desc">total earnings</span>
                                   <?php
                                        }else{
                                            echo "No Total Earnings Yet!";
                                        }
                                    ?>
                                    <div class="icon">
                                        <i class="zmdi">&#8369;</i>
                                    </div>
                                </div>
                            </div>

  <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <?php

                                            $query = "SELECT * from `users`";
                                            if(count(fetchAll($query))>0){
                                        ?>

                                      <?php
                                      if(count(fetchAll($query))==1){
                                        ?>
                                            <h2 class="number"><?php echo count(fetchAll($query)); ?></h2>
                                            <span class="desc">customer</span>
                                      <?php
                                        }else{
                                      ?>
                                             <h2 class="number"><?php echo count(fetchAll($query)); ?></h2>
                                             <span class="desc">customers</span>
                                      </ul>
                                        <?php }
                                      ?>           

                                        <?php
                                            }else{
                                              echo "No Clients Yet!";
                                            }
                                        ?>
                                  
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->

            <section style="visibility: hidden;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2021 Bayong. All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2021 Bayong. All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
    <script src="vendor/vector-map/jquery.vmap.js"></script>
    <script src="vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
