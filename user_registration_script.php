<?php
    require 'config/constants.php';

    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email=$_POST['email'];
    $address=$_POST['address'];
    $add_address=$_POST['add_address'];
    $contact=$_POST['contact'];
    $password=md5(mysqli_real_escape_string($conn,$_POST['password']));
    if(strlen($password)<6){
        echo "Password should have atleast 6 characters. Redirecting you back to registration page...";
        ?>
        <meta http-equiv="refresh" content="2;url=signup.php" />
        <?php
    }

else{
        $user_registration_query="INSERT INTO user2(username,name,email,password,address,add_address,contact,usertype) VALUES ('$username', '$name','$email', '$password', '$address','$add_address', '$contact', 'user')";
        
        $user_registration_result=mysqli_query($conn, $user_registration_query) or die(mysqli_error($conn));
        header("location:".SITEURL.'index.php');

        $_SESSION['email']=$email;

        $_SESSION['id']=mysqli_insert_id($conn);

        ?>
        <meta http-equiv="refresh" content="3;url=index.php" />
        <?php
    }
?>