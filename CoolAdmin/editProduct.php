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
if(isset($_POST['update']))
{   
    $id = mysqli_real_escape_string($dbconn, $_POST['prod_id']);
    $prod_name = mysqli_real_escape_string($dbconn, $_POST['prod_name']);
    $prod_desc = mysqli_real_escape_string($dbconn, $_POST['prod_desc']);
    $prod_qty = mysqli_real_escape_string($dbconn, $_POST['prod_qty']);
    $prod_cost = mysqli_real_escape_string($dbconn, $_POST['prod_cost']); 
    $prod_price = mysqli_real_escape_string($dbconn, $_POST['prod_price']); 
    $category = mysqli_real_escape_string($dbconn, $_POST['category']); 
    $supplier = mysqli_real_escape_string($dbconn, $_POST['supplier']);
    $prod_serial = mysqli_real_escape_string($dbconn, $_POST['prod_serial']);

    // checking empty fields
    if(empty($prod_name) || empty($prod_desc) || empty($prod_cost) || empty($prod_price) || empty($supplier) || empty($category) || empty($prod_serial)) {    
            
        if(empty($prod_name)) {
            echo "<font color='red'>Product name field is empty!</font><br/>";
        }
        
        if(empty($prod_desc)) {
            echo "<font color='red'>Product description field is empty!</font><br/>";
        }

        if(empty($prod_cost)) {
            echo "<font color='red'>Product cost field is empty!</font><br/>";
        }
        
        if(empty($prod_price)) {
            echo "<font color='red'>Product price field is empty!</font><br/>";
        }    

        if(empty($supplier)) {
            echo "<font color='red'>Supplier field is empty!</font><br/>";
        }  

        if(empty($category)) {
            echo "<font color='red'>Category field is empty!</font><br/>";
        }  

        if(empty($prod_serial)) {
            echo "<font color='red'>Serial number field is empty!</font><br/>";
        } 
       
    } else {    





        //updating the table
        $query = "UPDATE products SET prod_name='$prod_name',prod_desc='$prod_desc',prod_qty='$prod_qty',prod_cost='$prod_cost',prod_price='$prod_price',
                supplier='$supplier',category='$category',prod_serial='$prod_serial' WHERE prod_id=$id";
        $result = mysqli_query($dbconn,$query);
        
        if($result){
            //redirecting to the display page. In our case, it is index.php
            echo "<script>alert('Product Successfully Updated!')</script>";
            echo "<script>window.open('products.php','_self')</script>";
        }
        
    }
}
?>






<?php
//getting id from url
$id=isset($_GET['prod_id']) ? $_GET['prod_id'] : die('ERROR: Record ID not found.');
//selecting data associated with this particular id
$result = mysqli_query($dbconn, "SELECT * FROM products WHERE prod_id=$id");
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
    <title>BAYONG | Edit Product</title>
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
                         <h4>Edit Product</h4>
                      </div>

                    <div class="login-form">
   <form action="editProduct.php" method="post">
        <div class="form group">
            <input type="hidden" class="form-control" id="prod_id" name="prod_id" value=<?php echo $_GET['prod_id'];?>>
            <label for="prod_name">Serial number:</label>
            <input type="text" class="form-control" id="prod_serial" name="prod_serial" value="<?php echo $prod_serial;?>">
            <br>
            <label for="prod_name">Product Name:</label>
            <input type="text" class="form-control" id="prod_name" name="prod_name" value="<?php echo $prod_name;?>"><br>
            <label for="prod_desc">Product Description:</label>
            <input type="text" class="form-control" id="prod_desc" name="prod_desc" value="<?php echo $prod_desc;?>"><br>
            <label for="prod_cost">Product Cost (Php):</label>
            <input type="text" class="form-control" id="prod_cost" name="prod_cost" value="<?php echo $prod_cost;?>"><br>
            <label for="prod_price">Product Price (Php):</label>
            <input type="text" class="form-control" id="prod_price" name="prod_price" value="<?php echo $prod_price;?>"><br>
            


                    <div class="form-group">
                        <label for="supp_name">Supplier:</label>
                        <div class="input-group">
                            <select class="form-control" id="supplier" name="supplier" required>
                              <?php
                              include('../config/dbconn.php');
                              $query=mysqli_query($dbconn,"SELECT supp_name FROM supplier ORDER BY supp_name ASC")or die(mysqli_error());
                              while($row=mysqli_fetch_array($query)){
                                  ?>
                                <option value="<?php echo $row['supp_name'];?>"><?php echo $row['supp_name'];?></option>
                                <?php }?>
                            </select>
                        </div>
                        <br>
                        <label for="category">Category:</label>
                        <div class="input-group">
                            <select class="form-control" id="category" name="category" required>
                              <?php
                              include('../config/dbconn.php');
                              $query=mysqli_query($dbconn,"SELECT cat_name FROM category ORDER BY cat_name ASC")or die(mysqli_error());
                              while($row=mysqli_fetch_array($query)){
                              ?>
                                <option value="<?php echo $row['cat_name'];?>"><?php echo $row['cat_name'];?></option>
                                <?php }?>
                            </select>
                        </div>

                        <br>

            <label for="prod_qty">Quantity:</label>
            <input type="text" class="form-control" id="prod_qty" name="prod_qty" value="<?php echo $prod_qty;?>">

                     <!--    <label for="prod_qty" id="prod_qty" name="prod_qty">Available Quantity: &nbsp &nbsp <?php echo $prod_qty;?> Pcs.</label> -->
                    </div>
                </div>            
             </div>
                         <br>
                         <center>
            <div class="form group">
                <button type="submit" class="btn btn-success btn-round" id="submit" name="update">
                    <i class="now-ui-icons ui-1_check"></i> Update Product
                </button>
            </div>
            </center>
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
