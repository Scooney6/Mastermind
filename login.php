<?php
/* Check Login form submitted */
if(isset($_POST['Login'])){
    session_start(); /* Starts the session */
    /* Check and assign submitted Username and Password to new variable */
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    $logins = fopen("logins.txt", "r");

    while (($login = fgets($logins)) !== false) {
        $loginCredentials = explode(',', $login);
        /* Check Username and Password existence in defined array */
        if (($loginCredentials[0] == $Username) && (trim($loginCredentials[1]) == $Password)){
            /* Success: Set session variables and redirect to Protected page  */
            $_SESSION['Username']=$Username;
            if(isset($_SESSION['LogErr'])) {
                unset($_SESSION['LogErr']);
            }
            header("location:menu.php");
            exit();
        }
    }

    /*Unsuccessful attempt: Set error message */
    $_SESSION['LogErr'] = 1;
    header("location:home.php");
    exit();
}
?>