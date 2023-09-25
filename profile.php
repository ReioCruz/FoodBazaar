<br>
<?php
    require 'config/constants.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/login.css">
<?php
            ?>
<?php 

            //2. Create SQL Query to get the Details
            $user_id=$_SESSION['id'];

            $sql="SELECT * FROM user2 WHERE id='$user_id'";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Check whether the query is executed or not
            if($res==true)
            {
                // Check whether the data is available or not
                $count = mysqli_num_rows($res);
                //Check whether we have admin data or not
                if($count==1)
                {
                    // Get the Details
                    //echo "Admin Available";
                    $row=mysqli_fetch_assoc($res);

                    $name = $row['name'];
                    $email = $row['email'];
                    $contact = $row['contact'];
                    $address = $row['address'];
                }

            }
            
        ?>

        <form action="" method="POST" class="menu text-right">
        <h1><b><a href="index.php">Profile </a></b></h1>

            <table class="tbl=30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="name" value="<?php echo $name; ?>">
                    </td>
                </tr>

                <tr">
                    <td>Email:</td>
                    <td>
                        <input type="email" name="email" value="<?php echo $email; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Contact:</td>
                    <td>
                        <input type="text" name="contact" value= "<?php echo $contact; ?>">
                    </td>
                </tr>

                
                <tr>
                    <td>Address:</td>
                    <td>
                        <input type="text" name="address" value= "<?php echo $address; ?>">
                    </td>
                </tr>
    <tr>
        <td colspan="2">
            <a href="change-password.php" class="btn btn-danger">Change Password</a>
            <input type="hidden" name="id" value="<?php echo $user_id; ?>">
            <input type="submit" name="submit" value="Confirm" class="btn btn-primary">
        </td>
    </tr>

</table>

</form>
</div>

<?php 

    //Check whether the Submit Button is Clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button Clicked";
        //Get all the values from form to update
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];

        //Create a SQL Query to Update Admin
        $sql = "UPDATE user2 SET
        name = '$name',
        email = '$email',
        contact = '$contact',
        address = '$address',  
        WHERE id=$id
        ";
        echo "$sql";
        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed and Admin Updated
            $_SESSION['update'] = "<div class ='success'> Updated Profile Successfully.</div>";
            //Redirect to Manage Admin Page
            //echo "<script>window.location.href='index.php';</script>";
        }
        else
        {
            //Failed to Update Admin
            $_SESSION['update'] ="<div class ='error'> Failed to Update Profile.</div>";
            //Redirect to Manage Admin Page
            //echo "<script>window.location.href='profile.php';</script>";
        }
    }
