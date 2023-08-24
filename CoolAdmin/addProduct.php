<?php

  include('functions/functions.php');
  include('../config/dbconn.php');

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
                         <h4>Add Product</h4>
                      </div>
<center>
                      <?php
// including the database connection file
include("../config/dbconn.php");
if(isset($_POST['submit'])){

    $prod_name=$_POST['prod_name'];
    $prod_desc=$_POST['prod_desc'];
    $prod_qty=$_POST['prod_qty'];
    $prod_cost=$_POST['prod_cost'];
    $prod_price=$_POST['prod_price'];
    $category=$_POST['category'];
    $supplier=$_POST['supplier'];
    $prod_serial=$_POST['prod_serial'];

    move_uploaded_file($_FILES["prod_pic1"]["tmp_name"],"../uploads/" . $_FILES["prod_pic1"]["name"]);         
    $prod_pic1=$_FILES["prod_pic1"]["name"];
    move_uploaded_file($_FILES["prod_pic2"]["tmp_name"],"../uploads/" . $_FILES["prod_pic2"]["name"]);         
    $prod_pic2=$_FILES["prod_pic2"]["name"];
    move_uploaded_file($_FILES["prod_pic3"]["tmp_name"],"../uploads/" . $_FILES["prod_pic3"]["name"]);         
    $prod_pic3=$_FILES["prod_pic3"]["name"];

     // checking empty fields
    if(empty($prod_name) || empty($prod_desc) || empty($prod_qty) || empty($prod_cost) || empty($prod_price) || empty($category) 
        || empty($supplier) || empty($prod_serial) || empty($prod_pic1) || empty($prod_pic2) || empty($prod_pic3)){    
            
        if(empty($prod_name)) {
            echo "<font color='red'>Product name field is empty!</font><br/>";
        }
        
        if(empty($prod_desc)) {
            echo "<font color='red'>Product description field is empty!</font><br/>";
        }

        if(empty($prod_qty)) {
            echo "<font color='red'>Quantity field is empty!</font><br/>";
        }   

        if(empty($prod_price)) {
            echo "<font color='red'>Product price field is empty!</font><br/>";
        }   

        if(empty($category)) {
            echo "<font color='red'>Category field is empty!</font><br/>";
        }  

        if(empty($supplier)) {
            echo "<font color='red'>Supplier field is empty!</font><br/>";
        } 

        if(empty($prod_serial)) {
            echo "<font color='red'>Serial field is empty!</font><br/>";
        }

        if(empty($prod_pic1)) {
            echo "<font color='red'>Picture1 field is empty!</font><br/>";
        }

        if(empty($prod_pic2)) {
            echo "<font color='red'>Picture2 field is empty!</font><br/>";
        }

        if(empty($prod_pic3)) {
            echo "<font color='red'>Picture3 field is empty!</font><br/>";
        }

    } else {    

        $query = "INSERT INTO products (prod_name, prod_desc, prod_qty, prod_cost, prod_price, category, supplier, prod_serial, prod_pic1, prod_pic2, prod_pic3) 
        VALUES ('$prod_name','$prod_desc','$prod_qty','$prod_cost','$prod_price','$category','$supplier','$prod_serial','$prod_pic1','$prod_pic2','$prod_pic3')";  

        $result = mysqli_query($dbconn,$query);
            
        if($result){
            
            $prod_name = $_POST['prod_name'];
            $prod_qty = $_POST['prod_qty'];
            
            date_default_timezone_set('Asia/Manila');

            $date = date("Y-m-d H:i:s");
            $id=$_SESSION['id'];
            
            $query=mysqli_query($dbconn,"SELECT prod_name FROM products WHERE prod_id='$prod_name'")or die(mysqli_error());
          
                $row=mysqli_fetch_array($query);
                $product=$row['prod_name'];
                $remarks="added a new product $prod_qty of $prod_name";  
            
                mysqli_query($dbconn,"INSERT INTO logs (user_id,action,date) VALUES ('$id','$remarks','$date')")or die(mysqli_error($dbconn));

        //redirecting to the display page.
        // header("Location:products.php");
            echo "<script>alert('Product Successfully Added!')</script>";
            echo "<script>window.open('products.php','_self')</script>";
        }
        
    }
}

?>
</center>
                    <div class="login-form">
  <form action="" method="post" enctype="multipart/form-data">
                <div class="form group">
                    <label for="prod_name">Product Name:</label>
                    <input type="text" class="form-control" id="prod_name" name="prod_name" placeholder="Enter Product Name"/>
                    <br>
                    <label for="prod_desc">Product Description:</label>
                    <input type="text" class="form-control" id="prod_desc" name="prod_desc" placeholder="Enter Product Description"/>
                    <br>
                    <label for="prod_cost">Product Cost (Php):</label>
                    <input type="text" class="form-control" id="prod_cost" name="prod_cost" placeholder="Value e.g. 123.4"/>
                    <br>
                    <label for="prod_price">Product Price (Php):</label>
                    <input type="text" class="form-control" id="prod_price" name="prod_price" placeholder="Value e.g. 123.4"/>
                    <br>
                    <label for="prod_qty">Quantity:</label>
                    <input type="text" class="form-control" id="prod_qty" name="prod_qty" placeholder="Value e.g. 123"/>
                    <br>

                    <div class="form-group">
                        <label for="supplier">Supplier:</label>
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

                        
                        <label for="prod_pic1">Picture 1 (Front View):</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="prod_pic1" name="prod_pic1">  
                        </div>
                        <br>
                        <label for="prod_pic2">Picture 2 (Side View):</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="prod_pic2" name="prod_pic2">  
                        </div>
                        <br>
                        <label for="prod_pic3">Picture 3 (Specifications):</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="prod_pic3" name="prod_pic3">  
                        </div>
                        <br>

                    </div>

                    <label for="prod_serial">Serial:</label>
                    <input type="text" class="form-control" id="prod_serial" name="prod_serial" placeholder="Value e.g. 1234"/>

                </div>
                <br>
                <center>
                <div class="form group">
                    <button type="submit" class="btn btn-success btn-round" id="submit" name="submit">
                    <i class="now-ui-icons ui-1_check"></i> Add Product
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
