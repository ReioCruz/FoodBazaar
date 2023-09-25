<?php include('partials/menu.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="card card-outline card-primary">
	<div class="card-header">
        <h1>Manage Order</h1>
            <?php
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>

            <div class="card-body">
        <div class="container-fluid">
			<table class="table table-bordered table-stripped">
				<colgroup>
                    <col width="2%">
                    <col width="10%">
					<col width="10%">
					<col width="4%">
                    <col width="5%">
                    <col width="10%">
                    <col width="10%">
                    <col width="10%">
                    <col width="20%">
                    <col width="10%">
                    <col width="2%">
				</colgroup>
                <tr class="bg-gradient-secondary">
                    <th>S.N</th>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Qty.</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Payment method</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Actions</th>
                </tr>

                <?php
                    if(isset($_GET ['food_id']))
                    {
                        //Category id is set and get id
                        $food_id = $_GET['food_id'];
                    }
                    //Get all the orders from database
                    $sql = "SELECT * FROM order_list ORDER By id DESC";
                    //Execute Query
                    $res = mysqli_query($conn, $sql);
                    //Count the Rows
                    $count = mysqli_num_rows($res);
                    $sum=0;
                    $vtotal=0;

                    $sn = 1; //Create a serial number and set its initial values as 1

                    if($count>0)
                    {
                        //Order Available
                        while($row=mysqli_fetch_assoc($res))
                        {
                            //Get all the order details
                            $sum=$sum+$row['total'];
                            $id = $row['id'];
                            $food = $row['food'];
                            $price = $row['price'];
                            $qty = $row['qty'];
                            $total = $row['total'];
                            $order_date = $row['order_date'];
                            $status = $row['status'];
                            $delivery_address = $row['delivery_address'];
                            $payment = $row['payment'];
                            $contact = $row['contact'];

                            ?>
                                <tr>
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><?php echo $food; ?></td>
                                    <td>₱<?php echo $price; ?></td>
                                    <td><?php echo $qty; ?></td>
                                    <td>₱<?php echo $total; ?></td>
                                    <td><?php echo $order_date; ?></td>
                                    <td><?php echo $status; ?></td>
                                    <td><?php echo $payment; ?></td>
                                    <td><?php echo $delivery_address; ?></td>
                                    <td><?php echo $contact; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-danger"><span class="glyphicon glyphicon-edit"></span></a><br>
                                    </td>
                                </tr>
                            <?php
                        }
                    }
                    else
                    {
                        //Order not Available
                        echo "<tr><td colspan='12' class='error'>Order not Available.</td></tr>";
                    }
                ?>

            </table>
            <!--<h3 class="text-right">Grand Total: ₱<?php echo $sum; ?></h3>-->
    </div>
</div>
