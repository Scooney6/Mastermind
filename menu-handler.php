<?php
require("protect.php");
if(isset($_POST["Difficulty"])) {
    $_SESSION["Game"]["Difficulty"] = $_POST["Difficulty"];
    $_SESSION["Game"]["Round"] = 1;
    header("Location: game.php");
    exit();
}
