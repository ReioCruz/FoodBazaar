<?php include('partials-front/header.php'); ?>
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
                    <col width="6%">
					<col width="8%">
                    <col width="8%">
					<col width="3%">
					<col width="1%">
					<col width="2%">
                    <col width="4%">
					<col width="10%">
					<col width="2%">
                    <col width="7%">
				</colgroup>
				<thead>
					<tr class="bg-gradient-secondary">
					<th>#</th>
                    <th class="text-center">Order No.</th>
                    <th class="text-center">Food</th>
                    <th class="text-center">Stall</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">Order Date</th>
                    <th class="text-center">Delivery Address</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Payment Method</th>
                </tr>
				</thead>
                <?php
                    $user_id=$_SESSION['id'];
                    $sql = "SELECT ol.id, ol.code, ol.food, v.shop_name, ol.price, ol.qty, ol.total, ol.order_date, ol.delivery_address, ol.status, ol.payment FROM order_list as ol INNER JOIN vendor_list v on v.id=vendor_id WHERE user_id='$user_id' ";
                    $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                    $count=mysqli_num_rows($res);
                    $sn = 1;
                    if($count>0)
                    {
                        while($row=mysqli_fetch_array($res))
                        
                        {
                            //Get all the order details

                            ?>
                            <form action="" method="POST">
                                <tr>
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><?php echo $row['code']?></td>
                                    <td><?php echo $row['food'] ?></td>
                                    <td><?php echo $row['shop_name']?></td>
                                    <td>₱<?php echo $row['price'] ?></td>
                                    <td style="color:green"><b><?php echo $row['qty'] ?></td></b>
                                    <td>₱<?php echo $row['total'] ?></td>
                                    <td><?php echo $row['order_date'] ?></td>
                                    <td><?php echo $row['delivery_address'] ?></td>
                                    <td><b><?php echo $row['status'] ?></b></td>
                                    <td><?php echo $row['payment'] ?></td>
                                </tr>
                                    
                                </form>
                                    <?php
                        }
                    }
                ?>