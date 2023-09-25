<?php include('partials-front/header.php'); ?>

    <!-- Food search section starts here-->
    <section class="food-search text-center" >
        <div class="">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

    </section>
    <!-- Food search section starts here-->

<!-- Categories section starts here-->
<section class="categories" >
        <div class="container">

                <a href="<?php echo SITEURL ?>category-foods.php?category_id=<?php echo $id; ?>"><!-- Categories section starts here-->
            
                <section class="categories" >

            <?php 
                //Create SQL Query to Display Categories from Database
                $sql = "SELECT id, shop_name, status, image_name FROM vendor_list WHERE status='active'";
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
                            <div class="box-3 float-container align-center">
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
                                </a>
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
    </section>
    <!-- Categories section end here-->


<?php include('partials-front/footer.php'); ?>