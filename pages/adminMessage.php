<?php

  include('../CoolAdmin/functions/functions.php');
  include('../config/dbconn.php');

  $msg_id = $_GET['msg_id'];
  $user_id = $_GET['user_id'];

  $read ="UPDATE `msg` SET `status` = 'read' WHERE `msg_id` = $msg_id;";
  performQuery($read);

    session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:admin_login_page.php');
        exit();
    }

if(isset($_POST['customerMsgReply'])){

    $user_id = $_POST['user_id'];
    $sender_name = $_POST['sender_name'];
    $message = $_POST['message'];

        $query = "INSERT INTO `msg` (`user_id`, `sender_name`, `date_sent`, `message`, `status`, `order_status`, `user_type`)VALUES('$user_id', '$sender_name', CURRENT_TIMESTAMP, '$message', 'unread', '', 'customer')";
        $query_run = mysqli_query($dbconn, $query);

        echo "<script>alert('Message has been sent!')</script>";
        echo "<script>window.open('user_index.php','_self')</script>";
  
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>BAYONG | Admin Message</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!-- Fontfaces CSS-->
    <link href="../CoolAdmin/css/font-face.css" rel="stylesheet" media="all">
    <link href="../CoolAdmin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../CoolAdmin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../CoolAdmin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../CoolAdmin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../CoolAdmin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../CoolAdmin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../CoolAdmin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../CoolAdmin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../CoolAdmin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../CoolAdmin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../CoolAdmin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="../CoolAdmin/vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../CoolAdmin/css/theme.css" rel="stylesheet" media="all">
    <link href="../CoolAdmin/css/badge.css" rel="stylesheet" media="all">

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
                         <a href="user_index.php" class="btn btn-sm btn-primary">Return</a>

                         <br>
                         <br>
                         <h4>Admin Message</h4>
                      </div>

                    <div class="login-form">

    <?php
          $query=mysqli_query($dbconn,"SELECT * FROM msg WHERE msg_id='".$msg_id."'")or die(mysqli_error());
                  while($row=mysqli_fetch_array($query)){
      ?>

    <form id="messageForm" action="adminMessage.php?msg_id=<?php echo $msg_id ?>&&user_id=<?php echo $user_id?>" method="post">
      

            <div class="form-group" hidden="hidden">
                <label for="sadsa" class="control-label mb-1">User ID</label>
                <input id="sadsa" name="user_id" type="text" class="form-control" value="<?php echo $row['user_id']; ?>" readonly>
            </div>

          <?php
          $query=mysqli_query($dbconn,"SELECT * FROM users WHERE user_id='".$user_id."'")or die(mysqli_error());
                  while($row2=mysqli_fetch_array($query)){
      ?>                     
            <div class="form-group" hidden="hidden">
                <label for="locId" class="control-label mb-1">Sender:</label>
                <input id="locId" name="sender_name" type="text" class="form-control" value="<?php echo $row2['firstname']; ?> <?php echo $row2['middlename']; ?> <?php echo $row2['lastname']; ?>" readonly>
            </div>

          <?php }?>
             <div class="form-group">
                <label for="locId" class="control-label mb-1">From:</label>
                <input id="locId" name="asddas" type="text" class="form-control" value="<?php echo $row['sender_name']; ?>" readonly>
            </div>

             <div class="recei-mess-list" style="margin-bottom: 10px;">
              <h5>Message:</h5>
                <center>
                  <div class="recei-mess"><?php echo $row['message']; ?></div>
                </center>
              </div>

          <?php }?>


              <div class="form-group validate">
                <label for="textArea" class="control-label mb-1"><h5>Reply:</h5></label>
                 <textarea name="message" id="textarea-input" rows="9" placeholder="Input Reply Here..." class="form-control" required="required"></textarea>
              </div>

              <div>
                <button  class="btn btn-success btn-block" type="submit" name="customerMsgReply">Send Reply</button>
              </div>


          
              <div style="margin-top: 10px;">
                <a class="btn btn-block btn-secondary" href="index2.php">Cancel</a>
              </div>
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
    <script src="../CoolAdmin/vendor/jquery-3.2.1.min.js"></script>
     <!-- validators -->
    <script src="../assets/vendor/jquery/jquery.validator.js"></script>
    <script src="../assets/vendor/jquery/additional-methods.min.js"></script>
    <!-- !validators -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery/formreservation2.js"></script>
    <!-- Bootstrap JS-->
    <script src="../CoolAdmin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../CoolAdmin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../CoolAdmin/vendor/slick/slick.min.js">
    </script>
    <script src="../CoolAdmin/vendor/wow/wow.min.js"></script>
    <script src="../CoolAdmin/vendor/animsition/animsition.min.js"></script>
    <script src="../CoolAdmin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../CoolAdmin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../CoolAdmin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../CoolAdmin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../CoolAdmin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../CoolAdmin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../CoolAdmin/vendor/select2/select2.min.js">
    </script>
    <script src="../CoolAdmin/vendor/vector-map/jquery.vmap.js"></script>
    <script src="../CoolAdmin/vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="../CoolAdmin/vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="../CoolAdmin/vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="../CoolAdmin/js/main.js"></script>

</body>

</html>
<!-- end document-->
