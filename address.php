<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<html lang = "en">
<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
    <link rel="stylesheet" type="text/css" href="css/login.css">
<div class="col-7 h-100 bg-gradient-light px-4">
    <div class="d-flex justify-content-center algin-tems-center w-100 h-100">
        <div class="card card-outline card-primary col-12 rounded-0 shadow">
    <div class="card-header text-center">
    <a href="order.php" class="h1"><b>Select Address</b></a>
    
<?php
        $user_id=$_SESSION['id'];
        $sql ="SELECT * FROM user2 WHERE id='$user_id'";
        $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
        $count = mysqli_num_rows($res);

        if($count>0)
        {
            while($row=mysqli_fetch_array($res))
            {
                $id = $row['id'];
                $address = $row['address'];
                $add_address = $row['add_address'];
            }
        }
?>
        <form action="" name="id" method="POST" enctype="multipart/form-data">

        <label for="address" name="address" class="control-label">Address: </label>
        <a href="addnew.php" class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span></a>
        <td class="text-center align-middle px-2 py-1">
        <input <?php if($address=="Address"){echo "Checked";} ?> type="radio" name="address" value="<?php echo $address; ?>"> <?php echo $address ?>
        <input <?php if($address=="Add Address"){echo"Checked";} ?> type="radio" name="address" value="<?php echo $add_address; ?>"> <?php echo $add_address?>
        </td>
        <td>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" name="submit" value="Submit" class="btn-primary btn-flat">
        </td>
        <a href="Cart.php" class="btn btn-danger">Back</a>
        </div>
        </form>

        <?php
        if(isset($_POST['submit']))
        {
            $user_id = $_POST['id'];
            $submit_address = $_POST['address'];

        $sql2 = "UPDATE user_items SET 
        address = '$submit_address'
        WHERE user_id=$user_id";

        $res2 = mysqli_query($conn, $sql2);
        //echo "$sql2";
        if($res2==true)
                {
                    //Category Updated
                    $_SESSION['update'] = "<div class='success'></div>";
                    echo "<script>window.location.href='Cart.php';</script>";
                }
                else
                {
                    //Failed to update category
                    $_SESSION['update'] = "<div class='error'>Failed to Update Category </div>";
                    echo "<script>window.location.href='address.php';</script>";
                }
            }
        ?>