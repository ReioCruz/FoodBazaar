<?php 
    require '../connection.php';
    session_start();
    $id=$_GET['id'];
    $delete_query="DELETE FROM order_list WHERE id=$id";
    $delete_query_result=mysqli_query($conn, $delete_query) or die(mysqli_error($conn));

    if($delete_query_result==true)
                {
                    $_SESSION['remove'] = "Remove Order Successfully.";
                    $_SESSION['remove_code'] = "success";
                    header('location:'.SITEURL.'order.php');
                }
                else
                {
                    //Failed to update
                    $_SESSION['remove'] = "<div class='error'>Failed to Update Order.</div>";
                    header('location:'.SITEURL.'Tenant/order.php');
                }
?>