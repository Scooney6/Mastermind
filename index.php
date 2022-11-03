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
<h1 class="fromtop">Welcome to <span class="rainbow rainbow_text_animated">Mastermind!</span></h1>
<div class="fade-in-1">
    <a href='login.php'><button type="button">Click here to login </button></a>
    <a href='./register.php'><button type="button">Click here to register </button></a>
</div>
<div class="fade-in-2">
    <h2>Leaderboard:</h2>
</div>
<div class="fade-in-3">
    <?php leaderboard(); ?>
</div>
</body>
</html>