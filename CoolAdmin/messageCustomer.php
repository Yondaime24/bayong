<?php

  include('functions/functions.php');
  include('../config/dbconn.php');

    session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:admin_login_page.php');
        exit();
    }


// including the database connection file
include("../config/dbconn.php");
if(isset($_POST['submit'])){

    $user_id = $_GET['user_id'];
    // $order_id = $_POST['order_id'];
    $sender_name = $_POST['sender_name'];
    $message = $_POST['message'];


        $query = "INSERT INTO `msg` (`user_id`, `sender_name`, `date_sent`, `message`, `status`, `user_type`)VALUES('$user_id', '$sender_name', CURRENT_TIMESTAMP, '$message', 'unread', 'admin')";
        $query_run = mysqli_query($dbconn, $query);

        echo "<script>alert('Message has been sent successfully!')</script>";
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
    <title>BAYONG | Add Product</title>
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

    <style>
      .error{
        color: red;
        font-style: italic;
      }
    </style>

</head>

<body class="animsition">
  <div class="page-wrapper">
              <div class="login-wrap">
                  <div class="login-content">
                      <div class="login-logo">
                        <a href="" style="pointer-events: none">
                         <!--  <img class="image" src="../assets/img/blurred-image-1.jpg" width="50px"> -->
                          <h4>Bayong</h4>
                          <br>

                        </a>
                        <br>
                         <a href="index2.php" class="btn btn-sm btn-primary">Return</a>

                         <br>
                         <br>
                         <h4>Message Customer</h4>
                      </div>
                    <div class="login-form">
  <form action="messageCustomer.php?user_id=<?php echo $_GET['user_id'] ?>" method="post" enctype="multipart/form-data">
 

    <?php
        $query=mysqli_query($dbconn,"SELECT * FROM users WHERE user_id='".$_GET['user_id']."'")or die(mysqli_error());
        while($row=mysqli_fetch_array($query)){
    ?>

                <div class="form group">
                  <label for="prod_name">Customer Name:</label>
                    <input type="text" class="form-control" id="prod_name" value="<?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?>" disabled/>
                    <br>
                </div>

                  <div class="form group" hidden="hidden">
                  <label for="prod_name">User ID:</label>
                    <input type="text" class="form-control" name="user_id" value="<?php echo $row['user_id'] ?>" disabled/>
                    <br>
                </div>


           
  <?php } ?>

    <?php
        $query=mysqli_query($dbconn,"SELECT * FROM admin WHERE user_id='".$_SESSION['id']."'")or die(mysqli_error());
        while($row=mysqli_fetch_array($query)){
    ?>

             <div class="row" hidden="hidden">
              <div class="col-6">
                <div class="form-group validate">
                 <label for="dasdasd" class="control-label mb-1">Sender Name</label>
                 <input name="sender_name" id="dasdasd" type="text" class="form-control" value="(Admin) <?php echo $row['firstname']?> <?php echo $row['lastname']?>">
                </div>
              </div>
             </div>
    <?php } ?>


            <div class="form-group validate">
                <label for="textArea" class="control-label mb-1">Message</label>
                 <textarea name="message" id="textarea-input" rows="9" placeholder="Input Message Here..." class="form-control" required="required"></textarea>
           </div>

             
                <br>
                <center>
                <div class="form group">
                    <button type="submit" class="btn btn-success btn-round" id="submit" name="submit">
                    <i class="now-ui-icons ui-1_check"></i> Send Message
                    </button>
                </div>
                </center>
            </form>
 
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

</body>

</html>
<!-- end document-->
