<?php 
    //Include Constants File
    include('../config/constants.php');

    //echo "Delete Page";
    //Check whether the id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //Get the value and deleted
        //echo "Get Value and Delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //Remove the physical image file is available   
        if($image_name != "")
        {
            //Image is available. So remove it
            $path = "../images/category/".$image_name;
            //Remove the image
            $remove = unlink($path);
            
            //if failed to remove image then add an error message and stop the process
            if($remove==false)
            {
                //Set the session message
                $_SESSION['remove'] = "<div class='error'>Failed to Remove Category.</div>";
                //Redirect to maanage catergory
                header("location:".SITEURL.'admin/manage-category.php');
                //stop the porcess
                die();

            }
        }
        //Delete data from database
        //SQL query to delete data from database
        $sql = "DELETE FROM tbl_category1 WHERE id=$id";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the data is deleted from database or not
        if($res==true)
        {
            //Set success message and redirect
            $_SESSION['delete'] = "<div class='success'>Delete Successfully.</div>";
            //Redirect to maanage catergory
            header("location:".SITEURL.'admin/manage-category.php');
        }
        else
        {
            //Set fail message and reidrect
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Food. </div>";
            //Redirect to maanage catergory
            header("location:".SITEURL.'admin/manage-category.php');
        }


    }
    else
    {
        //redirect to Manage catergory page
        header('location:'.SITEURL.'admin/manage-category.php');
    }
?>