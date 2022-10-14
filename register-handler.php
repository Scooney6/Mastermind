<?php
require("login.php");

/* Check Login form submitted */
if(isset($_POST['Register'])){
    /* Check and assign submitted Username and Password to new variable */
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    // If that username already exists, don't let them register

        session_start();
        // Otherwise log them in and add credentials
        $_SESSION['Username']=$Username;
        setNewUser($Username, $Password);
        header("location:menu.php");
        exit();

}
?>
