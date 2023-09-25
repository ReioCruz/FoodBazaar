<?php include('partials-front/header.php'); ?>
<!DOCTYPE html>
<html lang = "en">

    <?php
                $id=$_GET['id'];
                $sql2 = "UPDATE order_list SET status = 'Cancelled' WHERE id='$id'";
                //echo "$sql2";
                $res2 = mysqli_query($conn, $sql2);

                if($res2==true)
                {
                    $_SESSION['update'] = "<div class='success'>Order Updated Successfully.</div>";
                    header('location:'.SITEURL.'my_orders.php');
                }
                else
                {
                    //Failed to update
                    $_SESSION['update'] = "<div class='error'>Failed to Update Order.</div>";
                    header('location:'.SITEURL.'my_orders.php');
                }
        ?>
    </div>
</div>
