<?php

  include('functions/functions.php');
  include('../config/dbconn.php');

    $order_id = $_GET['order_id'];
    $user_id = $_GET['user_id'];

    session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:admin_login_page.php');
        exit();
    }

// including the database connection file
include("../config/dbconn.php");
if(isset($_POST['packageBtn'])){

    $user_id = $_POST['user_id'];
    $order_id = $_POST['order_id'];
    $sender_name = $_POST['sender_name'];
    $message = $_POST['message'];


        $query = "INSERT INTO `msg` (`user_id`, `sender_name`, `date_sent`, `message`, `status`, `order_status`, `user_type`)VALUES('$user_id', '$sender_name', CURRENT_TIMESTAMP, '$message', 'unread', 'Packaged', 'admin')";
        $query_run = mysqli_query($dbconn, $query);

        if($query_run==1){

         $query="UPDATE `order` SET `status`='Packaged' WHERE order_id='$order_id'";
         $query_run = mysqli_query($dbconn, $query);

        }else{
         echo "Failed";
        }

        echo "<script>alert('Customer has been notified succesfully!')</script>";
        echo "<script>window.open('index2.php','_self')</script>";

  
}

// including the database connection file
include("../config/dbconn.php");
if(isset($_POST['cancelOrder'])){

    $user_id = $_POST['user_id'];
    $order_id = $_POST['order_id'];
    $sender_name = $_POST['sender_name'];
    $message = $_POST['message'];


        $query = "INSERT INTO `msg` (`user_id`, `order_id`, `sender_name`, `date_sent`, `message`, `status`, `order_status`, `user_type`)VALUES('$user_id', '$order_id', '$sender_name', CURRENT_TIMESTAMP, '$message', 'unread', 'Canceled', 'admin')";
        $query_run = mysqli_query($dbconn, $query);

        if($query_run==1){

          $todayDate2 = new DateTime();
          $current_date = $todayDate2->format('Y-m-d H:i:s');

         $query="UPDATE `order` SET `status`='Canceled' WHERE order_id='$order_id'";
         $query_run = mysqli_query($dbconn, $query);

          $date ="UPDATE `order` SET `date_delivered` = '$current_date' WHERE `order_id` = $order_id;";
          performQuery($date);

        }else{
         echo "Failed";
        }

        echo "<script>alert('Customer has been notified succesfully!')</script>";
        echo "<script>window.open('index2.php','_self')</script>";

  
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>BAYONG | View Order</title>
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
                      <h4>
                      <i class="fas fa-shopping-basket"></i>
                      Orders List</h4>
                   <center>
                       <a href="index2.php" class="btn btn-sm btn-primary" style="width: 200px">Return</a>
                       </center></div>
                     
                    <div class="card-body">
                      <div class="table-responsive">

                <?php
                                     
                  $query = "SELECT * FROM `order_details` WHERE `user_id` = '$user_id' && `order_id` = '$order_id'";
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

                                $query3=mysqli_query($dbconn,"SELECT * FROM `order` WHERE `order_id`='$order_id' && `status`='Pending'") or die (mysqli_error());
                                $row3=mysqli_fetch_array($query3);


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
                              <td><br><?php echo $row3['status'];?></td>     
                              <!-- <td><br><?php echo $row3['firstname'];?> <?php echo $row3['middlename'];?> <?php echo $row3['lastname'];?></td>    -->                        
                            
                            <?php 
                          echo "</tr>"; 
                        }
                       }?>

                          </tbody>
                        </table>
                      <hr>
                      </div>
                      <br>
                      <div class="row" style="margin-left: 50px">
                        <h3>Ordered By: </h3> <u style="margin-left: 10px; font-size: 20px;"><?php echo $row3['firstname'];?> <?php echo $row3['middlename'];?><?php echo $row3['lastname'];?></u>
                      </div>
                      <div class="row" style="margin-left: 50px">
                        <h3>Shipping Address: </h3> <u style="margin-left: 10px; font-size: 20px;"><?php echo $row3['shipping_add'];?></u>
                      </div>
                      <div class="row" style="margin-left: 50px">
                        <h3>Email Address: </h3> <u style="margin-left: 10px; font-size: 20px;"><?php echo $row3['email'];?></u>
                      </div>
                      <div class="row" style="margin-left: 50px">
                        <h3>Contact Number: </h3> <u style="margin-left: 10px; font-size: 20px;"><?php echo $row3['contact'];?></u>
                      </div>

                      <div class="row" style="margin-left: 50px">
                        <h3>Total Payment to be Collected: </h3> <u style="margin-left: 10px; font-size: 20px;">&#8369;<?php echo $row3['totalprice'];?></u>
                      </div>

                      <br>
                      <center>
                       <!--  <a style="color: white" href="productPacking.php" class="btn btn-warning btn-round">
                           Package Order
                        </a>  -->
                        <button type="button" class="btn btn-warning btn-round mb-1" data-toggle="modal" data-target="#mediumModal">
                         Package Order
                        </button>

                        <button type="button" class="btn btn-danger btn-round mb-1" data-toggle="modal" data-target="#mediumModal2">
                         Cancel Order
                        </button>
                       <!--  <a style="color: white" href="productShipping.php" class="btn btn-info btn-round">
                           Shipping
                        </a> 
                        <a style="color: white" href="productDelivered.php" class="btn btn-success btn-round">
                           Delivered
                        </a> -->
                     </center>
              
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

    <!-- modal medium -->
            <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Send Notification to Customer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
        
        <form id="orders" action="viewOrder.php?order_id=<?php echo $order_id ?>&&user_id=<?php echo $user_id?>" method="post">

            <center>
              <span><b>Package Order</b></span>
            </center>

            <div class="row" hidden>
              <div class="col-6">
                <div class="form-group validate">
                 <label for="inputBlock" class="control-label mb-1">User ID</label>
                 <input name="user_id" id="inputBlock" type="text" class="form-control" value="<?php echo $user_id?>">
                </div>
              </div>
             </div>

             <div class="row" hidden>
              <div class="col-6">
                <div class="form-group validate">
                 <label for="inputBlock" class="control-label mb-1">Order ID</label>
                 <input name="order_id" id="inputBlock" type="text" class="form-control" value="<?php echo $order_id?>">
                </div>
              </div>
             </div>
                      
                           <?php
                            include('../config/dbconn.php');
                            $query=mysqli_query($dbconn,"SELECT * FROM `admin` WHERE user_id='".$_SESSION['id']."'");
                            $row=mysqli_fetch_array($query);
                            ?>

             <div class="row" hidden>
              <div class="col-6">
                <div class="form-group validate">
                 <label for="dasdasd" class="control-label mb-1">Sender Name</label>
                 <input name="sender_name" id="dasdasd" type="text" class="form-control" value="(Admin) <?php echo $row['firstname']?> <?php echo $row['lastname']?>">
                </div>
              </div>
             </div>

          <div class="form-group validate">
                <label for="textArea" class="control-label mb-1">Message</label>
                 <textarea name="message" id="textarea-input" rows="9" placeholder="Input Message Here... (Ex. Your order is now being packaged!)" class="form-control" required="required"></textarea>
           </div>


             <div>
                <button  class="btn btn-success btn-block" type="submit" name="packageBtn">Send</button>
              </div>
              <div style="margin-top: 10px;">
                <a class="btn btn-block btn-secondary" href="index2.php">Cancel</a>
              </div>
    
        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal medium -->


              <!-- modal medium -->
            <div class="modal fade" id="mediumModal2" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel">Send Notification to Customer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
        
        <form id="orders" action="viewOrder.php?order_id=<?php echo $order_id ?>&&user_id=<?php echo $user_id?>" method="post">

            <center>
              <span><b>Cancel Order</b></span>
            </center>

            <div class="row" hidden>
              <div class="col-6">
                <div class="form-group validate">
                 <label for="inputBlock" class="control-label mb-1">User ID</label>
                 <input name="user_id" id="inputBlock" type="text" class="form-control" value="<?php echo $user_id?>">
                </div>
              </div>
             </div>

             <div class="row" hidden>
              <div class="col-6">
                <div class="form-group validate">
                 <label for="inputBlock" class="control-label mb-1">Order ID</label>
                 <input name="order_id" id="inputBlock" type="text" class="form-control" value="<?php echo $order_id?>">
                </div>
              </div>
             </div>
                      
                           <?php
                            include('../config/dbconn.php');
                            $query=mysqli_query($dbconn,"SELECT * FROM `admin` WHERE user_id='".$_SESSION['id']."'");
                            $row=mysqli_fetch_array($query);
                            ?>

             <div class="row" hidden>
              <div class="col-6">
                <div class="form-group validate">
                 <label for="dasdasd" class="control-label mb-1">Sender Name</label>
                 <input name="sender_name" id="dasdasd" type="text" class="form-control" value="(Admin) <?php echo $row['firstname']?> <?php echo $row['lastname']?>">
                </div>
              </div>
             </div>

          <div class="form-group validate">
                <label for="textArea" class="control-label mb-1">Message</label>
                 <textarea name="message" id="textarea-input" rows="9" placeholder="Input Message Here... (Ex. Your order has been canceled!)" class="form-control" required="required"></textarea>
           </div>


             <div>
                <button  class="btn btn-success btn-block" type="submit" name="cancelOrder">Send</button>
              </div>
              <div style="margin-top: 10px;">
                <a class="btn btn-block btn-secondary" href="index2.php">Cancel</a>
              </div>
    
        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal medium -->


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
