<?php
session_start();
// Remove all cookies and return to welcome page
if (isset($_SESSION["Username"])) {
    unset($_SESSION["Username"]);
    if(isset($_SESSION["Game"])){
        unset($_SESSION["Game"]);
    }
    header("location: welcome.php");
}
?>
