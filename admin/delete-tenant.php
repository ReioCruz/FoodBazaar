<?php

    //Include constant.php file here
    include('../config/constants.php');

    //1. get the ID of Admin to be deleted
    $id = $_GET['id'];

    //2. Create SQL Query to Delete Admin
    $sql = "DELETE FROM vendor_list WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn,$sql);

    // Check whether the query executed successfully or not
    if($res==true)
    {
        //Query Executed Successfully and Admin Deleted
        //echo "Admin Deleted";
        //Create Session Variable to Display Message 
        $_SESSION['delete'] = "<div class='success'></div>";
        //Redirect to Manage Admin Page
        header('location:' .SITEURL.'admin/manage-tenant.php');
    }
    else
    {
        //Failed to Delete Admin
        //echo "Failed to Delete Admin";

        $_SESSION['delete'] = "<div class='error'>Failed to Delete admin. Try Again Later.</div>";
        header('location:' .SITEURL.'admin/manage-tenant.php');
    }
    
    //3. Redirect to Manage Admin page with message (success/error)

?>