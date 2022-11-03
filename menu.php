<?php
require "protect.php";
require "rules.php";
?>
<!Doctype html>
<html>
<head>
    <title>Choose your Difficulty</title>
    <link rel="stylesheet" href="styling.css">
</head>
<body>
    <h1 class="fromtop">Hey, <?php echo $_SESSION['Username'];?></h1>
    <div class="fade-in-1">
    <form method="post" action="menu-handler.php">
        <select name="Difficulty">
            <option value="Easy">Easy</option>
            <option value="Medium">Medium</option>
            <option value="Hard">Hard</option>
        </select>
        <input type="submit" name="GameStart" value="Start">
    </form>
    </div>
    <div class="fade-in-2">
    <?php get_rules(); ?>
    </div>
    <br>
    <div class="fade-in-3">
    <a href="logout.php"><button type="button">Logout</button></a>
    </div>
    <br>
</body>
</html>