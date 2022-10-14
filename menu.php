<?php
require "protect.php";
?>
<!Doctype html>
<html>
<head>
    <title>Sah dude!</title>
</head>
<body>
    <h1>Hey, <?php echo $_SESSION['Username'];?></h1>

    <a href="logout.php">Logout</a>
</body>
</html>


<?php
/*
  * Difficulty dropdown, new game button -> newgame
  * Logout button
  * Your highscores
*/