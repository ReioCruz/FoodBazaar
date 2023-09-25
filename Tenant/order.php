<?php include('partials/home.php'); ?>

<link rel="stylesheet" href="../css/admin.css">

<?php 

    if(isset($_SESSION['update']))
        {
            ?>
            <script>
            swal({
                title: "<?php echo $_SESSION['update']; ?>",
                icon: "<?php echo $_SESSION['update_code']; ?>",
            });
            </script>
            <?php
            unset($_SESSION['update']);
        }

        if(isset($_SESSION['remove']))//Checking whether the session is set or not
        {
            ?>
            <script>
            swal({
                title: "<?php echo $_SESSION['remove']; ?>",
                icon: "<?php echo $_SESSION['remove_code']; ?>",
            });
            </script>
            <?php
            unset($_SESSION['remove']);
        }
        ?>

<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title text-center">Order List</h3>
		<div class="card-tools text-center">
		<br><br>
        </div>
	</div>

    <div class="card-body text-center">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-stripped">
				<colgroup>
					<col width="1%">
					<col width="1%">
                    <col width="7%">
					<col width="3%">
					<col width="0.1%">
					<col width="3%">
                    <col width="7%">
					<col width="8%">
					<col width="4%">
                    <col width="5%">
                    <col width="5%">
                    <col width="10%">
                    <col width="0.03%">
				</colgroup>
				<thead>
					<tr class="bg-gradient-secondary">
					<th class="text-center">#</th>
                    <th class="text-center">Food</th>
                    <th class="text-center">Order No.</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">Order Number</th>
                    <th class="text-center">Delivery Address</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Payment</th>
                    <th class="text-center">Contact</th>
                    <th class="text-center">Update</th>
                    <th class="text-center">Remove</th>
                </tr>
				</thead>
                <?php
                    $vendor_id=$_SESSION['id'];
                    $sql = "SELECT id, code, food, price, qty, total, order_date, delivery_address, status, payment, contact FROM order_list WHERE vendor_id='$vendor_id' ";
                    $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                    $count=mysqli_num_rows($res);
                    $sn = 1;
                    if($count>0)
                    {
                        while($row=mysqli_fetch_array($res))
                        {

                            ?>
                                <tr>
                                    <td><?php echo $sn++; ?>. </td>                                   
                                    <td><?php echo $row['food'] ?></td>
                                    <td style="color:green"><b><?php echo $row['code'] ?></b></td>
                                    <td>₱<?php echo $row['price'] ?></td>
                                    <td><?php echo $row['qty'] ?></td>
                                    <td>₱<?php echo $row['total'] ?></td>
                                    <td><?php echo $row['order_date'] ?></td>
                                    <td><?php echo $row['delivery_address'] ?></td>
                                    <td><b><?php echo $row['status'] ?></b></td>
                                    <td><?php echo $row['payment'] ?></td>
                                    <td><?php echo $row['contact'] ?></td>

                                    </td>
                                    
                                    <td align="center">
                                    
                                    <!--
				                    <div class="form-group col-md-6">
                                    <div class="media widget-ten">
                                    <div class="media-left media-middle">
                                    <h4><a href="update-order.php?id=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-edit"></span></a></h4>
                                    </div>
                                    </div>    
                                    </div>
                                    -->
                                    

                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <input type="radio" name="status" value="Order Accept" class="form-group col-md-1"> Order Accept <br>  
                                            <input type="radio" name="status" value="Out for Delivery" class="form-group col-md-1"> Out for Delivery <br>
                                            <input type="radio" name="status" value="Food is Ready" class="form-group col-md-1"> Food is Ready <br>
                                            <input type="radio" name="status" value="Delivered" class="form-group col-md-1"> Delivered <br>
                                            <input type="radio" name="status" value="Cancelled" class="form-group col-md-1"> Cancelled <br>
                                        </div>

                                    <div class="form-group">
                                    <div class="media widget-ten">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="submit" value="Update Order" class=" btn-primary">Update Order</button>
                                    </div>
                                  <td>
                                  <h4><a href="delete-order.php?id=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-remove"></span></a></h4>
                                  </td>
                                    </form>
                                    <?php
                                    if(isset($_POST['submit']))
                                    {
                                        $id = $_POST['id'];
                                        $status = $_POST['status'];

                                        $sql2 = "UPDATE order_list SET status = '$status' WHERE id = '$id'";
                                        //echo "$sql2";
                                        $res2 = mysqli_query($conn, $sql2);

                                        if($res2==true)
                                            {
                                                $_SESSION['update'] = "Order Updated Successfully.";
                                                $_SESSION['update_code'] = "success";
                                                echo "<script>window.location.href='order.php';</script>";
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
                    </div>
                            </div>
                        </div>       
                    </script>
                </td>
            <?php
        }
    }
?>