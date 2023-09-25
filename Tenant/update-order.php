<?php include('partials/header.php'); ?>

<!DOCTYPE html>
<html lang = "en">
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

    <?php
    $vendor_id = $_SESSION['id'];
    $sql = "SELECT food, user_id, price, qty, total, order_date, delivery_address, status, payment FROM order_list WHERE vendor_id='$vendor_id' ";
    $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $count=mysqli_num_rows($res);

            while($row=mysqli_fetch_array($res)){
            $status = $row['status'];
            }
            ?>

<div class="col-7 h-100 bg-gradient-light px-4">
    <div class="d-flex justify-content-center algin-tems-center w-100 h-100">
        <div class="card card-outline card-primary col-12 rounded-0 shadow">
    <div class="card-header text-center">
    <a href="order.php" class="h1"><b>Update Status</b></a>
    </div>
    <div class="card-body">

        <form id="" action="" method="POST">
            <input type="hidden" name="id">
            <div class="col-3 border bg-gradient-primary">
                <div class="col-9 border"><span class="font-weight-bolder">
                    <td class="text-center align-middle px-2 py-1">
                        <select name="status">
                            <option <?php if($status=="Pending"){echo "selected";} ?> value="Pending">Pending</option>
                            <option <?php if($status=="Order Accept"){echo "selected";} ?>value="Order Accept">Order Accept</option>
                            <option <?php if($status=="Out for Delivery"){echo "selected";} ?>value="Out for Delivery">Out for Delivery</option>
                            <option <?php if($status=="Food is Ready"){echo "selected";} ?> value="Food is Ready">Food is Ready</option>
                            <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                            <option <?php if($status=="Cancelled"){echo "selected";} ?> style="color:red" value="Cancelled">Cancelled</option>
                        </select>
                    </td>
            </div>
            <br><br>

                    <input type="submit" name="submit" value="Update Order" class="btn-primary btn-flat">
                </div>
            </div>    
        </div>
    </div> 
    </div>
</form>
        
        <?php
            if(isset($_POST['submit']))
            {
                $status = $_POST['status'];

                $id=$_GET['id'];
                $sql2 = "UPDATE order_list SET status = '$status' WHERE id='$id'";
                //echo "$sql2";
                $res2 = mysqli_query($conn, $sql2);

                if($res2==true)
                {
                    $_SESSION['update'] = "Order Updated Successfully.";
                    $_SESSION['update_code'] = "success";
                    header('location:'.SITEURL.'Tenant/order.php');
                }
                else
                {
                    //Failed to update
                    $_SESSION['update'] = "<div class='error'>Failed to Update Order.</div>";
                    header('location:'.SITEURL.'Tenant/update-order.php');
                }
            }
        ?>
    </div>
</div>