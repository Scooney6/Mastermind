<?php session_start();
// Clear Registration errors if they exist
if(isset($_SESSION['NameErr'])) {
    unset($_SESSION['NameErr']);
}
if(isset($_SESSION['PassErr'])) {
    unset($_SESSION['PassErr']);
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mastermind Login</title>
    <link rel="stylesheet" href="styling.css">
</head>
<body>
    <form method="post" action="login-handler.php">
        Name: <input type="text" name="Username">
        Password: <input type="password" name="Password">
        <input type="submit" name="Login" value="Login">
    </form>
    <a href="register.php"><button type="button">Register Here</button></a>
    <?php
    if(isset($_SESSION['LogErr'])) {?>
        <p class="error"><span style='color:red'>Invalid credentials</span></p>
    <?php }?>
</body>
</html>