<?php

  include('functions/functions.php');
  include('../config/dbconn.php');

  // $prod_id = $_GET['prod_id'];

    session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:admin_login_page.php');
        exit();
    }
?>



            




<?php
    //getting id from url
    $prod_id=isset($_GET['prod_id']) ? $_GET['prod_id'] : die('ERROR: Record ID not found.');
    //selecting data associated with this particular id
    $result = mysqli_query($dbconn, "SELECT * FROM products WHERE prod_id=$prod_id");
        while($res = mysqli_fetch_array($result))
        {
            $prod_name = $res['prod_name'];
            $prod_desc = $res['prod_desc'];
            $prod_qty = $res['prod_qty'];
            $prod_cost = $res['prod_cost'];
            $prod_price = $res['prod_price'];
            $category = $res['category'];
            $supplier = $res['supplier'];
            $prod_serial = $res['prod_serial'];
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>BAYONG | Add Quantity</title>
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
                         <a href="products.php" class="btn btn-sm btn-primary">Return</a>

                         <br>
                         <br>
                         <h4>Add Quantity</h4>
                      </div>
<center>
                      <?php
// including the database connection file
include("../config/dbconn.php");
if(isset($_POST['submit']))
{   
    $prod_id = mysqli_real_escape_string($dbconn, $_POST['prod_id']);

    // $prod_name=$_POST['prod_name'];
    // $prod_desc=$_POST['prod_desc'];
    $prod_qty=$_POST['prod_qty'];
    // $prod_cost=$_POST['prod_cost'];
    // $prod_price=$_POST['prod_price'];
    // $category=$_POST['category'];
    // $supplier=$_POST['supplier'];
    // $prod_serial=$_POST['prod_serial'];
    // checking empty field
   
        if(empty($prod_qty)) {
            echo "<font color='red'>Product Quantity field is empty!</font><br/>";
        
        } else {    

        //updating the table
        $query = "UPDATE products SET prod_qty=prod_qty+'$prod_qty' WHERE prod_id=$prod_id";

        $result = mysqli_query($dbconn,$query);
       
       if($result){
            
            $prod_name = $_POST['prod_name'];
            $prod_qty = $_POST['prod_qty'];
            
            date_default_timezone_set('Asia/Manila');

            $date = date("Y-m-d H:i:s");
            $id=$_SESSION['id'];
            
            $query=mysqli_query($dbconn,"SELECT * FROM products WHERE prod_id='$prod_id'")or die(mysqli_error());
          
                while($res=mysqli_fetch_array($query)){
                $prod_name=$res['prod_name'];
                $remarks="added $prod_qty of $prod_name";  
            }
                mysqli_query($dbconn,"INSERT INTO logs (user_id,action,date) VALUES ('$id','$remarks','$date')")or die(mysqli_error($dbconn));

        //redirecting to the display page.
        // header("Location: addQty.php");

        echo "<script>alert('Quantity Has Been Updated Successfully!')</script>";
        echo "<script>window.open('products.php','_self')</script>";

        }
        
    }
}
?>
</center><br>

                    <div class="login-form">
    <form action="addQty.php?prod_id=<?php echo $_GET['prod_id'];?>" method="post">

    <?php
        $query=mysqli_query($dbconn,"SELECT * FROM products WHERE prod_id='".$_GET['prod_id']."'")or die(mysqli_error());
        while($row=mysqli_fetch_array($query)){
    ?>
            <img width="150" height="100" src="../uploads/<?php echo $row['prod_pic1'];?>" alt=""/>
            <img width="150" height="100" src="../uploads/<?php echo $row['prod_pic2'];?>" alt=""/>
            <img width="150" height="100" src="../uploads/<?php echo $row['prod_pic3'];?>" alt=""/>
  <?php } ?>

        <div class="form group">
            <input type="hidden" class="form-control" id="prod_id" name="prod_id" value=<?php echo $_GET['prod_id'];?>>
            <br>
            <label for="prod_name" id="prod_name" name="prod_name">Product Name: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo $prod_name;?></label><br><br>
            <label for="prod_serial">Product Serial: &nbsp &nbsp &nbsp <?php echo $prod_serial;?></label><br><br>
            <label for="prod_name">Name: &nbsp &nbsp &nbsp <?php echo $prod_name;?></label><br><br>
            <label for="prod_desc">Description: &nbsp &nbsp &nbsp <?php echo $prod_desc;?></label><br><br>
            <label for="prod_price">Product Cost (Php): &nbsp &nbsp &nbsp &nbsp <?php echo $prod_price;?></label><br><br>
            <label for="category">Product Supplier: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo $category;?></label><br><br>
            <label for="supplier">Product Category: &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo $supplier;?></label><br><br>
            <label for="qty">Available Quantity: &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo $prod_qty;?></label><br><br>
            <label for="prod_qty">Number of Quantity/Volume to be added:</label>
            <input type="text" class="form-control" id="prod_qty" name="prod_qty" placeholder="Value e.g. 1234">
        </div>
        <br/>
        <center>
        <div class="form group">
            <button type="submit" class="btn btn-success btn-round" id="submit" name="submit">
            <i class="now-ui-icons ui-1_check"></i> Add Quantity
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
