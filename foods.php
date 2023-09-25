<?php include('partials-front/header.php'); ?>
<?php
    require 'check_if_added.php';
?>
     <!-- Food search section starts here-->
     <section class="food-search text-center" >
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search Food..">
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Food search section starts here-->

    <!-- food menu section starts here-->
    <section class="food-menu">
        <div class="container text-left">
            <h2 class="text-center">Food Menu</h2>
        <div class="text-left" id="product_list">
            <?php 
            $vendor_id=$_SESSION['id'];
            //Getting foods from database that are active and featured
            //SQL Query
            $sql2 ="SELECT p.id, p.title, p.price, v.shop_name, p.image_name FROM product_list as p INNER JOIN vendor_list v on v.id=.p.vendor_id WHERE active='Yes'";

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
                    <b><p class="food-price">₱<?php echo $row['price']?></p></b>
                    <div class="food-detail">Vendor: <?= $row['shop_name']; ?></div>
                    <input type="hidden" name="qty" value="1">
                    <br>

                    <a href="cart_add.php?product_id=<?php echo $product_id; ?>" onClick="sweet()" class="btn btn-primary">Add to Cart</a>

                    <script>
                                function sweet(){
                                    swal({
                                        position:'top-center',
                                        icon:'success',
                                        title:'Food Added to Cart',
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