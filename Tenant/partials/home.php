<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Food Park Site</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/sweetalert.min.js"></script>

    <!--Link our css file-->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <!-- Navbar section starts here-->
    <section class="navbar">
        <div class="">
            <div class="logo">
                <img src="../images/diversion.png" alt="FoodPark Logo" class="img-responsive align-center">
            </div>

            <br><br>
            <div class="menu text-center">
                <ul>
                    <li>
                    <a href="index.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
                    </li>

                    <li>
                        <a href="category.php"><span class="glyphicon glyphicon-folder-close"></span> Product List</a>
                    </li>

                    <li>
                        <a href="order.php"><span class="glyphicon glyphicon-list"></span> Order List</a>
                    </li>
                    
                    <li class="dropdown">
                        <a href="order_report.php"><span class="glyphicon glyphicon-list-alt"></span> Sales Report</a>
                    </li>

                    <li>
                        <a href="../home.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>              
                    
                    <?php
                    $vendor_id=$_SESSION['id'];
                    $sql = "SELECT * FROM vendor_list WHERE id='$vendor_id'";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    if($count>0)
                    {
                        while($row=mysqli_fetch_array($res))
                        {
                            $status = $row['status'];
                            ?>
                    <li>
                    <a href="update-status.php">
                        <?php
                            if($status=="Active")
                            {
                                echo "<label class='label label-success'>$status</label>";
                            }
                            elseif($status=="Inactive")
                            {
                                echo "<label class='label label-danger'>$status</label>";
                            }
                        ?>
                        <?php
                        }
                    }
                    ?>
                    </a>
                    </li>
                </ul>
            
                </div>
            
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar section starts here-->