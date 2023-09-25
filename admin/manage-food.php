<?php include('partials/tenant.php'); ?>

<div class="main-content">
    <div class="wrapper">
    <h1> Food Management </h1> 

    <br /><br />

        <!-- Button to Add Admin -->
        <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary"> Add Food</a>

        <br /><br /><br />

        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset ($_SESSION['delete']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if(isset($_SESSION['unathorize']))
            {
                echo $_SESSION['unauthorize'];
                unset ($_SESSION['unauthorize']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset ($_SESSION['update']);
            }
        
        ?>

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Category</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>

            <?php 
                //Create a SQL Query to get all the food
                $sql = "SELECT * FROM food_cat_view";

                //Execute the query
                $res = mysqli_query($conn, $sql);

                //Count rows to check whether we have food or not
                $count = mysqli_num_rows($res);

                //Create Serial Number Variable and Set Default Value as 1
                $sn=1;

                if($count>0)
                {
                    //We have food in Database
                    //Getthe Food from Database and Display
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the values from individual columns
                        $id = $row['food_id'];
                        $title = $row['food_title'];
                        $price = $row['price'];
                        $image_name = $row['f_image'];
                        $category = $row['cat_title'];
                        $featured = $row['f_featured'];
                        $active = $row['f_active'];
                        ?>

                        <tr>
                            <td><?php echo $sn++; ?>.</td>
                            <td><?php echo $title; ?></td>
                            <td>₱<?php echo $price; ?></td>
                            <td>
                                <?php
                                    //Check whether we have image or not
                                    if($image_name=="")
                                    {
                                        //We do not have image, Display Error Message
                                        echo "<div class='error'>Image not Added.</div>";
                                    }
                                    else
                                    {
                                        //We have image. Display image
                                        ?>
                                        <img src="<?php echo SITEURL; ?>/images/food/<?php echo $image_name; ?>" width="100px">
                                        <?php
                                    }
                                ?>
                                <td>
                                <?php 
                                if($category=="")
                                {
                                    echo "<div class='error'>No Category.</div>";
                                }
                                else
                                {
                                    echo $category;
                                }
                                ?>
                                </td>

                            </td>
                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Food</a>
                            </td>
                        </tr>

                        <?php
                    }
                }
                else
                {
                    //Food not Added in Database
                    echo "<tr><td colspan='7' class='error'> Food not Added Yet.</td></tr>";
                }
            ?>  
           

        </table>
        </div>
        </div>

<?php include('partials/footer.php');?>