<?php include('partials/header.php'); ?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

    <div class="card card-outline card-primary">
        <div class="card-header text">
            <a href="../home.php" class="h1"><b>Tenant Login</b></a>
        </div>
        
        <div class="card-body">
            <form id="vlogin-frm" action="login_submit.php" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="username" autofocus placeholder="Username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <br>
                <div class="row align-item-end">
                    <div class="col-8">
                        <a href="../home.php">Back to Site</a>
                    </div>
                    <br>

                    <div class="col-12">
                        <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
                    </div>

                </div>

            </form>
        </div>
    </div>

    