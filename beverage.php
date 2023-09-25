<?php include('partials-front/header.php'); ?>


<?php 
    //Check whether id is passed or not
    if(isset($_GET ['vendor_id']))
    {
        //Category id is set and get id
        $vendor_id = $_GET['vendor_id'];
        //Get the category title based on category ID
        $sql = "SELECT shop_name FROM vendor_list WHERE id=$vendor_id";

        //Execute the QUery
        $res = mysqli_query($conn, $sql);

        //Get the value from database
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        while($row=mysqli_fetch_array($res))
        {
        $shop_name = $row['shop_name'];
        
    }
?>

    
            
        <?php
    }
    ?>
    <!-- Food search section starts here-->

    <section class="food-menu">
        <div class="container text-left">
            <h2 class="text-center">Beverage</h2>
        <div class="text-left" id="product_list">
            <?php 

            $sql2 ="SELECT p.id, p.title, p.price, v.shop_name, p.vendor_id, p.image_name FROM product_list as p INNER JOIN vendor_list v on v.id=.p.vendor_id WHERE category='beverage'";

            $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
            $count2 = mysqli_num_rows($res2);
            while($row=mysqli_fetch_array($res2)){

            }

                $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
                $count2 = mysqli_num_rows($res2);
                $counter=1;
                while($row=mysqli_fetch_array($res2))
                {
                $product_id = $row['id'];
                $vendor_id = $row['id'];
                $image_name = $row['image_name'];
                //echo "$res";
                    //Get all the values
                    ?>

                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <?php 
                            //Check whether image available or not
                            if($image_name=="")
                            {
                                //Image not Available
                                echo "<div class='error'>Image not available.</div>";
                            }
                            else
                            {
                                //Image available
                                ?>
                                <img src="<?php echo SITEURL; ?>/images/category/<?php echo $image_name; ?>" alt="Chicken Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }
                        ?>
                    </div>

                <div class="food-menu-desc">
                    <h4><?php echo $row['title']?></h4>
                    <p class="food-price">₱<?php echo $row['price']?></p>
                    <div>Vendor: <?= $row['shop_name']; ?></div>
                    <br>
            
                    <a href="cart_add.php?product_id=<?php echo $product_id; ?>" class="btn btn-primary" onClick="sweet()">Add to Cart</a>
                    <script>
                                function sweet(){
                                    swal({
                                        position:'top-center',
                                        icon:'success',
                                        title:'Food Added to Cart',
                                        showConfirmButton:false,
                                        timer:1500
                                    })
                                }
                            </script>
                </div>
            </div>

            <?php } ?>
            
        </div>  

            <div class="clearfix"></div>

            </div>
    </section>
    <!-- food menu section ends here-->


<?php include('partials-front/footer.php'); ?>