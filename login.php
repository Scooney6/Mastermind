<?php
// If login form submitted, check if their login is in the file.
// If so, send them to the menu and set the session username.
if(isset($_POST['Login'])){
    session_start();
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $logins = fopen("logins.txt", "r");
    while(($login = fgets($logins)) !== false) {
        $loginCredentials = explode(',', $login);
        if(($loginCredentials[0] == $Username) && (trim($loginCredentials[1]) == $Password)){
            $_SESSION['Username'] = $Username;
            if(isset($_SESSION['LogErr'])) {
                unset($_SESSION['LogErr']);
            }
            header("location:menu.php");
            exit();
        }
    }
    $_SESSION['LogErr'] = 1;
    header("location:home.php");
    exit();
}
?>