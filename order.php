<?php include('partials-front/header.php'); ?>

<?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
?>

    <?php
        //Check whether food id is set or not
        if(isset($_GET['food_id']))
        {
            //Get the Food id and details of the selected food
            $food_id = $_GET['food_id'];

            //Get the details of the selected food
            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //Check whether the data is available or not
            if($count==1)
            {
                //We have data 
                //Get the data from database
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                //Food not available
                //Redirect to homepage
                header('location:'.SITEURL);
            }
        }
        else
        {
            //Redirect to homepage
            header('location:'.SITEURL);
        }
    ?>

    <!-- Food search section starts here-->
    <section class="food-search">
        <div class="container">

            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>
            
            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Select Food</legend>

                    <div class="food-menu-img">
                        <?php 
                        
                            //Check whether the image is available or not
                            if($image_name=="")
                            {
                                //image not available
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                //Image is Available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicken hawian pizza" class="img-responsive img-curve">
                                <?php
                            }

                        ?>
                        
                    </div>

                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price">₱<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        

                    </div>

                </fieldset>

                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g Reio Benjar Cruz" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="text" name="contact" placeholder="E.g 0998xxxxxxx" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea type="address" name="address" row="10" placeholder="E.g Street, ,Brgy., Municipality" class="input-responsive" required></textarea>

                    <div class="order-label">Payment Method</div>
                    <select name="payment">
                            <option value="">SELECT</option>
                            <option value="Cash on Delivery">Cash on Delivery</option>
                            <option value="Gcash">Gcash</option>
                    </select>
<br><br>
                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php
            
                //Check whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    //Get all the details from the form

                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty;

                    $order_date = date("Y-m-d h:i:sa");

                    $status = "Queuing"; 

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $payment = $_POST['payment'];
                    $customer_address = $_POST['address'];

                    //save the order in database
                    //Create sql to save data
                    $sql2 = "INSERT INTO tbl_order SET
                        food = '$food',
                        price = $price,
                        qty = $qty,
                        total= $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        payment = '$payment',
                        customer_address = '$customer_address'
                    ";

                    //echo $sql2; die();

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether query is executed successfully or not
                    if($res2==true)
                    {
                        //Query Executed and order saved
                        $_SESSION['order'] = "<div class='success text-center'>Ordered Successfully.</div>";
                        echo "<script>window.location.href='index.php';</script>";
                    }
                    else
                    {
                        //Failed to save order
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
                        header('location:'.SITEURL);
                    }
                }
            
            ?>

        </div>
    </section>
    <!-- Food search section starts here-->
    
    <?php include('partials-front/footer.php'); ?>