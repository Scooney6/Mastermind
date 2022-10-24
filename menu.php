<?php
require "protect.php";
?>
<!Doctype html>
<html>
<head>
    <title>Choose your Difficulty</title>
    <link rel="stylesheet" href="styling.css">

</head>
<body>
    <h1>Hey, <?php echo $_SESSION['Username'];?></h1>
    <form method="post" action="menu-handler.php">
        <select name="Difficulty">
            <option value="Easy">Easy</option>
            <option value="Medium">Medium</option>
            <option value="Hard">Hard</option>
        </select>
        <input type="submit" name="GameStart" value="Start">
    </form>
    <br>
    <a href="logout.php"><button type="button">Logout</button></a>
</body>
</html>