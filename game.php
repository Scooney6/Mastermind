<?php
require("protect.php");
//require("game-handler.php");
function generateCode($Difficulty) {
    global $colors;
    $colors = array("red", "yellow", "green", "blue", "black", "purple", "brown");
    if($Difficulty == "Easy") {
        return(array($colors[rand(0, 4)], $colors[rand(0, 4)], $colors[rand(0, 4)], $colors[rand(0, 4)], $colors[rand(0, 4)]));
    }
}

if(isset($_POST["GuessSubmit"])) {
    $_SESSION["Game"]["Round"]++;
    $_SESSION["Game"]["Guesses"][] = array($_POST["C1"], $_POST["C2"], $_POST["C3"], $_POST["C4"], $_POST["C5"]);
    print_r($_SESSION["Game"]["Round"]);

}

if($_SESSION["Game"]["Round"] == 1) {
    $_SESSION["Game"]["Secret"] = generateCode($_SESSION["Difficulty"]);
    print_r("Round: ".$_SESSION["Game"]["Round"]."Secret: ");
    for ($index = 0; $index < sizeof($_SESSION["Game"]["Secret"]); $index++) {
        print_r($_SESSION["Game"]["Secret"][$index]);
    }
}

if(isset($_SESSION["Game"]["Guesses"])) {
    for ($index = 0; $index < sizeof($_SESSION["Game"]["Guesses"][$_SESSION["Game"]["Round"]-2]); $index++) {
        if($_SESSION["Game"]["Guesses"][$_SESSION["Game"]["Round"]-2][$index] == $_SESSION["Game"]["Secret"][$index]){
            $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]-2][$index] = "Correct";
        }
        elseif(in_array($_SESSION["Game"]["Guesses"][$_SESSION["Game"]["Round"]-2][$index], $_SESSION["Game"]["Secret"])){
            $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]-2][$index] = "Close";
        }
        else {
            $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]-2][$index] = "Wrong";
        }
    }
    if(!in_array("Wrong", $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]-2]) && !in_array("Close", $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]-2])) {
        print_r("Winner");
    }
    elseif($_SESSION["Game"]["Round"]-2==4){
        print_r("Loser");
    }
}
if($_SESSION["Game"]["Round"] > 1) {
    print_r($_SESSION["Game"]["Guesses"]);
    print_r($_SESSION["Game"]["Answers"]);
}
?>
<form action="game.php" method="post">
    <select name="C1">
        <option value="red">red</option>
        <option value="yellow">yellow</option>
        <option value="green">green</option>
        <option value="blue">blue</option>
        <option value="black">black</option>
    </select>
    <select name="C2">
        <option value="red">red</option>
        <option value="yellow">yellow</option>
        <option value="green">green</option>
        <option value="blue">blue</option>
        <option value="black">black</option>
    </select>
    <select name="C3">
        <option value="red">red</option>
        <option value="yellow">yellow</option>
        <option value="green">green</option>
        <option value="blue">blue</option>
        <option value="black">black</option>
    </select>
    <select name="C4">
        <option value="red">red</option>
        <option value="yellow">yellow</option>
        <option value="green">green</option>
        <option value="blue">blue</option>
        <option value="black">black</option>
    </select>
    <select name="C5">
        <option value="red">red</option>
        <option value="yellow">yellow</option>
        <option value="green">green</option>
        <option value="blue">blue</option>
        <option value="black">black</option>
    </select>
    <input type="submit" name="GuessSubmit" value="Start">
    <a href="logout.php">Logout</a>
</form>
