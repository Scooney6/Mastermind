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
<h1 class="fromtop">Mastermind Registration</h1>
<form method="post" action="register-handler.php">
    <div style="padding-bottom: 5px">Username: <input type="text" name="Username"></div>
    Password: <input type="password" name="Password"><br><br>
    <input type="submit" name="Register" value="Register">
</form>
<?php
if(isset($_SESSION['NameErr'])) {?>
    <p class="error"><span style='color:red'>User already registered</span></p>
<?php }
else if(isset($_SESSION['PassErr'])) {?>
    <p class="error"><span style='color:red'>Password must be at least 8 characters and include at least one upper case letter, one number, and one special character.</span></p>
<?php } else { ?>
    <br>
<?php } ?>
<a href="login.php"><button type="button">Login Here</button></a>
</body>
</html>