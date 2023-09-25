<?php include('partials-front/header.php'); ?>

<br>
    <!-- Food search section starts here-->
    <section class="food-search text-center" >
        <div class="">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

    </section>
    <!-- Food search section starts here-->

    <script language="javascript" type="text/javascript">
    window.history.forward();
    </script>

    <?php
        if(isset($_SESSION['order']))
        {
            ?>
            <script>
            function sweet (){
            swal({
                title: "<?php echo $_SESSION['order']; ?>",
                icon: "<?php echo $_SESSION['order_code']; ?>",
            });
            }
            </script>
            <?php
            unset($_SESSION['order']);
        }
        
        if(isset($_SESSION['bill']))
        {
            ?>
            <script>
            swal({
                title: "<?php echo $_SESSION['bill']; ?>",
                icon: "<?php echo $_SESSION['bill_code']; ?>",
                showConfirmButton: false,
                timer: 1500
            });
            </script>
            <?php
            unset($_SESSION['bill']);
        }

        if(isset($_SESSION['login']))
        {
            ?>
            <script>
            swal({
                title: "<?php echo $_SESSION['login']; ?>",
                icon: "<?php echo $_SESSION['login_code']; ?>",
                showConfirmButton: false,
                timer: 1500
            });
            </script>
            <?php
            unset($_SESSION['login']);
        }
    ?>

    <!-- Categories section starts here-->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Diversion Food Bazaar</h2>

            
            <div class="menu text-center">
                <ul>
                     <li><a href="appetizer.php">Appetizer</a></li>

                     <li><a href="main-course.php">Main Course</a></li>

                    <li><a href="dessert.php">Dessert</a></li>

                    <li><a class="dropdown-item" href="beverage.php">Beverage</a></li>
                </ul>
            </div>

            <div class="food-menu-desc dropdown">
            <button class=" btn-primary dropdown-toggle" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">Categories</button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

            <form action="<?php echo SITEURL; ?>milk-tea.php" method="POST">
            <li>
                <input type="submit" name="milktea" value="milktea" class="btn-danger">
            </li>
            </form>

            <p></p>

            <form action="<?php echo SITEURL; ?>sushi.php" method="POST">
            <li>
                <input type="submit" name="sushi" value="sushi" class="btn-danger">
            </li>
            </form>

            <p></p>
            
            <form action="<?php echo SITEURL; ?>pares.php" method="POST">
            <li>
                <input type="submit" name="pares" value="pares" class="btn-danger">
            </li>
            </form>

            </ul>
            </div>
            </div>

            <br>

<!-- Shop section starts here-->
<section class="categories" >
        <div class="container">

                <a href="<?php echo SITEURL ?>category-foods.php?category_id=<?php echo $id; ?>"><!-- Categories section starts here-->
            <?php 
                //Create SQL Query to Display Categories from Database
                $sql = "SELECT id, shop_name, status, image_name FROM vendor_list WHERE status='active' ORDER BY id DESC LIMIT 5";
                //Execute the Query
                $res = mysqli_query($conn, $sql);
                //Count rows to check whether the category is available or not
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    //Categories Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the values like id, title, image_name
                        $id = $row['id'];
                        $status = $row['status'];
                        $shop_name = $row['shop_name'];
                        $image_name = $row['image_name'];
                        ?>

                        <a href="<?php echo SITEURL ?>category-foods.php?vendor_id=<?php echo $id; ?>">
                            <div class="box-4 float-container align-center">
                                <?php
                                    //Check whether image is available or not
                                    if($image_name=="")
                                    {
                                        //Display Message
                                        echo "<div class='error'>image not Available</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/profile/<?php echo $image_name; ?>" alt="pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                        <br>
                        <h4 class="text-center">
                        <?php
                            if($status=="Active")
                            {
                                echo "<a href='category-foods.php?vendor_id=$id'> <span class='btn btn-success'>$shop_name</span> </a>";
                           
                            }
                            elseif($status=="Inactive")
                            {
                                echo "<label class='label label-danger'>$shop_name</label>";
                            }
                        ?>
                        </a>
                        </h4>
                        </div>
                        <?php
                    }
                }
                else
                {
                    //Categories not Available
                    echo "<div class='error'>Category not Added.</div>";
                }
                
            ?>

            <div class="clearfix"></div>
        </div>
        </div>
    </section>
    <!-- Categories section end here-->

    <!-- food menu section starts here-->
    <section class="food-menu">
        <div class="container text-left">
            <h2 class="text-center">Food Menu</h2>
        <div class="text-left" id="product_list">
            <?php 
            $vendor_id=$_SESSION['id'];
            //Getting foods from database that are active and featured
            //SQL Query
            $sql2 ="SELECT p.id, p.title, p.price, v.shop_name, p.image_name FROM product_list as p INNER JOIN vendor_list v on v.id=.p.vendor_id WHERE active='Yes' ORDER BY id DESC LIMIT 4 ";

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


                </div>
            </div>

            <?php } ?>
            
        </div>  
            
            <div class="clearfix"></div>

            
        </div>
    </section>
    <!-- food menu section ends here-->

<?php include('partials-front/footer.php'); ?>