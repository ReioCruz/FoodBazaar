<?php include('partials-front/header.php'); ?>
<?php 
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }else{
        $confirm_query="UPDATE user_items SET qty='$qty' payment='$payment' total='$sum' status='Confirmed'";
        $confirm_query_result=mysqli_query($conn, $confirm_query) or die(mysqli_error($conn));
    }
?>
<!DOCTYPE html>
<html>
<section class="food-search"> 
    <body>
        <div class="container text-center">
            <div class="row">
                <div class="col-xs-6">
                    
                        <div class="panel-heading">
                            <div class="panel-body">
                                <p>Your Order is Confirmed. Thank you for Ordering with us. <p>Order Again?</p> <a href="index.php">Click Here</a> to Purchase any other item.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </section>
</html>
<br><br><br><br>
<?php include('partials-front/footer.php'); ?>