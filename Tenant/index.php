<?php include('partials/home.php'); ?>

<link rel="stylesheet" href="../css/admin.css">

<?php
$vendor_id=$_SESSION['id'];
$count = 0;
$sql = "SELECT * FROM product_list WHERE vendor_id='$vendor_id'";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
?>
<div class="row text-center">
        <div class ="wraper">
            <div class="container">
                <br><br>
            
                <div class="form-group col-md-6">
                    <div class="media widget-ten">
                        <div class="media-left media-middle">
                            <span><i class="ti-book f-s-40"></i></span>
                        </div>
                    <h1><span class="glyphicon glyphicon-cutlery"></span> <b> <?php echo $count; ?></b> </h1>
                    <h3>Total Categories</h3>
                </div>
                </div>
                <div class="form-group col-md-6">
                    <h1><span class="glyphicon glyphicon-calendar"></span> <?php echo date('d');?> </h1>
                <div class="cardContainer">
                    <h3><?php echo date ('l').' '.date('d').', '.date('Y'); ?></h3>
                </div>
            </div>
            <?php
$vendor_id=$_SESSION['id'];
$count2 = 0;
$sql2 = "SELECT * FROM order_list WHERE vendor_id='$vendor_id'";
$res2 = mysqli_query($conn, $sql2);
$count2 = mysqli_num_rows($res2);
?>
                <div class="form-group col-md-6">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-vector f-s-40"></i></span>
                            </div>
                    <h1><span class="glyphicon glyphicon-list-alt"></span><b> <?php echo $count2; ?> </b></h1>
                        <h3><a href="manage-order.php"><p class="m-b-0">Total Order</p></a></h3>
                </div>
                </div>
                <div class="form-group col-md-6">
                    <?php
                $vendor_id = $_SESSION['id'];
        $orders ="SELECT total FROM order_list WHERE vendor_id='$vendor_id' ";
        $res=mysqli_query($conn,$orders) or die(mysqli_error($conn));
        $no_of_user_products=mysqli_num_rows($res);
        $i = 1;
        $sum = 0;
            while($row=mysqli_fetch_array($res)){
                $sum=$sum+$row['total'];
                ?>
                                <?php
                            }
                                ?>
        <b><h1><span class="glyphicon glypicon-summation">Total: ₱<?php echo $sum; ?></span></h1></b>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
</div>
        