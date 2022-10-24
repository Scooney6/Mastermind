<?php
require("protect.php");
require("leaderboard-handler.php")
?>
<!Doctype html>
<html>
<head>
    <title>Mastermind End Game</title>
    <link rel="stylesheet" href="styling.css">

</head>
<body>
<h1>You won!</h1>
<h2>You're Score: <?php echo($_SESSION["Game"]["Score"]); ?></h2>
<h2>You're Time: <?php echo(round($_SESSION["Game"]["Time"], 2)); ?> Seconds</h2>
<br>
<?php leaderboard(); ?>
<a href="exit-game.php"><button type="button">Back to menu</button></a>
<a href="logout.php"><button type="button">Logout</button></a>

</body>
</html>
