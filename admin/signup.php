<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form action="login.php" method="POST">
            <h2>Login</h2>
            <?php
                if(isset($_GET['error']))
                {
                    ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    
            <label>Username</label>
            <input type="text" name="username" placeholder="User Name"><br>

            <label>Password</label>
            <input type="password" name="password" placeholder="Password"><br>

            <button type="submit">Sign Up</button>
            <a href="index.php" class="btn-primary">Create an account</a>
        </form>
    </body>
</html>