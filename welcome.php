<?php
require "leaderboard-handler.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Mastermind</title>
    <link rel="stylesheet" href="styling.css">

</head>
<body>
    <h1 class="fromtop">Welcome to Mastermind!</h1>
    <a href='login.php'><button type="button">Click here to login </button></a>
    <a href='./register.php'><button type="button">Click here to register </button></a>
    <h2>Leaderboard:</h2>
    <?php leaderboard(); ?>
</body>
</html>