<?php include('../config/constants.php'); ?>


<div class="login">
    <div class="wraper">
        <h1 style="text-align:center;"><a href="manage-tenant.php" class="btn-primary">Register</a></h1>
        <link rel="stylesheet" href="../css/login.css" class="rel">

        <form action="vendor_registration_script.php" method="POST" enctype="multipart/form-data">

            <table>
                <tr class="form-group col-md-6">
                <td for="shop_name" class="control-label">Shop Name</td>
                    <td>
                    <input type="text" id="shop_name" autofocus name="shop_name" class="form-control-sm form-control-border" required>
                    </td>
                </tr>

                    <tr class="form-group col-md-6">
                        <td for="shop_owner" class="control-label">Shop Owner Name</td>
                        <td>
                        <input type="text" id="shop_owner" name="shop_owner" class="form-control-sm form-control-border" required>
                        </td>
                    </tr>

                    <tr class="form-group col-md-6">
                        <td for="shop_manager" class="control-label">Shop Manager Name</td>
                        <td>
                        <input type="text" id="shop_manger" name="shop_manager" class="form-control-sm form-control-border" required>
                        </td>
                    </tr>
                    
                    <div class="form-group">
                        <label for="image" class="control-label">Select Image</label>
                        <input type="file" id="image" name="image" class="form-control-sm form-control-border">
                    </div>

                    <tr class="form-group col-md-3">
                        <td for="contact" class="control-label">Contact</td>
                        <td>
                        <input type="text" id="contact" name="contact" class="form-control-sm form-control-border" placeholder="E.g 0998xxxxxxx" required>
                        </td>
                    </tr>

                    <tr class="form-group col-md-3">
                        <td for="username" class="control-label">Username</td>
                        <td>
                        <input type="text" id="username" name="username" class="form-control-sm form-control-border" required>
                        </td>
                    </tr>

                    <tr class="form-group col-md-3">
                        <td for="password" class="control-label">Password</td>
                        <td>
                        <input type="password" id="password" name="password" class="form-control-sm form-control-border" required>
                        </td>
                    </tr>
                    
                    <tr class="form-group col-md-3">
                        <td for="address" class="control-label">Complete Address</td>
                        <td>
                        <input type="text" id="address" name="address" class=" form-control-border" placeholder="E.g Street, ,Brgy., Municipality" required>
                        </td>
                    </tr>

                <tr style="text-align:right;">
                    <td coldspan="2">
                        <input type="submit" name="submit" value="Register" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>