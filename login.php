<?php session_start();
// Clear Registration errors if they exist
if(isset($_SESSION['NameErr'])) {
    unset($_SESSION['NameErr']);
}
if(isset($_SESSION['PassErr'])) {
    unset($_SESSION['PassErr']);
}
if(isset($_SESSION['MatchErr'])) {
    unset($_SESSION['MatchErr']);
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mastermind Login</title>
    <link rel="stylesheet" href="styling.css">
</head>
<body>
<h1 class="fromtop"><span class="rainbow_text_animated">Mastermind</span> Login</h1>
<div class="wrapper">
    <div></div>
    <div>
    <form method="post" action="login-handler.php">
        <div style="padding-bottom: 5px">Username: <input type="text" name="Username"><br></div>
        Password: <input type="password" name="Password"><br><br>
        <input type="submit" name="Login" value="Login">
        <br><br>
        <a href="register.php"><button type="button">Create an Account</button></a>
    </form>
    </div>
    <div style="text-align: start">
    <?php
    if(isset($_SESSION['LogErr'])) {?>
        <p class="error"><span style='color:red'>Invalid credentials</span></p>
    <?php } ?>
    </div>
</div>
</body>
</html>