<?php include('partials-front/index.php'); ?>

    <!-- Food search section starts here-->
    <section class="food-search text-center" >
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- Food search section starts here-->

    <?php
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
        
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
    ?>

    <!-- Categories section starts here-->
    <section class="categories" >
        <div class="container">
            <h2 class="text-center">Explore FoodPark</h2>

            <?php 
                //Create SQL Query to Display Categories from Database
                $sql = "SELECT * FROM tbl_category1 WHERE active='Yes' AND featured='Yes'";
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
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>

                        <a href="<?php echo SITEURL ?>category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
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
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>

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
    </section>
    <!-- Categories section end here-->


    <!-- food menu section starts here-->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            
            //Getting foods from database that are active and featured
            //SQL Query
            $sql2 ="SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes'";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Count Rows
            $count2 = mysqli_num_rows($res2);

            //Check whether food available or not
            if($count2>0)
            {
                //Food Available
                while($row=mysqli_fetch_assoc($res2))
                {
                    //Get all the values
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
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
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicken Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }
                        ?>

                    </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="foo-price">₱<?php echo $price; ?></p>
                    <p class="food-detail">
                        <?php echo $description; ?>
                    </p>
                    
                    <br>

                    <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                    <a href="<?php echo SITEURL; ?>Cart.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Add Order</a>

                </div>
            </div>

            <?php

                }
            }
            else
            {
                //Food not available
                echo "<div class='error'>Food not available.</div>";
            }

            ?>

        
            

            <div class="clearfix"></div>

            </div>

        <p class="text-center">
            <a href="<?php echo SITEURL; ?>foods.php?food_id=<?php echo $id; ?> ">See All Foods</a>
        </p>
    </section>
    <!-- food menu section ends here-->

<?php include('partials-front/footer.php'); ?>