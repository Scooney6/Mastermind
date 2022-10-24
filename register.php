<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mastermind</title>
</head>
<body>
<form method="post" action="register-handler.php">
    Name: <input type="text" name="Username">
    Password: <input type="password" name="Password">
    <input type="submit" name="Register" value="Register">
</form>
<?php
if(isset($_SESSION['RegErr'])) {?>
    <span style='color:red'>User already registered</span>
<?php }?>
</body>
</html>