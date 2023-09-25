<?php include('partials/home.php'); ?>
<?php $month = isset($_GET['month']) ? $_GET['month'] : date("F"); ?>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title text-center">Order Reports</h3>
		<div class="card-tools">
        <h4><b> Reports for this month: </b><?php echo date ('F'); ?></h4>

      </div>
    </div>  
  </div>
  </div>
	</div>
    <div class="container-fluid">
    <form action="">
        <table>
            <div class="col-lg-2 col-md-2 col-sm-12">
            <input type="month" name="month" class="form-control" id="month"><br>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12">
            <button type="submit" class="btn btn-flat btn-default btn-danger"><span class="glyphicon glyphicon-filter"></span> Filter</button>
            </div>
        </table>
    </form>
    </div>
    <br>
	<div class="card-body text-center">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-stripped">
				<colgroup>
					<col width="1%">
					<col width="4%">
          <col width="2%">
          <col width="4%">
				</colgroup>
				<thead>
					<tr class="bg-gradient-secondary">
					<th class="text-center">#</th>
                    <th class="text-center">Order Date</th>
                    <th class="text-center">Order Number</th>
                    <th class="text-center">Total Ammount </th>
                </tr>
				</thead>

        <?php
        
        $vendor_id = $_SESSION['id'];
        $orders ="SELECT monthname(order_date) as month, year(order_date) as year, day(order_date) as day, code, price, status, total, contact FROM order_list WHERE vendor_id='$vendor_id'";
        $res=mysqli_query($conn,$orders) or die(mysqli_error($conn));
        $no_of_user_products=mysqli_num_rows($res);
        $i = 1;
        $sum = 0;
            while($row=mysqli_fetch_array($res)){
                $sum=$sum+$row['total'];
    ?>
        <tr>
            <td class="text-center align-middle px-2 py-1"><?php echo $i++; ?></td>
            <td class="align-middle px-2 py-1"><?php echo $row['month']."/".$row['day']."/".$row['year'] ;?></td>
            <td><?php echo $row['code']?></td>
            <td class="text-center align-middle  px-2 py-1">₱<?php echo $row['total'] ?></td>
                                </tr>
                                <?php
                            }
                                ?>
        </table>
        <td><b><h3 class="text-right" style="color:red">Total: ₱<?php echo $sum; ?></h3></b></td>
        </div>