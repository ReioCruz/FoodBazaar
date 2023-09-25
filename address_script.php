<?php
    require 'config/constants.php';
    $add_address=$_POST['add_address'];
    
if($add_address==true){
        $user_id = $_SESSION['id'];
        $user_address_query="UPDATE user2 SET add_address = '$add_address' WHERE id=$user_id";
        
        $user_address_result=mysqli_query($conn, $user_address_query) or die(mysqli_error($conn));
        header("location:".SITEURL.'address.php');

        ?>
        <meta http-equiv="refresh" content="3;url=index.php" />
        <?php
    }
?>