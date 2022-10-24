<?php
require("protect.php");
// Set necessary session variables for the game to start
if(isset($_POST["Difficulty"])) {
    $_SESSION["Game"]["Difficulty"] = $_POST["Difficulty"];
    $_SESSION["Game"]["Round"] = 0;
    header("Location: game.php");
    exit();
}
