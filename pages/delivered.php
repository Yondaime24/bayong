<?php
    
    include('../CoolAdmin/functions/functions.php');
    include('../config/dbconn.php');

    $order_id = $_GET['order_id'];
    
    $todayDate2 = new DateTime();
    $current_date = $todayDate2->format('Y-m-d H:i:s');

    $query="UPDATE `order` SET `status`='Delivered' WHERE order_id='$order_id'";
    $query_run = mysqli_query($dbconn, $query);

    $query2 ="UPDATE `order` SET `date_delivered` = '$current_date' WHERE `order_id` = $order_id;";
    performQuery($query2);
   
     if ($query_run) {

        echo "<script>alert('Status Has Been Updated Succesfully!')</script>";
        echo "<script>window.open('orders.php','_self')</script>";
            
        }else{

        echo "<script>alert('Failed')</script>".mysqli_error($dbconn);

        }

        mysqli_close($dbconn);
?>