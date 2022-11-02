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
    <h1 class="fromtop">Mastermind Login</h1>
    <form method="post" action="login-handler.php">
        <div style="padding-bottom: 5px">Username: <input type="text" name="Username"><br></div>
        Password: <input type="password" name="Password"><br><br>
        <input type="submit" name="Login" value="Login">
    </form>
    <?php
    if(isset($_SESSION['LogErr'])) {?>
        <p class="error"><span style='color:red'>Invalid credentials</span></p>
    <?php } else { ?>
        <br>
    <?php } ?>
    <a href="register.php"><button type="button">Register Here</button></a>
</body>
</html>