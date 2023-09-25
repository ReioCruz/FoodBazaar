<?php include('partials/home.php'); ?>

<link rel="stylesheet" href="../css/admin.css">


    <?php
        if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
    ?>
        
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title text-center">List of Categories</h3>
		<div class="card-tools text-center">
			<a href="add-category.php" class="btn btn-primary"> Create Category</a>
		<br><br>
        </div>
	</div>
	<div class="card-body text-center">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-stripped">
				<colgroup>
					<col width="1%">
					<col width="15%">
					<col width="10%">
					<col width="5%">
					<col width="5%">
					<col width="2%">
				</colgroup>
				<thead>
					<tr class="bg-gradient-secondary">
					<th>#</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Active</th>
                    <th class="text-center">Actions</th>
                </tr>
				</thead>

                <?php
                    $vendor_id=$_SESSION['id'];
                    //Get all the orders from database
                    $sql = "SELECT * FROM product_list WHERE vendor_id='$vendor_id'";

                    //Execute Query
                    $res = mysqli_query($conn, $sql);

                    //Count Rows
                    $count = mysqli_num_rows($res);

                    $sn = 1; //Create a serial number and set its initial values as 1

                    if($count>0)
                    {
                        //Order Available
                        while($row=mysqli_fetch_assoc($res))
                        {
                            //Get all the order details
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            $price = $row['price'];
                            $active = $row['active'];
                            ?>
                <tr>
                                    <td class="text-center"><?php echo $sn++; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td>
                            <?php
                                //Check whether image name is available or not 
                                if($image_name!="")
                                {
                                    //Display the image
                                    ?>

                                    <img src= "<?php echo SITEURL; ?>/images/category/<?php echo $image_name; ?>" width="100px" >

                                    <?php
                                }
                                else
                                {
                                    //Display The message
                                    echo "<div class='error'>Image not Added.</div>";
                                }
                            ?>
                        </td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $active; ?></td>
                            </td>
                            <div class="menu text-right">
                
                <td align="center">
                <div class="form-group col-md-6">
                    <div class="media widget-ten">
                        <div class="media-left media-middle">
                    <h4><a href="<?php echo SITEURL; ?>Tenant/update-category.php?id=<?php echo $id; ?>"><span class="glyphicon glyphicon-edit"></span></a></h4>
                            </div>
                            </div>
                            </div>
                    <div class="form-group col-md-6">
                    <div class="media widget-ten">
                        <div class="media-left media-middle">
                    <h4><a href="<?php echo SITEURL; ?>Tenant/remove_category.php?id=<?php echo $id;?>"><span class="glyphicon glyphicon-remove"></span></a></h4>
                            </div>
                            </div>      
                            </div>          
                </td>

                        </tr>
                        <?php
                        }
                    }
                    ?>