<?php
function setNewUser($Username, $Password) {
    $file = fopen("logins.txt", "w");
    $txt = $Username . "," . $Password;
    fwrite($file, $txt);
    fclose($file);
}

/* Check Login form submitted */
if(isset($_POST['Login'])){
    session_start(); /* Starts the session */
    /* Check and assign submitted Username and Password to new variable */
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    $logins = file("logins.txt");
    foreach ($logins as $login) {
        $loginCredentials = explode(',', $login);
        /* Check Username and Password existence in defined array */
        if ($loginCredentials[0] = $Username && $loginCredentials[1] == $Password){
            /* Success: Set session variables and redirect to Protected page  */
            $_SESSION['Username']=$Username;
            if(isset($_SESSION['LogErr'])) {
                unset($_SESSION['LogErr']);
            }
            header("location:menu.php");
            exit();
        } else {
            /*Unsuccessful attempt: Set error message */
            $_SESSION['LogErr'] = 1;
            header("location:home.php");
            exit();
        }
    }

}
?>