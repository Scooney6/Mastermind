<?php
require("game-handler.php");
print_r("yuh");

if($_SESSION["Round"] == 1) {
    $_SESSION["Secret"] = generateCode($_SESSION["Difficulty"]);

}
/*
foreach($_SESSION["Codes"] as $code){
    foreach($code as $color){

    }
}
*/
?>