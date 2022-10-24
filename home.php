<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mastermind Login</title>
    <link rel="stylesheet" href="styling.css">

</head>

<body>
    <form method="post" action="login.php">
        Name: <input type="text" name="Username">
        Password: <input type="password" name="Password">
        <input type="submit" name="Login" value="Login">
    </form>
    <a href="register.php"><button type="button">Register Here</button></a>
    <?php
    if(isset($_SESSION['LogErr'])) {?>
        <span style='color:red'>Invalid credentials</span>
    <?php }?>
</body>
</html>