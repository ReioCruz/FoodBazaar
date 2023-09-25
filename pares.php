
<?php include('partials-front/header.php'); ?>

    <!-- Food search section starts here-->
    <section class="food-search text-center" >
        <div class="container">
            <?php 
            
                    //Get the search Keyword
                    //$search = $_POST['search'];
                    $search = mysqli_real_escape_string($conn,$_POST['pares']);
            
            ?>

            <h2><a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- Food search section starts here-->

    <!-- food menu section starts here-->
    <section class="food-menu">
        <div class="container text-right">
            <h2 class="text-center">Food Menu</h2>
        <div class="text-left" id="product_list">

            <?php 
            


                //SQL Query to get foods based on search keyword
                //$search = burger '; DROP database name;
                // "SELECT * FROM tbl_food WHERE title LIKE '%burger'%' OR description LIKE '%burger%'";
                $sql = "SELECT p.id, p.title, p.price, v.shop_name, p.vendor_id, p.image_name FROM product_list as p INNER JOIN vendor_list v on v.id=.p.vendor_id WHERE title LIKE '%$search%' OR shop_name LIKE '%$search%'";

                //Execute the Query
                
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $count = mysqli_num_rows($res);
            while($row=mysqli_fetch_array($res)){

            }

                $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                $count = mysqli_num_rows($res);
                while($row=mysqli_fetch_array($res))
                {
                $product_id = $row['id'];
                $vendor_id = $row['id'];
                $image_name = $row['image_name'];
                //echo "$sql";
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