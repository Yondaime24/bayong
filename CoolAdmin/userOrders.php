<?php

  include('functions/functions.php');
  include('../config/dbconn.php');

  $user_id = $_GET['user_id'];

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
    <title>BAYONG | Orders</title>
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
    <link href="css/badge.css" rel="stylesheet" media="all">

        <link href="../assets/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <style>
      .error{
        color: red;
        font-style: italic;
      }
    </style>

</head>

<body class="animsition">
  <div class="page-wrapper">


 <div class="card mb-3">
                    <div class="card-header">

    <?php
        $query=mysqli_query($dbconn,"SELECT * FROM users WHERE user_id='$user_id'")or die(mysqli_error());
        while($row=mysqli_fetch_array($query)){
    ?>

    <h4>Customer Name: <?php echo $row['firstname']; ?> <?php echo $row['middlename']; ?> <?php echo $row['lastname']; ?></h4>
    <br>
            
    <?php } ?>

                      <h4>
                      <i class="fas fa-shopping-basket"></i>
                      Orders List</h4>
                   <center>
                       <a href="customer.php" class="btn btn-sm btn-primary" style="width: 200px">Return</a>
                       </center></div>
                     
                    <div class="card-body">
                      <div class="table-responsive">
                <?php
                                     
                  $query = "SELECT * FROM order_details WHERE user_id = '$user_id'";
                  $result = mysqli_query($dbconn,$query);

                ?>  
                        <table class="table table-bordered" id="dataTable" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Product Ordered</th>
                              <th>Description</th>
                              <th>Quantity</th>
                              <th>Price</th>
                              <th>Total</th>
                              <th>Date Ordered</th>
                              <th>Status</th>
                              <th>Option</th>
                             <!--  <th>Ordered By</th> -->

                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                              <th>Product Ordered</th>
                              <th>Description</th>
                              <th>Quantity</th>
                              <th>Price</th>
                              <th>Total</th>
                              <th>Date Ordered</th>
                              <th>Status</th>
                              <th>Option</th>
                              <!-- <th>Ordered By</th> -->
                            </tr>
                          </tfoot>
                          <tbody>


                            <?php
                            if($result){
                              while($res = mysqli_fetch_array($result)) {  


                                $prod_id=$res['prod_id'];
                                $order_id=$res['order_id'];


                                $query2=mysqli_query($dbconn,"SELECT * FROM products WHERE prod_id='$prod_id'") or die (mysqli_error());
                                $row2=mysqli_fetch_array($query2);

                                $query3=mysqli_query($dbconn,"SELECT * FROM `order` WHERE `order_id`='$order_id'") or die (mysqli_error());
                                $row3=mysqli_fetch_array($query3);

                                $stats = $row3['status'];

                                echo "<tr>";
                             ?>
                              <td> <img width="150" height="100" src="../uploads/<?php echo $row2['prod_pic1'];?>" alt=""/></td>   
                              <td><b><?php echo $row2['prod_name'];?></b><br>
                              <?php echo $row2['prod_desc'];
                              ?>
                              </td>
                              <td><br><?php  echo $res['prod_qty']; ?></td>
                              <td><br>&#8369;<?php  echo $row2['prod_price']; ?></td>
                              <td><br>&#8369;<?php echo $res['total'];?></td>
                              <td><br><?php echo date('F j, Y / g:i a',strtotime($row3['order_date']));?></td>

                              <?php if ($stats=='Pending') { ?>

                                <td><br><span><?php echo $row3['status'];?></span></td>   
                                <td><br><a class="btn btn-sm btn-outline-secondary btn-block" href="viewOrder.php?order_id=<?php echo $row3['order_id']; ?>&&user_id=<?php echo $row3['user_id']; ?>">View</a></td>

                              <?php } else if ($stats=='Packaged') { ?>

                                <td><br><span style="background: orange; color: white;"><?php echo $row3['status'];?></span></td>   
                                 <td><br><a class="btn btn-sm btn-outline-warning btn-block" href="viewPackaging.php?order_id=<?php echo $row3['order_id']; ?>&&user_id=<?php echo $row3['user_id']; ?>">View</a></td>
                                  
                              <?php  } else if ($stats=='Shipping') { ?>

                                <td><br><span style="background: #3498db; color: white;"><?php echo $row3['status'];?></span></td>   
                                <td><br><a class="btn btn-sm btn-outline-info btn-block" href="viewShipping.php?order_id=<?php echo $row3['order_id']; ?>&&user_id=<?php echo $row3['user_id']; ?>">View</a></td>
                                  
                              <?php  } else if ($stats=='Delivered') { ?>

                                <td><br><span style="background: #2ecc71; color: white;"><?php echo $row3['status'];?></span></td>   
                                <td><br><a class="btn btn-sm btn-outline-success btn-block" href="viewDelivered.php?order_id=<?php echo $row3['order_id']; ?>&&user_id=<?php echo $row3['user_id']; ?>">View</a></td>
                                  
                              <?php  } else if ($stats=='Canceled') { ?>

                                <td><br><span style="background: red; color: white;"><?php echo $row3['status'];?></span></td>   
                                <td><br><a class="btn btn-sm btn-outline-danger btn-block" href="viewCanceled.php?order_id=<?php echo $row3['order_id']; ?>&&user_id=<?php echo $row3['user_id']; ?>">View</a></td>
                                  
                              <?php  } ?>
                            
                            <?php 
                          echo "</tr>"; 
                        }
                       }?>

                          </tbody>
                        </table>
                      <hr>
                      </div>
                    
              
                    </div>
                   
            <!-- END STATISTIC-->
            <footer class="sticky-footer" style="height: 20px;">
              <div class="container my-auto">
                <div class="copyright text-center my-auto">
                  <p>Copyright © 2021  Bayong. All rights reserved.</p>
                </div>
              </div>
            </footer>
            <!-- END PAGE CONTAINER-->
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
     <!-- validators -->
    <script src="../assets/vendor/jquery/jquery.validator.js"></script>
    <script src="../assets/vendor/jquery/additional-methods.min.js"></script>
    <!-- !validators -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery/formreservation2.js"></script>
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

    <script src="../assets/datatables/jquery.dataTables.js"></script>
    <script src="../assets/datatables/dataTables.bootstrap4.js"></script>
    <script src="../assets/datatables/datatables-demo.js"></script>


</body>

</html>
<!-- end document-->
