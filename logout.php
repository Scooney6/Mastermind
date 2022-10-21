<?php
session_start();
if (isset($_SESSION["Username"])) {
    unset($_SESSION["Username"]);
    if(isset($_SESSION["Game"])){
        unset($_SESSION["Game"]);
    }
    header("location: home.php");
}
?>
