<?php
        require 'config/constants.php';

        $user_id=$_SESSION['id'];
        $user_products_query = "SELECT v.id, p.title, v.shop_name, p.price, ut.address, ut.contact FROM user_items as ut INNER JOIN product_list p on p.id=.ut.product_id INNER JOIN vendor_list v on v.id=.p.vendor_id WHERE user_id='$user_id'";
       
        $user_products_result=mysqli_query($conn,$user_products_query) or die(mysqli_error($conn));
        $no_of_user_products=mysqli_num_rows($user_products_result);
        $counter=1;
        $sum=0;
        $prefix= date('Ym-');
        $code= sprintf("%'.03d", + 1);
        while(true){
            $check ="SELECT * FROM order_list WHERE code = '{$prefix}{$code}' AND user_id = '$user_id'";
            $c = mysqli_query($conn, $check) or die(mysqli_error($conn));
            $row = mysqli_num_rows($c);
            if($row > 0){
                $code = sprintf("%'.01d",ceil($code) + 1 );
            }else{
                break;
            }
        }
        
        while($row=mysqli_fetch_array($user_products_result)){
        $sum=$sum+$row['price'];
                $vendor_id = $row['id'];
                $food = $row['title'];
                $price = $row['price'];
                $shop_name = $row['shop_name'];
                $ref_code = $prefix.$user_id.$code;
                $order_date = date("Y-m-d");

                $qty = $_POST['qty'];

                $total = $price * $qty;

                $payment = $_POST['payment'];
                $address = $row['address'];
                $contact = $row['contact'];
                
                $sql = "INSERT INTO order_list (code, food, user_id, vendor_id, price, qty, total, order_date, delivery_address, status, payment, contact) VALUES ('$ref_code', '$food', '$user_id', '$vendor_id', $price, $qty, $total, '$order_date','$address', 'Pending', '$payment', '$contact')";
                //echo "$sql";
                $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                if($res==true)
                {
                    $_SESSION['bill'] = "Order Successfully.";
                    $_SESSION['bill_code'] = "success";
                    header('location:'.SITEURL.'index.php');
                }
                else
                {
                    //Failed to update
                    $_SESSION['bill'] = "<div class='error'>Failed to Update Order.</div>";
                    header('location:'.SITEURL.'Cart.php');
                }
            }
                
                ?>