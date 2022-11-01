<?php
session_start();
// Checks if the user is logged in (only logged-in users will have this session variable), will otherwise redirect
if (!isset($_SESSION["Username"])) {
    header("Location: welcome.php");
    exit();
}
?>