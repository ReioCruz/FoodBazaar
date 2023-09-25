<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/login.css">
<body>
    <div class="login">
        <div class="wraper">
            <div class="row">
                <h1><a href="address.php" class="btn-primary">Add Address</a></h1>
                <form method="post" action="address_script.php">
            <table>
                <div class="form-group col-md-6">
                <tr style="text-align:right;">
                    <td>Add Address:</td>
                    <td>
                        <input type="text" name="add_address" placeholder="E.g Street, ,Brgy., Municipality" class="input-responsive" required>
                    </td>
                </tr>
                </div>

                <tr style="text-align:right;">
                    <td coldspan="2">
                        <input type="submit" name="submit" value="Add" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>
            </div>
        </div>
    </div>
    </div>
</body>
</html>