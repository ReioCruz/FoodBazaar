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

<link rel="stylesheet" type="text/css" href="css/login.css">

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

                    $id = $row['id'];
                }

            }
            
        ?>
        <?php?>
<form action="" method="POST" class="menu text-right">
<h1><b><a href="index.php">Change Password </a></b></h1>
    
<table>

                <tr>
                    <td >Current Password: </td>
                    <td>
                        <input type="password" name="current_password" class="form-control-sm form-control-border" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password: </td>
                    <td>
                        <input type="password" name="new_password" class="form-control-sm form-control-border" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" class="form-control-sm form-control-border" placeholder="Confirm Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2"> 
            <input type="hidden" name="id" value="<?php echo $user_id; ?>">
            <input type="submit" name="submit" value="Confirm" class="btn btn-primary">
            <br><br>
            <b><a href="profile.php">Back </a></b>
                    </td>
                </tr>
    </table>
</form>

<?php
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        $sql = "UPDATE user2 SET password = '$new_password' WHERE id=$id ";
    }
?>