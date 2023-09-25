<?php include('../config/constants.php'); ?>

<div class="login">
    <div class="wraper">
        <h1 style="text-align:center;"> Register</h1>
        <link rel="stylesheet" href="../css/login.css" class="rel">

        <br>

        <?php if(isset($_SESSION['add']))//Checking whether the session is set or not
        {
            echo $_SESSION['add'];//Display the Session Message if Set
            unset($_SESSION['add']);//Remove Session Message
        }
        ?>

        <form action="" method="POST">

            <table>
                <tr style="text-align:right;">
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr style="text-align:right;">
                    <td>Email:</td>
                    <td>
                        <input type="email" name="email" placeholder="Enter Your Email" required/>
                    </td>
                </tr>

                <tr style="text-align:right;">
                    <td>Contact:</td>
                    <td>
                        <input type="text" name="contact" placeholder="E.g 0998xxxxxxx" class="input-responsive" required>
                    </td>
                </tr>

                <tr style="text-align:right;">
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr style="text-align:right;">
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password">
                    </td>
                </tr>

                <tr style="text-align:right;">
                    <td coldspan="2">
                        <input type="submit" name="submit" value="Register" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>

        <?php include('partials/footer.php'); ?>  

    </div>
</div>

<?php
    //Process the value from Form and Save it in Database
    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button clicked
        //echo "Button Clicked";

        //1. Get the Data from form
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password Encryption with md5
        $contact = $_POST['contact'];

        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO tbl_admin SET
            full_name ='$full_name',
            email ='$email',
            username ='$username',
            password ='$password',
            contact ='$contact'

        ";

        //3. Executing Query and Saving Data into Database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            //echo "Data Inserted";
            //Create a Session Variable to DIsplay Message
            $_SESSION['add'] = "Admin Added Successfully";
            //Redirect page to Manage Admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //Failed to Inser Data
            //echo "Failed to insert Data";
            //Create a Session Variable to DIsplay Message
            $_SESSION['add'] = "Failed to add admin";
            //Redirect page to Add Admin
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }
   
?>