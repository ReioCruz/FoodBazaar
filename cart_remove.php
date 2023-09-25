<?php 
    require 'connection.php';
    session_start();
    $product_id=$_GET ['id'];
    $user_id=$_SESSION['id'];
    $delete_query="DELETE FROM user_items WHERE user_id='$user_id' AND product_id='$product_id'";
    $delete_query_result=mysqli_query($conn, $delete_query) or die(mysqli_error($conn));
    echo "$delete_query";
    header('location:Cart.php');
?>