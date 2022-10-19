<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<body>
   

    <?php
     require __DIR__ . '/common.php';
    echo "
    <h1>Welcome to Mastermind!</h1>
    <a href='./home.php'>Click here to login</a>
    <a href='./register.php'>Click here to Register</a>
    <h2>Current Leaderboard:</h2>
    ";
    leaderboad();   
    if(isset($_SESSION['LogErr'])) {?>
        <span style='color:red'>Invalid credentials</span>
    <?php }?>
</body>
</html>