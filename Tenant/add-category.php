<?php include('partials/home.php'); ?>


<link rel="stylesheet" href="../css/admin.css">

<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title text-center">List of Categories</h3>
		<div class="card-tools text-center">
		<br><br>
    </div>
</div>

<div class="container-fluid">    
<form action="" method="POST"  enctype="multipart/form-data" id="product-form">

            <input type="hidden" name="id">
            <div class="row">
                <div class="col-md-4">
                <div class="form-group">
                    <label for="title" class="control-label">Title: </label>
                    <input type="title" id="title" name="title" class="form-control form-control-sm form-control-border" required>
                </div>

                    <div class="form-group">
                        <label for="image" class="control-label">Select Image</label>
                        <input type="file" id="image" name="image" class="form-control-sm form-control-border">
                    </div>

                    <div class="form-group">
                        <label for="price" class="control-label">Price</label>
                        <input type="number" id="price" name="price" class="form-control form-control-sm form-control-border">
                    </div>
                    <label for="featured" class="control-label">Active: </label>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>

                    <label for="category" class="control-label">Category </label>
                    <select name="category" id="">
                        <option value="Appetizer">Appetizer</option>
                        <option value="Beverage">Beverage</option>
                        <option value="Main">Main Course</option>
                        <option value="Dessert">Dessert</option>
                    </select>

                    <label for="add_category" class="control-label"> </label>
                    <select name="add_category" id="">
                        <option value="Appetizer">Appetizer</option>
                        <option value="Beverage">Beverage</option>
                        <option value="Main">Main Course</option>
                        <option value="Dessert">Dessert</option>
                        <option value="Korean">Korean's Food</option>
                        <option value="Japanese">Japanese's Food</option>
                    </select>

                    <tr>
                        <br>
                    <td colspan="3">
                        <input type="submit" name="submit" value="Add Category" class="btn-primary">
                    </td>
                    </tr>

                </div>
            </div>

            </table>

            </form>
            <?php 
        
            //Check whether the submit button is clicked or nott
            if(isset($_POST['submit']))
            {
                //echo "Clicked";

                //1. Get the value from category form
                $id = $_POST['id'];
                $title = $_POST['title'];
                $price = $_POST['price'];
                $category = $_POST['category'];
                $add_category = $_POST['add_category'];

                // For Radio input, we need to check whether the button is selected or not

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No";
                }

                //check whether the image is selected or not and set the value for image name accordingly
                //print_r($_FILES['image']);

                //die();//Break the code Here

                if(isset($_FILES['image']['name']))
                {
                    //Upload the image
                    //To upload image we need image name, source path and destination path
                    $image_name = $_FILES['image']['name'];

                    //Upload the image only if image is selected
                    if($image_name !="")
                    {
                        //Auto Rename our Image
                        //Get the Extenstion of our image (jpg, png, gif, etc) e.g. "specialfoof1.jpg"
                        $ext = end(explode('.', $image_name));

                    //Rename the Image
                    $image_name = "Food_category_".rand(0000, 9999).'.'.$ext; // e.g. Food_Category_834.jpg
                        

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/category/".$image_name;

                        //Finally upload the image
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //Check whether the image is uploaded or not
                        //And if the image is not uploaded then we will stop the process and redirect with error message
                        if($upload==false)
                        {
                            //Set message
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                            //Redirect to add category page
                            header("location:".SITEURL.'Tenant/add-category.php');
                            //Stop the process
                            die();
                        }
                    }
                }
                else
                {
                    //Don't upload the image and set the image_name value as blank
                    $image_name="";
                }
                
                $vendor_id = $_SESSION['id'];
                //2. Create SQL Query to insert category into database
                $sql = "INSERT INTO product_list SET 
                    vendor_id='$vendor_id',
                    title='$title',
                    image_name='$image_name',
                    price='$price',
                    category='$category',
                    add_category='$add_category',
                    active='$active'
                ";
                //echo "$sql";

                //3. Execute the Query and Save in Database
                $res = mysqli_query($conn, $sql);

                //4. Check whether the query executed or not and data added or not
                if($res==true)
                {
                    //Query Executed and Category added
                    $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                    //Redirect to Manage Category Page
                    echo "<script>window.location.href='category.php';</script>";
                }
                else
                {
                    //Failed to add Category
                    $_SESSION['add'] = "<div class='error'>Failed to Add Category</div>";
                    //Redirect to Manage Category Page
                    echo "<script>window.location.href='add-category.php';</script>";
                }
            }

        ?>
        </div>

        <div class="clearfix"></div>
        <br><br>

<?php include('partials/footer.php'); ?>