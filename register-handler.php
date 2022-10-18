<?php

/* Check Login form submitted */
if(isset($_POST['Register'])){
    /* Check and assign submitted Username and Password to new variable */
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    // If that username already exists, don't let them register
    $logins = fopen("logins.txt", "r");
    session_start();
    while (($login = fgets($logins)) !== false) {

        $loginCredentials = explode(',', $login);
        /* Check Username and Password existence in defined array */
        if ($loginCredentials[0] == $Username) {
            /*Unsuccessful attempt: Set error message */
            $_SESSION['RegErr'] = 1;
            header("location:register.php");
            exit();
        }
    }
    // Otherwise log them in and add credentials
    $_SESSION['Username']=$Username;
    if(isset($_SESSION['RegErr'])) {
        unset($_SESSION['RegErr']);
    }
    $file = fopen("logins.txt", "a+");
    $txt = $Username . "," . $Password . PHP_EOL;
    fwrite($file, $txt);
    fclose($file);
    header("location:menu.php");
    exit();
}
?>
