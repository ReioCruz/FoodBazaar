

<?php
    function check_if_added_to_cart($food_id){
        //session_start();
        $user_id=$_SESSION['id'];
        $product_check_query="SELECT * FROM user_items WHERE food_id='$food_id' AND $user_id AND status='Added to cart'";
        $product_check_result=mysqli_query($conn,$product_check_query) or die(mysqli($conn));
        $num_rows=mysqli_num_rows($product_check_result);
        if($num_rows>=1)return 1;
        return 0;
    }
?>
