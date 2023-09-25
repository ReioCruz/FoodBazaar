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
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        //Get the value from database
        $row=mysqli_fetch_array($res);
        
        $shop_name = $row['shop_name'];
    }
        
    
?>

     <!-- Food search section starts here-->
     <section class="food-search text-center" >
        <div class="container">

        <h2>" Foods on <a href="#" class="text-white"><?php echo $shop_name; ?></a>"</h2>
            
            <form action="">
                <input type="search" name="search" placeholder="Search Food..">
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>


<!-- food menu section starts here-->
<section class="food-menu">
        <div class="container text-left">
            <h2 class="text-center">Food Menu</h2>
        <div class="text-left" id="product_list">
            <?php 

            $sql2 ="SELECT p.id, p.title, p.price, v.shop_name, p.image_name FROM product_list as p INNER JOIN vendor_list v on v.id=.p.vendor_id WHERE vendor_id = '$vendor_id'";

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
                    <b><h4><?php echo $row['title']?></h4></b>
                    <b><p class="food-price">₱<?php echo $row['price']?></p></b>
                    <div class="food-detail">Vendor: <?= $row['shop_name']; ?></div>
                    <br>
            
                    <a href="cart_add.php?product_id=<?php echo $product_id; ?>" class="btn btn-primary" onClick="sweet()">Add to Cart</a>
                    <script>
                                function sweet(){
                                    swal({
                                        position:'top-center',
                                        icon:'success',
                                        title:'Food Added to Cart',
                                        showConfirmButton:false,
                                        timer:3000
                                    })
                                }
                            </script>
                </div>
            </div>

            <?php } ?>
            
        </div>  

            <div class="clearfix"></div>

            </div>
            
        <p class="text-center">
            <a href="<?php echo SITEURL; ?>foods.php?food_id=<?php echo $id; ?> ">See All Foods</a>
        </p>
        <br><br>
    </section>
    <!-- food menu section ends here-->


<?php include('partials-front/footer.php'); ?>