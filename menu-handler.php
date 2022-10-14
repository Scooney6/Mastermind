<?php
require("protect.php");
if(isset($_POST["Difficulty"])) {
    $_SESSION["Difficulty"] = $_POST["Difficulty"];
    header("Location: game.php");
    exit();
}
