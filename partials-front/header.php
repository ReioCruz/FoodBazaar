<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang = "en">
	<head>
        <title>Diversion Food Bazzaar</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/sweetalert.min.js"></script>
	</head>
	<style>
		label{
			color: red;
		}
	</style>
    <!--Link our css file-->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar section starts here-->
    <section class="" >
        <div class="">
            <div class="logo">
                <img src="images/Diversion.png" alt="FoodPark Logo" class="img-responsive">
            </div>

            <!-- User information -->   

            <div class="menu text-right">
                <ul>

                    <li>
                    <a href="my_orders.php"><span class="glyphicon glyphicon-list-alt"></span> My Orders</a>
                    </li>

                    <li>
                    <a href="Cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a>
                    </li>

                    <li>
                        <a href="<?php echo SITEURL; ?>"><span class="glyphicon glyphicon-home"></span> Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php"> Shops</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php"><span class="glyphicon glyphicon-cutlery"></span> Foods</a>
                    </li>

                    <li>
                        <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>

                    <li>
                    <a href="profile.php"><span class="glyphicon glyphicon-user"></span></a>
                            </div>
                            </a>
                            <div class="dropdown-user">
                                <?php if(isset($_SESSION['userId']) && $_SESSION['userId']==1) ?>
                                
                            </div>
                        </li>
        </div>                
        </ul>
                </div>
            
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar section starts here-->