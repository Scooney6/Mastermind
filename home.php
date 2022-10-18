<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<body>
    <form method="post" action="login.php">
        Name: <input type="text" name="Username">
        Password: <input type="password" name="Password">
        <input type="submit" name="Login">
    </form>
    <a href="register.php">Register Here</a>
    <?php
    if(isset($_SESSION['LogErr'])) {?>
        <span style='color:red'>Invalid credentials</span>
    <?php }?>
</body>
</html>