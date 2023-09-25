<?php
    //Include Constants page
    include('../config/constants.php');


    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        //Process to delete
        
        //1. Get ID and Image name
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
        
        //2. Remove the Image if available
        //Check whether the image is available or not and delete only if available
        if($image_name !="")
        {
            //It has image and need to remove from folder
            //Get image path
            $path = "../images/food/".$images_name;

            //Remove image file from folder
            $remove = unlink($path);
            
            //Check whether image is removed or not
            
        }

        //3. Delete food from database
        $sql = "DELETE FROM tbl_food WHERE id=$id";
        //Execute query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed or not and set the session message respectively
        if($res==true)
        {
            //Food deleted
            $_SESSION['delete'] = "<div class='succsess'>Food Deleted Sucessfully.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            //Failed to delete food
            $_SESSION['delete'] = "<div class='error'>Failed to delete food</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }

        //4.Redirect to manage food with session message
    }
    else
    {
        //Redirect to manage food page
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access. </div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }

?>