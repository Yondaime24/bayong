<?php
    session_start();
    include('../config/dbconn.php');

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

</head>
<body class="index-page sidebar-collapse">
    <div class="wrapper"><br>
        <div class="main">
            <div class="section section-basic">
                <div class="container">
                      <h2>My Order History</h2>
                      <a class="btn btn-primary btn-round" href="user_index.php"><i class="now-ui-icons arrows-1_minimal-left"></i> &nbsp Back to index</a>
                      <hr color="orange"> 
                
                <div class="col-md-12">
                <br>
            
                <div class="panel panel-success panel-size-custom">
                        <div class="panel-body">


                <?php
                                     
                  $query = "SELECT * FROM order_details WHERE user_id = '".$_SESSION['id']."'";
                  $result = mysqli_query($dbconn,$query);

                ?>  



  <table class="table table-condensed table-bordered">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
                  <th width="100">Quantity</th>
                  <th width="100">Price(Php)</th>
                  <th width="100">Total(Php)</th>
                  <th width="100">Date Ordered</th>
                  <th width="100">Status</th>
                  <th width="100">Option</th>
                </tr>
              </thead>

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

                        if (empty($res['order_id'])) {
                            echo "";
                        }else{
                          echo "<tr>"
                            ?>
                        
                              <td> <img width="150" height="100" src="../uploads/<?php echo $row2['prod_pic1'];?>" alt=""/></td>
                              <td><b><?php echo $row2['prod_name'];?></b><br><br>
                                <?php echo $row2['prod_desc'];
                                ?>
                              </td>
                              <td><br><?php  echo $res['prod_qty']; ?></td>
                              <td><br><?php  echo $row2['prod_price']; ?></td>
                              <td><br><?php echo $res['total'];?></td>
                              <td><br><?php echo date('F j, Y / g:i a',strtotime($row3['order_date']));?></td>



                           <?php 
                       echo "";
                       if ($row3['status'] == 'Shipping') {
                         echo " <td><br><span style=\"background: #3498db; color: white\">".$row3['status']."</span></td> ";
                       }else if ($row3['status'] == 'Delivered') {
                          echo " <td><br><span style=\"background: #2ecc71; color: white\">".$row3['status']."</span></td> ";
                       }else if ($row3['status'] == 'Packaged') {
                         echo " <td><br><span style=\"background: orange; color: white\">".$row3['status']."</span></td> ";
                       }else if ($row3['status'] == 'Canceled') {
                          echo " <td><br><span style=\"background: red; color: white\">".$row3['status']."</span></td> ";
                       }else if ($row3['status'] == 'Pending') {
                          echo " <td><br><span>".$row3['status']."</span></td> ";
                       }
                       ?>



                               <td><br><a class="btn btn-sm btn-info btn-block" href="viewOrder.php?order_id=<?php echo $res['order_id'] ?>&&user_id=<?php echo $res['user_id'] ?>">View</a></td>
                            <?php 
                          echo "</tr>"; 

                          }

                        }
                       }?>


<!-- <?php
  $query3=mysqli_query($dbconn,"SELECT * FROM order WHERE order_id='$order_id'")or die(mysqli_error());
  while($row3=mysqli_fetch_array($query3)){
?>
                   <td><br><?php echo $row3['order_date'];?></td>

<?php }?>  -->

               
              </tr>
        
              <tr>
                  <td></td>
                  <td></td>
                  <td colspan="2" align="right"><b>Total Price</b></td>
                  <td class="label label-important"> <strong>
                     <?php
                      $result5 = mysqli_query($dbconn,"SELECT sum(total) FROM order_details WHERE user_id='$user_id' and order_id='1'");
                      while($row5 = mysqli_fetch_array($result5))
                        { 
                        echo 'Php'.$row5['sum(total)'];
                        echo '<input type="hidden" name="total" value="'.$row5['sum(total)'].'">';
                        }
                      ?></strong>
                  </td>
                  <td></td>
              </tr>

              </tbody>
          </table>
    












                        </div>
                    </div> 
                </div>
            </div>
        </div>
<br><br><br><br>
<footer class="footer" data-background-color="black">
            <div class="container">
                <nav>
                    <ul>
                        <li>
                            <a href="" target="_blank">
                                Creative and Design
                            </a>
                        </li>
                        <li>
                            
                        </li>
                    </ul>
                </nav>
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Designed by Layca Sequina
                </div>
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
        $("#tbl").DataTable({
        });
      });
    </script>
     <!--  inserted  -->

</html>