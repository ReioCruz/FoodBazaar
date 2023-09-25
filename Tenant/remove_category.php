<?php 
    require '../connection.php';
    session_start();
    $vendor_id=$_SESSION['id'];
    $delete_query="DELETE FROM product_list WHERE vendor_id='$vendor_id'";
    $delete_query_result=mysqli_query($conn, $delete_query) or die(mysqli_error($conn));
    if($res2==true)
                {
                    $_SESSION['remove'] = "<div class='success'>Order Deleted Successfully.</div>";
                    header('location:'.SITEURL.'Tenant/category.php');
                }
                else
                {
                    //Failed to update
                    $_SESSION['remove'] = "<div class='error'>Failed to Delete Order.</div>";
                    header('location:'.SITEURL.'Tenant/order.php');
                }
?>