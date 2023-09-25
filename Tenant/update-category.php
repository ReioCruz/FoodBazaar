<?php include('partials/home.php'); ?>

<?php

            if(isset($_GET['id']))
            {
                $id = $_GET['id'];

                $sql = "SELECT * FROM product_list WHERE id='$id'";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                $sn = 1;
                
        if($count>0)
        {
                        //Order Available
                        while($row=mysqli_fetch_array($res))
                        {
                            //Get all the order details
                            $id = $row['id'];
                            $title = $row['title'];
                            $current_image = $row['image_name'];
                            $price = $row['price'];
                            $active = $row['active'];
                        }
                    }
            }
            else
            {
                header('location:'.SITEURL.'Tenant/category.php');
            }
                        ?>

<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title text-center">Update Categories</h3>
		<div class="card-tools text-center">
		<br><br>
    </div>
</div>

<div class="container-fluid">    
<form action="" method="POST"  enctype="multipart/form-data" id="product-form">

            <input type="hidden" name="id">
            <div class="row">
                <div class="col-md-4">
                <div class="form-group">
                    <label for="title" class="control-label">Title: </label>
                    <input type="title" id="title" name="title" class="form-control form-control-sm form-control-border" value="<?php echo $title; ?>" required>
                </div>

                    <div class="form-group">
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
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>"  width="200px">
                            <?php
                        }
                        ?>
                        <div class="form-group">
                        <label for="image" class="control-label">Select Image</label>
                        <input type="file" id="image" name="image" class="form-control-sm form-control-border">
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="price" class="control-label">Price</label>
                        <input type="number" id="price" name="price" class="form-control form-control-sm form-control-border" value="<?php echo $price; ?>">
                    </div>
                    <label for="active" name="active" class="control-label">Active: </label>
                    <td>
                    <input <?php if($active=="Yes"){echo "Checked";} ?> type="radio" name="active" value="Yes"> Yes
                    <input <?php if($active=="No"){echo"Checked";} ?> type="radio" name="active" value="No"> No
                    </td>
                    <tr>
                        <br>
                    <td colspan="3">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-primary">
                    </td>
                    </tr>
                    <br><br><br>
        </table>
    </form>

<?php
    
    if(isset($_POST['submit']))
    {
        //echo "Clicked";
        //1. Get all the values from our form
        $id = $_POST['id'];
        $title = $_POST['title'];
        $current_image = $_POST['current_image'];
        $price = $_POST['price'];
        $active = $_POST['active'];

        //2. Updataing New image  if selected
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
        $vendor_id = $_SESSION['id'];
        //3. Update the Database
        $sql2 = "UPDATE product_list SET
            title = '$title',
            image_name = '$image_name',
            price = $price,
            active = '$active'
            WHERE id='$id'
        ";
        //echo "$sql2";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //4. Redirect to manage category with message
                //Chech whether executed or not
                if($res2==true)
                {
                    //Category Updated
                    $_SESSION['update'] = "<div class='success'></div>";
                    echo "<script>window.location.href='category.php';</script>";
                }
                else
                {
                    //Failed to update category
                    $_SESSION['update'] = "<div class='error'>Failed to Update Category </div>";
                    echo "<script>window.location.href='update-category.php';</script>";
                }
            }

?>
</div>
    <div class="clearfix"></div>
            </div>