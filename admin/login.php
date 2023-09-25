<?php include('../config/constants.php'); ?>

<html>
	<head>
	<script type="text/javascript">
    window.history.forward();
</script>
			<title>Diversion Food Bazzaar Management System </title>
			<link rel="stylesheet" href="../css/login.css">
			<script src="js/sweetalert.min.js"></script>
		</head>

		<body>

			<div class ="login">
				<h1 class="text-center"><a href="../home.php" class="btn-primary">Diversion Food Bazzaar</a></h1>
				<br><br>

				<?php
					if(isset($_SESSION['login']))
					{
						echo $_SESSION['login'];
						unset($_SESSION['login']);
					}

					if(isset($_SESSION['no-login-message']))
					{
						echo $_SESSION['no-login-message'];
						unset($_SESSION['no-login-message']);
					}
				
				?>
				<br>

				<!-- Login Form Starts Here -->
				<form action="" method="POST" class="text-center">
				Username:<br>
				<input type="text" name="username" placeholder="Enter User name"><br>

				Password:<br>
				<input type="password" name="password" placeholder="Enter Passowrd"><br>

				<input type="submit" name="submit" value="Login" class="btn-primary">
				<br><br>

				Don't have an account yet?
				<br><br>
				<a href="add-admin.php" class="btn-primary">Create an Account</a>

				<a href="update-password.php" class="btn-primary">Forget Password</a>
				<br><br>
				</form>
				<!-- Login Form End Here -->
			</div>

		</body>
</html>

<?php 

	//Check whether the submit Button is clicked or not
	if(isset($_POST['submit']))
	{
		//Process for loging
		//1. Get the data from login form
		$username = $_POST['username'];
		//$username = mysqli_real_escape_string($conn, $_POST['username']);

		$password = md5($_POST['password']);
		//$password = md5($_POST['password']);
		//$password = mysqli_real_escape_string($conn, $raw_password);

		//2. SQL to check whether the user with username and password  exist or not
		$sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

		//3. Execute the Query
		$res = mysqli_query($conn, $sql);

		//4.count rows to check whether the user exists or not
		$count = mysqli_num_rows($res);

		if($count==1)
		{
			//User Available Login Success
			$_SESSION['login'] = "Login Success.";
			$_SESSION['login_code'] = "success";
			$_SESSION['user'] = $username; // To check whether the user is logged or not and logout will unset it
			//Redirect to Home page/Dashboard
			header('location:'.SITEURL.'admin/index.php');
		}
		else
		{
			//User not Available and Login Fail
			$_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
			//Redirect to Home page/Dashboard
			header('location:'.SITEURL.'admin/login.php');
		} 

	}

?>