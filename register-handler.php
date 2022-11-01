<?php
session_start();
// If the registration form is submitted
if(isset($_POST['Register'])){
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    // If that username already exists, don't let them register
    $logins = fopen("logins.txt", "r");
    while (($login = fgets($logins)) !== false) {
        $loginCredentials = explode(',', $login);
        if ($loginCredentials[0] == $Username) {
            $_SESSION['NameErr'] = 1;
            header("location:register.php");
            exit();
        }
    }
    // If they previously tried to register a user that already exists, at this point in the execution they do not,
    // so remove that error.
    if(isset($_SESSION['NameErr'])) {
        unset($_SESSION['NameErr']);
    }

    // If the password doesn't meet minimum requirements, don't let them register
    $uppercase=preg_match('@[A-Z]@',$Password);
    $lowercase=preg_match('@[a-z]@',$Password);
    $number=preg_match('@[0-9]@',$Password);
    $specialChars=preg_match('@[^\w]@',$Password);
    if(!$uppercase||!$lowercase||!$number||!$specialChars||strlen($Password)<8){
        $_SESSION['PassErr'] = 1;
        header("location:register.php");
        exit();
    }
    // If they previously tried to register a bad password, at this point in the execution they do not,
    // so remove that error.
    if(isset($_SESSION['PassErr'])) {
        unset($_SESSION['PassErr']);
    }

    // Otherwise log them in and add credentials
    $_SESSION['Username']=$Username;
    $file = fopen("logins.txt", "a");
    $txt = $Username . "," . $Password . PHP_EOL;
    fwrite($file, $txt);
    fclose($file);
    header("location:menu.php");
    exit();
}
?>
