<script src="js/sweetalert.min.js"></script>
<?php
    require 'config/constants.php';
        //Category id is set and get id
        if(isset($_GET ['product_id']))
        {
            //Category id is set and get id
            $product_id = $_GET['product_id'];
        }

    $user_id=$_SESSION['id'];
    $sql = "SELECT * FROM user2 WHERE id=$user_id";
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $count = mysqli_num_rows($res);
    
    if($count>0)
    {
        while($row=mysqli_fetch_array($res))
        {
            $contact = $row['contact'];
            $address = $row['address'];

    $user_id=$_SESSION['id'];
    $add_to_cart_query="INSERT INTO user_items (user_id, product_id,  status, address, contact) VALUES ('$user_id', $product_id, 'Added to cart', '$address', '$contact' )";
    $add_to_cart_result=mysqli_query($conn, $add_to_cart_query) or die(mysqli_error($conn));
    //echo "$add_to_cart_query";

    $_SESSION['order'] = "Order Success";
    $_SESSION['order_code'] = "success";
    header("location:".SITEURL);  
        }
    }
?>