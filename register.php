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
<form method="post" action="register-handler.php">
    Name: <input type="text" name="Username">
    Password: <input type="password" name="Password">
    <input type="submit" name="Register" value="Register">
</form>
<a href="login.php"><button type="button">login Here</button></a>
<?php
if(isset($_SESSION['NameErr'])) {?>
    <p class="error"><span style='color:red'>User already registered</span></p>
<?php }
else if(isset($_SESSION['PassErr'])) {?>
    <p class="error"><span style='color:red'>Password must be at least 8 characters and include at least one upper case letter, one number, and one special character.</span></p>
<?php }?>
</body>
</html>