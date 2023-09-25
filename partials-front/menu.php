<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Park Site</title>

    <!--Link our css file-->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar section starts here-->
    <section class="navbar" >
        <div class="container">
            <div class="logo">
                <img src="images/Logo.png" alt="FoodPark Logo" class="img-responsive">
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                    <a href="Cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a>
                    </li>

                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>admin/index.php">Settings</a>
                    </li>

                    <li>
                        <a href="<?php echo SITEURL; ?>admin/login.php">Login</a>
                    </li>                
                </ul>
            
                </div>
            
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar section starts here-->