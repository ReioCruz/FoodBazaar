<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<style>
		label{
			color: red;
		}
	</style>
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
                        <a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a>
                    </li>

                    <li>
                        <a href="unified-login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                    </li>  
                    
                    <li>
                        <a href="signup.php"><span class="glyphicon glyphicon-sign-up"></span>Signup</a>
                    </li>

                    <li>
                        <a href="Tenant/login.php">Vendor</a>
                    </li>

                    <li>
                        <a href="admin/login.php">Admin</a>
                    </li>
                </ul>
            
                </div>
            
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar section starts here-->