<?php include('partials/menu.php'); ?>
<script src="../js/sweetalert.min.js"></script>

        <!--Main Content Section Starts -->
        <div class="main-content">
        <div class ="wrapper">
            <h1>Dashboard</h1>
            <br><br>
                <?php
                    if(isset($_SESSION['login']))
                    {
                        ?>
                        <script>
                        swal({
                            title: "<?php echo $_SESSION['login']; ?>",
                            icon: "<?php echo $_SESSION['login_code']; ?>",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        </script>
                        <?php
                        unset($_SESSION['login']);
                    }
                  
				?>
                <br><br>
                <?php
$count = 0;
$sql = "SELECT * FROM product_list";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
?>
            
                <div class="col-4 text-center">
                    <div class="media widget-ten">
                        <div class="media-left media-middle">
                            <span><i class="ti-book f-s-40"></i></span>
                        </div>
                    <h1><?php echo $count; ?></h1>
                    <br />
                    Total Categories
                </div>
                </div>
                
                <div class="col-4 text-center">
                    <h1><?php echo date('d');?></h1>
                    <br />
                <div class="cardContainer">
                    <p><?php echo date ('l').', '.date('Y'); ?></p>
                </div>
            </div>
            <?php if(isset($_SESSION['tbl_orderId']) && $_SESSION['tbl_orderId']==1)  ?>

            <?php
$count1 = 0;
$sql1 = "SELECT * FROM order_list";
$res1 = mysqli_query($conn, $sql1);
$count1 = mysqli_num_rows($res1);
?>
                <div class="col-4 text-center">
                    <div class="media widget-ten">
                        <div class="media-left meida media-middle">
                            <span><i class="ti-vector f-s-40"></i></span>
                            </div>
                    <h1><?php echo $count1; ?></h1>
                        <a href="manage-order.php"><p class="m-b-0">Total Order</p></a>
                </div>
                </div>
                <?php
$count2 = 0;
$sql2 = "SELECT * FROM vendor_list";
$res2 = mysqli_query($conn, $sql2);
$count2 = mysqli_num_rows($res2);
?>
                <div class="col-4 text-center">
                    <h1><?php echo $count2?></h1>
                    <br />
                    Tenant
                </div>
<?php
$count3 = 0;
$sql3 = "SELECT * FROM user2";
$res3 = mysqli_query($conn, $sql3);
$count3 = mysqli_num_rows($res3);
?>
                <div class="col-4 text-center">
                    <h1><?php echo $count3?></h1>
                    <br />
                    Customer
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Main Content Setion Ends -->
