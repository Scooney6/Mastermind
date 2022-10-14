<?php
// (A) START SESSION
session_start();

// (C) REDIRECT TO LOGIN PAGE IF NOT LOGGED IN
if (!isset($_SESSION["Username"])) {
    header("Location: home.php");
    exit();
}
?>