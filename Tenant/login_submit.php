<?php
    require '../config/constants.php';
    
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $password=md5(mysqli_real_escape_string($conn,$_POST['password']));
    if(strlen($password)<6){
        echo "Password should have atleast 6 characters. Redirecting you back to login page...";
        ?>
        <meta http-equiv="refresh" content="2;url=login.php" />
        <?php
    }
    $user_authentication_query="SELECT id, username FROM vendor_list WHERE username='$username' AND password='$password'";
    $user_authentication_result=mysqli_query($conn,$user_authentication_query) or die(mysqli_error($conn));
    $rows_fetched=mysqli_num_rows($user_authentication_result);
    if($rows_fetched==0){
        ?>
        <script>
            window.alert("wrong username or password");
        </script>
        <meta http-equiv="refresh" content="1;url=login.php" />
        <?php
    }else{
        $row=mysqli_fetch_array($user_authentication_result);
        $_SESSION['username']=$username;
        $_SESSION['id']=$row['id'];
        header("location: index.php");
    }
?>