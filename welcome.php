<?php
require "leaderboard-handler.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mastermind</title>
</head>
<body>
    <h1>Welcome to Mastermind!</h1>
    <a href='./home.php'>Click here to login</a>
    <a href='./register.php'>Click here to Register</a>
    <h2>Leaderboard:</h2>
    <?php leaderboard(); ?>
</body>
</html>