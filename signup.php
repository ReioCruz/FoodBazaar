<?php
    require 'config/constants.php';
    if(isset($_SESSION['email'])){
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/login.css">
<body>
    <div class="login">
        <div class="wraper">
            <div class="row">
                <h1><a href="home.php" class="btn-primary">SIGN UP</a></h1>
                <form method="post" action="user_registration_script.php">
            <table>
            <div class="form-group col-md-6">
                <tr style="text-align:right;">
                    <td>Username:</td>
                    <td>
                        <input type="text" class="form-control" name="username" placeholder="Enter Your Username" required="truee">
                    </td>
                </tr>
                </div>

            <div class="form-group col-md-6">
                <tr style="text-align:right;">
                    <td>Full Name:</td>
                    <td>
                        <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required="truee">
                    </td>
                </tr>
                </div>

                <div class="form-group col-md-6">
                <tr style="text-align:right;">
                    <td>Email:</td>
                    <td>
                        <input type="email" class="form-control" name="email" placeholder="Enter Your Email" required="truee">
                    </td>
                </tr>
                </div>

                <div class="form-group col-md-6">
                <tr style="text-align:right;">
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password">
                    </td>
                </tr>
                </div>

                <div class="form-group col-md-6">
                <tr style="text-align:right;">
                    <td>Complete Address:</td>
                    <td>
                        <input type="text" name="address" placeholder="E.g Street, ,Brgy., Municipality" class="input-responsive" required>
                    </td>
                </tr>
                </div>

                <div class="form-group col-md-6">
                <tr style="text-align:right;">
                    <td>Complete Address:</td>
                    <td>
                        <input type="text" name="add_address" placeholder="E.g Street, ,Brgy., Municipality" class="input-responsive" required>
                    </td>
                </tr>
                </div>

                <div class="form-group col-md-6">
                <tr style="text-align:right;">
                    <td>Contact:</td>
                    <td>
                        <input type="text" name="contact" placeholder="E.g 0998xxxxxxx" class="input-responsive" required>
                    </td>
                </tr>
                </div>

                <tr style="text-align:right;">
                    <td coldspan="2">
                        <input type="submit" name="submit" value="Sign Up" class="btn-primary">
                    </td>
                </tr>
            </table>
            Already have an account? <a href="unified-login.php" class="btn-danger"> Login</a>
        </form>
            </div>
        </div>
    </div>
    </div>
</body>
</html>