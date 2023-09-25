<?php include('partials/menu.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <br>
        <!--Main Content Section Starts -->
        <div class="card card-outline card-primary">
	<div class="card-header">
            <h1>Admin Management</h1>

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];//Displaying Session Message
                    unset($_SESSION['add']);//Removing Session Message
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                
                if(isset($_SESSION['']))
                {
                    echo $_SESSION[''];
                    unset($_SESSION['']);
                }

                if(isset($_SESSION['User-not-found']))
                {
                    echo $_SESSIONS['User-not-found'];
                    unset($_SESSION['User-not-found']);
                }
                if (isset($_SESSION['pwd-not-match'])) 
                {
                    echo $_SESSION['pwd-not-match'];
                    unset($_SESSION['pwd-not-match']);
                }

                if (isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd'];
                    unset($_SESSION['change-pwd']);
                }
                
            ?>
            <br>
                <table class="table table-bordered table-stripped">
				<colgroup>
					<col width="5%">
					<col width="15%">
                    <col width="10%">
					<col width="10%">
					<col width="10%">
                    <col width="4%">
				</colgroup>
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Actions</th>                        
                    </tr>
                    

                    <?php
                        //Query to Get all Admin
                        $sql = "SELECT * FROM tbl_admin";
                        //Execute the Query
                        $res= mysqli_query($conn, $sql);

                        //Check whether the Query is Executed of Not
                        if($res==TRUE)
                        {
                            //Count Rows to whether we have data in database or not
                            $count = mysqli_num_rows($res); // Function to get all the rows in database

                            $sn=1; //Create a Variable and Assign the value
                            //Check the num of rows
                            if($count>0)
                            {
                                //We Have data in database
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //Using While loop to get all the data from database.
                                    //And while loop will run as long as we have data in database

                                    //Get individual Data
                                    $id=$rows['id'];                                   
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];
                                    $email=$rows['email'];
                                    $contact=$rows['contact'];

                                    //Display the values in our table
                                    ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $contact; ?></td>

                                        <td align="center">
                                        <div class="form-group col-md-6">
                                            <div class="media widget-ten">
                                                <div class="media-left media-middle">
                                            <h4><a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary"><span class="glyphicon glyphicon-edit"></span></a></h4>
                                                    </div>
                                                    </div>
                                                    </div>
                                            <div class="form-group col-md-6">
                                            <div class="media widget-ten">
                                                <div class="media-left media-middle">
                                            <h4><a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger"><span class="glyphicon glyphicon-remove"></span></a></h4>
                                                    </div>
                                                    </div>      
                                                    </div>          
                                        </tr>

                                    <?php
                                }
                            }
                            else
                            {
                                //We Do not have Data in Database
                            }
                        }

                    ?>

                    
                </table>

            </div>
        </div>
        <!-- Main Content Setion Ends -->
