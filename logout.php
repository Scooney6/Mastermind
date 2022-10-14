<?php
session_start();
if (isset($_SESSION["Username"])) {
    unset($_SESSION["Username"]);
    header("home.php");
}
?>
