<?php session_start();
// Clear login errors if they exist
if(isset($_SESSION['LogErr'])) {
    unset($_SESSION['LogErr']);
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mastermind Register</title>
    <link rel="stylesheet" href="styling.css">
</head>
<body>
<h1 class="fromtop"><span class="rainbow_text_animated">Mastermind</span> Registration</h1>
<div class="wrapper">
    <div style="display: grid; grid-template-columns: 1fr 1fr;">
        <div></div><div>Password must be at least 8 characters and include at least one upper case letter, one number, and one special character.</div>
    </div>
    <div>
        <form method="post" action="register-handler.php">
            <div style="padding-bottom: 5px">Username: <input type="text" name="Username"></div>
            <div style="padding-bottom: 5px">Password: <input type="password" name="Password"></div>
            Re-Enter Password: <input type="password" name="Password2">
            <br><br>
            <input type="submit" name="Register" value="Create Account">
        </form>
        <br>
        <a href="login.php"><button type="button">Login Here</button></a>
    </div>
    <div style="text-align: start">
        <?php
        if(isset($_SESSION['NameErr'])) {?>
            <p class="error"><span style='color:red'>User already registered</span></p>
        <?php }
        else if(isset($_SESSION['PassErr'])) {?>
            <p class="error"><span style='color:red'>Password does not meet requirements!</span></p>
        <?php } else if(isset($_SESSION['MatchErr'])) {?>
            <p class="error"><span style='color:red'>Passwords do not match!</span></p>
        <?php } ?>
    </div>
</div>
</body>
</html>