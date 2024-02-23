<?php
session_start();
include('../includes/connect.php');
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $select_data="Select * from `user_orders` where order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $amt=$row_fetch['amount_due'];

    
}
if(isset($_POST['amt']) && isset($_POST['name'])){
    $order_id=$_POST['order_id'];
    $amt=$_POST['amt'];
    $name=$_POST['name'];
    $payment_status="pending";
    $added_on=date('Y-m-d h:i:s');
    
    // Insert payment details into the payment table
    mysqli_query($con,"INSERT INTO payment(order_id,name, amount, payment_status, added_on) VALUES ('$order_id','$name', '$amt', '$payment_status', '$added_on')");
    
    // Get the ID of the inserted payment record
    $_SESSION['OID'] = mysqli_insert_id($con);
}

if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $payment_id=$_POST['payment_id'];
    
    // Update payment status and payment ID in the payment table
    mysqli_query($con,"UPDATE payment SET payment_status='complete', payment_id='$payment_id' WHERE id='".$_SESSION['OID']."'");
    
    // Update order status in the user_orders table
    $update_orders="update `user_orders` set order_status='Complete' where order_id=$order_id";
    $result_orders=mysqli_query($con,$update_orders);
}
?>