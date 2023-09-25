<?php
    require '../config/constants.php';

    
    $shop_name = mysqli_real_escape_string($conn,$_POST['shop_name']);
    $shop_owner = mysqli_real_escape_string($conn,$_POST['shop_owner']);
    $shop_manager = mysqli_real_escape_string($conn,$_POST['shop_manager']);
    $contact= $_POST['contact'];
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password=md5(mysqli_real_escape_string($conn,$_POST['password']));
    $address = mysqli_real_escape_string($conn,$_POST['address']);

    if(isset($_FILES['image']['name']) AND !empty($_FILES['image']['name']))
    {
        $img_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $error = $_FILES['image']['error'];

        if($error === 0)
        {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);

            $allowed_exs = array('jpg', 'jpeg', 'png');
            if(in_array($img_ex_to_lc, $allowed_exs))
            {
                $new_img_name = uniqid($username, true).'.'.$img_ex_to_lc;
                $img_upload_path = '../images/profile/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
            }
        }

    }
    if(strlen($password)<6)
    {
        echo "Password should have atleast 6 characters. Redirecting you back to registration page...";
        ?>
        <meta http-equiv="refresh" content="2;url=register.php" />
        <?php
    }

else{
        $user_registration_query="INSERT INTO vendor_list (shop_name,shop_owner,shop_manager,contact,username,address,password,image_name,status,usertype) VALUES ('$shop_name', '$shop_owner','$shop_manager', '$contact', '$username','$address', '$password','$new_img_name','Active','admin')";
        //echo "$user_registration_query";
        $user_registration_result=mysqli_query($conn, $user_registration_query) or die(mysqli_error($conn));
        header("location:".SITEURL.'Tenant/login.php');

        $_SESSION['username']=$username;

        $_SESSION['vendor_id']=mysqli_insert_id($conn);

    }

?>