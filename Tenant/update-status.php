<?php include('partials/header.php'); ?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

    <?php
    $vendor_id = $_SESSION['id'];
    $sql = "SELECT shop_name, shop_owner, shop_manager, contact, username, address, password, image_name, status FROM vendor_list WHERE id='$vendor_id' ";
    $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $count=mysqli_num_rows($res);

            while($row=mysqli_fetch_array($res)){
 
            $status = $row['status'];
            $current_image = $row['image_name'];
            
            ?>

<div class="col-7 h-100 bg-gradient-light px-3">
    <div class="d-flex justify-content-center algin-tems-center w-100 h-100">
        <div class="card card-outline card-primary col-12 rounded-0 shadow">
    <div class="card-body">

        <form id="" action="" method="POST">
            <input type="hidden" name="id">
                <div class="col-9 border"><span class="font-weight-bolder">
                <tr class="form-group col-md-6">
                <td for="shop_name" class="control-label">Shop Name</td>
                    <td>
                    <input type="text" id="shop_name" autofocus name="shop_name" value="<?php echo $row['shop_name'] ?>" class="form-control-sm form-control-border">
                    </td>
                </tr>

                    <tr class="form-group col-md-6">
                        <td for="shop_owner" class="control-label">Shop Owner Name</td>
                        <td>
                        <input type="text" id="shop_owner" name="shop_owner" value="<?php echo $row['shop_owner'] ?>" class="form-control-sm form-control-border" >
                        </td>
                    </tr>

                    <tr class="form-group col-md-6">
                        <td for="shop_manager" class="control-label">Shop Manager Name</td>
                        <td>
                        <input type="text" id="shop_manger" name="shop_manager" value="<?php echo $row['shop_manager'] ?>" class="form-control-sm form-control-border">
                        </td>
                    </tr>

                    <tr class="form-group col-md-3">
                        <td for="contact" class="control-label">Contact</td>
                        <td>
                        <input type="text" id="contact" name="contact" value="<?php echo $row['contact'] ?>" class="form-control-sm form-control-border">
                        </td>
                    </tr>

                    <tr class="form-group col-md-3">
                        <td for="username" class="control-label">Username</td>
                        <td>
                        <input type="text" id="username" name="username" value="<?php echo $row['username'] ?>" class="form-control-sm form-control-border">
                        </td>
                    </tr>

                    <tr class="form-group col-md-3">
                        <td for="address" class="control-label">Complete Address</td>
                        <td>
                        <input type="text" id="address" name="address" class=" form-control-border" value="<?php echo $row['address'] ?>">
                        </td>
                    </tr>

                    <tr class="form-group col-md-3">
                    <label for="current_image" class="control-label"></label>
                        <?php 
                        if($current_image=="")
                        {
                            //Image not available
                            echo "<div class='error'>Image not available</div>";
                        }
                        else
                        {
                            //Image available
                            ?>
                            <img src="<?php echo SITEURL; ?>images/profile/<?php echo $current_image; ?>"  width="100px" class="image-responsive">
                            <?php
                        }
                        ?>
                        <tr class="form-group col-md-3">
                        <td for="image" class="control-label">Select Image</td>
                        <input type="file" id="image" name="image" class="form-control-sm form-control-border">
                    </tr>
                    </tr>
                    <br>
                    <td class="form-group col-md-3">
                        <select name="status">
                            <option <?php if($status=="Active"){echo "selected";} ?> value="Active">Active</option>
                            <option <?php if($status=="Inactive"){echo "selected";} ?>value="Inactive">Inactive</option>
                        </select>
                    </td>
                </div>
                <?php }?>
                <br>
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <input type="submit" name="submit" value="Update Order" class="btn-primary btn-flat">
                    <br>
                    <div class="card-header text-left">
                    <a href="index.php" class="btn-primary btn-flat">Back</a>
                    <b><a href="change-password.php">Change Password </a></b>
                    </div>
                    <?php
                        
                    ?>
                </div>
            </div>    
            </div>
            </div> 
            </div>
        </form>
        
        <?php
            if(isset($_POST['submit']))
            {
                $shop_name = $_POST['shop_name'];
                $shop_owner = $_POST['shop_owner'];
                $shop_manger = $_POST['shop_manager'];
                $contact = $_POST['contact'];
                $username = $_POST['username'];
                $address = $_POST['address'];
                $status = $_POST['status'];
                $current_image = $_POST['image'];
                $vendor_id = $_SESSION['id'];
//Check whether the image is selected or not
if(isset($_FILES['image']['name']))
{
    //Upload the image
    //To upload image we need image name, source path and destination path
    $image_name = $_FILES['image']['name'];

    //Upload the image only if image is selected
    if($image_name !="")
    {
    

        //Auto Rename our Image
        //Get the Extenstion of our image (jpg, png, gif, etc) e.g. "specialfoof1.jpg"
        $ext = end(explode('.', $image_name));

    //Rename the Image
    $image_name = "Food_category_".rand(000, 999).'.'.$ext; // e.g. Food_Category_834.jpg
        

        $source_path = $_FILES['image']['tmp_name'];

        $destination_path = "../images/category/".$image_name;

        //Finally upload the image
        $upload = move_uploaded_file($source_path, $destination_path);

        //Check whether the image is uploaded or not
        //And if the image is not uploaded then we will stop the process and redirect with error message
        if($upload==false)
        {
            //Set message
            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
            //Redirect to add category page
            header("location:".SITEURL.'Tenant/add-category.php');
            //Stop the process
            die();
        }
    }
    else
    {
        //Don't upload the image and set the image_name value as blank
        $image_name= $current_image;
    }
 }
        else
        {
            //Don't upload the image and set the image_name value as blank
            $image_name= $current_image;
        }

                $sql2 = "UPDATE vendor_list SET
                shop_name = '$shop_name',
                shop_owner = '$shop_owner',
                shop_manager = '$shop_manger',
                contact = '$contact',
                username = '$username',
                address = '$address',
                status = '$status',
                image_name = '$image_name'
                WHERE id='$vendor_id'
                ";
                echo "$sql2";
                $res2 = mysqli_query($conn, $sql2);

                if($res2==true)
                {
                    $_SESSION['update'] = "<div class='success'>Order Updated Successfully.</div>";
                    //echo "<script>window.location.href='index.php';</script>";
                }
                else
                {
                    //Failed to update
                    $_SESSION['update'] = "<div class='error'>Failed to Update Order.</div>";
                   // echo "<script>window.location.href='update-status.php';</script>";
                }
            }
        ?>
    </div>
</div>
