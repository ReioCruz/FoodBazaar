<?php
    require 'config/constants.php';
?>
<!doctype html>
<html lang="en">
<head>
  <title>Diversion Food Bazaar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/sample.css">
</head>
<script type="text/javascript">
    window.history.forward();
</script>
<body>
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
                                            <form action="login_submit.php" method="POST">
											<h4 class="mb-4 pb-3">Log In</h4>
											<div class="form-group">
												<input type="text" name="username" id="username" class="form-style" placeholder="Username">
												<i class="input-icon uil uil-user"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="password" id="password" class="form-style" placeholder="Password">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
                                            <input type="submit" name="submit" value="Login" class="btn mt-4">
                                        <p class="mb-0 mt-4 text-center"><a href="home.php" class="">Back</a></p>
				      					</div>
			      					</div>
			      				</div>
                                </form>

								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
                                            <form action="user_registration_script.php" method="POST">
											<div class="form-group">
												<input type="text" name="name" class="form-style" placeholder="Full Name">
												<i class="input-icon uil uil-user"></i>
											</div>
                                            	
                                            <div class="form-group mt-1">
												<input type="text" name="username" id="username" class="form-style" placeholder="Username">
												<i class="input-icon uil uil-user"></i>
											</div>

											<div class="form-group mt-1">
												<input type="tel" name="contact" id="contact" class="form-style" placeholder="Phone Number">
												<i class="input-icon uil uil-phone"></i>
											</div>	
                                            <div class="form-group mt-1">
												<input type="email" name="email" id="email" class="form-style" placeholder="Email">
												<i class="input-icon uil uil-at"></i>
											</div>
                                            <div class="form-group mt-1">
												<input type="email" name="address" id="address" class="form-style" placeholder="Address">
												<i class="input-icon uil uil-location-point"></i>
											</div>
											<div class="form-group mt-1">
												<input type="password" name="password" id="password" class="form-style" placeholder="Password">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<input type="submit" name="submit" value="Register" class="btn-primary mt-2 pd-4">
				      					</div>
			      					</div>
			      				</div>
                            </form>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
</body>
</html>