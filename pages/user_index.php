<?php
    session_start();

      include('../CoolAdmin/functions/functions.php');
      include('../config/dbconn.php');

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:user_login_page.php');
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
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     inserted     -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link href="../assets/js/google-code-prettify/prettify.css" rel="stylesheet"/>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet"/>
    
    <link href="../assets/style.css" rel="stylesheet"/>
    <link href="../pages/notif.css" rel="stylesheet" type="text/css" media="all" />

    <link href="css/badge.css" rel="stylesheet" media="all">
    <link href="css/spanbadge2.css" rel="stylesheet" media="all">
     <link href="css/hover_badge2.css" rel="stylesheet" media="all">

    <!--     inserted     -->
</head>

<body class="index-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate">
                <a href="user_index.php" class="navbar-brand" rel="tooltip" data-placement="bottom" target="">
                    BAYONG WEBSITE
                </a>


          

                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                    <span class="navbar-toggler-bar bar4"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="" onclick="scrollToDownload()">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p>
                                <?php
                                 include('../config/dbconn.php');
                                 $query=mysqli_query($dbconn,"SELECT * FROM `users` WHERE user_id='".$_SESSION['id']."'");
                                 $row=mysqli_fetch_array($query);
                                 echo ''.$row['firstname'].'';
                                ?>
                            </p>
                        </a>
                    </li>
                     <!-- <li class="nav-item">
                        <a href="admin_index.php" class="nav-link" onclick="scrollToDownload()">
                            <i class="now-ui-icons education_paper"></i>
                            <! <p>ADMIN PANEL</p> 
                        </a>-->
                    </li> 
                  <!--   <li class="nav-item">
                        <a class="nav-link" href="user_products.php">
                            <i class="now-ui-icons files_paper"></i>
                            <p>Bayong Products</p>
                        </a>
                    </li> -->
                     <li class="nav-item">
                        <a class="nav-link scroll" href="#products">
                            <i class="now-ui-icons files_paper"></i>
                            <p>Bayong Products</p>
                        </a>
                    </li>
                   <!--  <li class="nav-item">
                        <a class="nav-link" href="user_cart.php" onclick="scrollToDownload()">
                            <i class="now-ui-icons shopping_cart-simple"></i>
                            <p>Shopping Cart</p>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="user_order_history.php" onclick="scrollToDownload()">
                            <i class="now-ui-icons shopping_cart-simple"></i>
                            <p>Order History</p>
                        </a>
                    </li>
                   <!--  <li class="nav-item">
                        <a href="logout.php" class="nav-link" href="" onclick="scrollToDownload()">
                            <i class="now-ui-icons ui-1_lock-circle-open"></i>
                            <p>Logout</p>
                        </a>
                    </li> -->
    <?php 
        $user_id = $_SESSION['id'];

        $query3=mysqli_query($dbconn,"SELECT * FROM order_details WHERE user_id='$user_id' AND order_id=''") or die (mysql_error());
        $count2=mysqli_num_rows($query3);
      ?>

            <div class="w3l_login" style="margin-right: 10px">
                <a href="user_cart.php">
                <span class="glyphicon glyphicon-shopping-cart" style="font-size: 20px; position: absolute; top: 35px; right: 256px;"></span>
                    <?php 

                    if (empty($count2)) {
                        echo "";
                    }else{
                        echo  "<span class=\"badge\" style=\"position: absolute; top: 28px\">$count2</span>";
                    }

                    ?>
                </a>
            </div>

        
        <div class="dropdown" style="position: absolute; right: 175px; top: 30px;">
          <i class="glyphicon glyphicon-envelope" style="font-size: 20px; color: white"></i>
            <?php
              $user_id = $_SESSION['id'];

                $query = "SELECT * FROM `msg` where `user_type` = 'admin' && `status` = 'unread' && `user_id` = '$user_id' order by `date_sent` DESC";
                if(count(fetchAll($query))>0){
            ?>
            <span class="badge"><?php echo count(fetchAll($query)); ?></span>
            <?php
                }
            ?>
          <div class="dropdown-content">
            <div class="scroll2">

            <?php 
               $query = "SELECT * FROM `msg` where `user_type` = 'admin' && `user_id` = '$user_id' order by `date_sent` DESC";
               if(count(fetchAll($query))>0){
                  foreach(fetchAll($query) as $i){
            ?>
           
           <small style="color: black">From: <?php echo $i['sender_name'] ?></small><br/>

            <a style="<?php if($i['status']=='unread'){echo "font-weight:bold;";}?>" href="adminMessage.php?msg_id=<?php echo $i['msg_id'] ?>&&user_id=<?php echo $i['user_id'] ?>">
             
                <?php 
            if($i['status']=='unread'){
                if($i['order_status']==''){
                    echo "<span style=\"color: black\">You Have A New Message</span>";
                }else if($i['order_status']=='Packaged'){
                     echo "<span style=\"color: black\">Your Order Has Been Packaged!</span>";
                }else if($i['order_status']=='Shipping'){
                     echo "<span style=\"color: black\">Your Order is Now Being Shipped!</span>";
                }else if($i['order_status']=='Canceled'){
                     echo "<span style=\"color: black\">Your Order Has Been Canceled!</span>";
                }else if($i['order_status']=='Delivered'){
                     echo "<span style=\"color: black\">Your Order Has Been Delivered!</span>";
                }
            }else{
                if($i['order_status']==''){
                    echo "<span style=\"color: black\">Message Opened</span>";
                }else if($i['order_status']=='Packaged'){
                     echo "<span style=\"color: black\">Your Order Has Been Packaged! (Opened)</span>";
                }else if($i['order_status']=='Shipping'){
                     echo "<span style=\"color: black\">Your Order is Now Being Shipped! (Opened)</span>";
                }else if($i['order_status']=='Canceled'){
                     echo "<span style=\"color: black\">Your Order Has Been Canceled! (Opened)</span>";
                }else if($i['order_status']=='Delivered'){
                     echo "<span style=\"color: black\">Your Order Has Been Delivered! (Opened)</span>";
                }
            }
                  
                ?>

            </a>

            <small style="color: black"><i><?php echo date('F j, Y / g:i a',strtotime($i['date_sent'])) ?></i></small>
            <div class="dropdown-divider"></div>
            <?php 
                  }
                }else{
                  echo "No Messages Yet";
                }

              ?>
          </div>
          </div>
        </div>



            <div class="w3l_login" style="margin-right: 10px;">
                <a href="#" style="cursor: default"></span></a>
            </div>

            <div class="w3l_login">
                <a href="logout.php" onclick="return confirm('Are you sure you want to log-out?')"><span class="glyphicon glyphicon-off" aria-hidden="true" style="font-size: 20px; position: absolute; right: 135px; top: 35px;"></span></a>
            </div>
               
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="page-header clear-filter" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image: url('../assets/img/ban3.jpeg');">
            
                <div class="container">
                    <div class="content-center brand">
                        <img src="../assets/img/ban2.jpeg" alt="Circle Image" class="rounded-circle" style="width: 500px">
                        <br><br>
                        <h3>Bayong Bags Website</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- <br id="products"> -->
        <div class="main" id="products">
            <div class="section section-basic">
                <div class="container">
                    <br>
                    <div class="col-md-12">
                        <br><br>
                        <h2 class="title">Bayong Products</h2>
                       <!--  <div class="typography-line">
                            <p>
                            “The reason it seems that price is all your customers care about is that you haven’t given them anything else to care about.”
                            </p>
                        </div> -->
                        <br>


                       <center>
                        <label><b>Search Product: &nbsp</b></label>       
                                <form method="POST" action="user_index_search.php" >
                                    <input type="image" title="Search" src="../assets/img/search.png" alt="Search" />
                                    <input type="text" name="search" class="search-query" placeholder="Enter product name">
                                </form>
                        </center>
                        <br><br>
                    </div>
                   <!--  <br><hr color="orange"> -->

                      <div class="tab-pane  active" id="">
                        <ul class="thumbnails">
                        <?php
                        $query = "SELECT * FROM products ORDER BY prod_name ASC";
                        $result = mysqli_query($dbconn,$query);
                        while($res = mysqli_fetch_array($result)) {  
                            $prod_id=$res['prod_id'];
                        
                    ?>   
                        <div class="row-sm-3" >
                            <div class="thumbnail" style="margin-left: 90px">
                                <?php if($res['prod_pic1'] != ""): ?>
                                <img src="../uploads/<?php echo $res['prod_pic1']; ?>" width="400px" height="300px">
                                <?php else: ?>
                                <img src="../uploads/default.png" width="400px" height="300px">
                                <?php endif; ?>

                             <h1 style="position: absolute; top: 50px; left: 500px; font-size: 50px"><b><?php echo $res['prod_name'];?></b></h1>
                             <h1 style="position: absolute; top: 120px; left: 500px; font-size: 50px">&#8369; <?php echo $res['prod_price']; ?></h1>

                             <div class="caption" style="position: absolute; top: 220px; left: 500px;">
                              <h6><a class="btn btn-success btn-round" title="Click for more details!" href="user_product_details.php?prod_id=<?php echo $res['prod_id'];?>"><i class="now-ui-icons gestures_tap-01"></i>View</a>
                                </h6>
                            </div>

                            </div>
                          <hr color="orange">
                          </div>
                                 
                    <?php }?> 

                          </ul>
                      </div>


        </div>
    </div>     
</div>
        <footer class="footer" data-background-color="black">
                <div class="text-center">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Designed by Layca Sequina
                </div>
        </footer>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // the body of this function is in assets/js/now-ui-kit.js
        nowuiKit.initSliders();
    });

    function scrollToDownload() {

        if ($('.section-download').length != 0) {
            $("html, body").animate({
                scrollTop: $('.section-download').offset().top
            }, 1000);
        }
    }
</script>



   <!---  inserted  -->
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/google-code-prettify/prettify.js"></script>
    <script src="../assets/js/application.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>
    <script src="../assets/js/bootstrap-affix.js"></script>
    <script src="../assets/js/jquery.lightbox-0.5.js"></script>
    <script src="../assets/js/bootsshoptgl.js"></script>
     <script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();
    });
    </script>

    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../plugins/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../plugins/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable({
        });
      });
    </script>
     <!--  inserted  -->

<!-- 
         <script src="asset/js/move-top.js"></script>
    <script src="asset/js/easing.js"></script> -->
    
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>

</html>