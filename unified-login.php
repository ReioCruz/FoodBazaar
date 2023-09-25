<?php
    $host="localhost";
    $user="root";
    $password="";
    $db="food-park-test";

    session_start();
    $data=mysqli_connect($host,$user,$password,$db);
    if($data==false)
    {
        die("connection error");
    }

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $username=$_POST["username"];
        $password=md5($_POST["password"]);

        $sql="SELECT * FROM vendor_list INNER JOIN user2 WHERE username='".$username."' AND password='".$password."' ";

        $result=mysqli_query($data,$sql);

        $row=mysqli_fetch_array($result);

        if($row["usertype"]=="admin")
        {   
            $_SESSION["username"]=$username;

            header("location:Tenant/index.php");
        }

        elseif($row2["usertype"]=="user")
        {
            $_SESSION["username"]=$username;
            header("location:index.php");
        }
        else
        {
            echo "username or password incorrect";
        }
    }
?>


<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
    window.history.forward();
</script>
<link rel="stylesheet" type="text/css" href="css/login.css">
<body>
    <div class="login">
        <div class="wraper">
            <div class="text-center">
               
                <form method="POST" action="#">
                <h1><b><a href="home.php">Login </span></a></b></h1>
            <table>
				<tr style="text-align:left;">
                    <td> </td>
                    <td>
                    <span class="glyphicon glyphicon-user"> Username: <input type="text" class="form-control" name="username" placeholder="Enter Your Username" required="true"></span>
                    </td>
                </tr>

                <tr style="text-align:left;">
                <td></td>
                    <td>
                    <span class="glyphicon glyphicon-lock"> Password:<input type="password" class="form-control" name="password" placeholder="Enter Password"></span>
                    </td>
                </tr>

                <tr style="text-align:right;">
                    <td coldspan="5">
                        <input type="submit" name="submit" value="Login" class="btn-danger">
                    </td>
                </tr>
            </table>
        </form>
            </div>
			<br>
			<div class="panel-footer">Don't have an account yet? <a href="signup.php">Register</a></div>
        </div>
    </div>
    </div>
</body>
</html>
<?php include('partials-front/footer.php'); ?>