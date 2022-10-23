<?php
require("protect.php");
require("common.php");
//require("game-handler.php");
function generateCode($Difficulty) {
    global $colors;
    $colors = array("red", "yellow", "green", "blue", "black", "purple", "brown");
    if($Difficulty == "Easy") {
        return(array($colors[rand(0, 4)], $colors[rand(0, 4)], $colors[rand(0, 4)], $colors[rand(0, 4)]));
    }
    elseif($Difficulty == "Medium") {
        return(array($colors[rand(0, 5)], $colors[rand(0, 5)], $colors[rand(0, 5)], $colors[rand(0, 5)]));
    }
    else {
        return(array($colors[rand(0, 6)], $colors[rand(0, 6)], $colors[rand(0, 6)], $colors[rand(0, 6)]));
    }
}

if(isset($_POST["GuessSubmit"])) {
    $_SESSION["Game"]["Round"]++;
    $_SESSION["Game"]["Guesses"][$_SESSION["Game"]["Round"]] = array($_POST["C1"], $_POST["C2"], $_POST["C3"], $_POST["C4"]);
    //print_r($_SESSION["Game"]["Round"]);
}

if($_SESSION["Game"]["Round"] == 1) {
    $_SESSION["Game"]["Secret"] = generateCode($_SESSION["Difficulty"]);
}

if(isset($_SESSION["Game"]["Guesses"])) {
    $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["NumCorrect"] = 0;
    $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["NumClose"] = 0;
    $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["NumWrong"] = 0;
    $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["Temp"] = [];
    for($index = 0; $index < sizeof($_SESSION["Game"]["Guesses"][$_SESSION["Game"]["Round"]]); $index++) {
        if($_SESSION["Game"]["Guesses"][$_SESSION["Game"]["Round"]][$index] == $_SESSION["Game"]["Secret"][$index]){
            $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["NumCorrect"]++;
            $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["Temp"][] = $_SESSION["Game"]["Secret"][$index];
        }
        elseif(in_array($_SESSION["Game"]["Guesses"][$_SESSION["Game"]["Round"]][$index], $_SESSION["Game"]["Secret"])){
            //print_r($_SESSION["Game"]["Guesses"][$_SESSION["Game"]["Round"]][$index]. " Is in the secret");
            //print_r("Param 1 " . count(array_keys($_SESSION["Game"]["Secret"], $_SESSION["Game"]["Guesses"][$_SESSION["Game"]["Round"]][$index])));
            //print_r("Param 2 " . count(array_keys($_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["Temp"], $_SESSION["Game"]["Guesses"][$_SESSION["Game"]["Round"]][$index])));
            if(count(array_keys($_SESSION["Game"]["Secret"], $_SESSION["Game"]["Guesses"][$_SESSION["Game"]["Round"]][$index])) > count(array_keys($_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["Temp"], $_SESSION["Game"]["Guesses"][$_SESSION["Game"]["Round"]][$index]))) {
                $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["NumClose"]++;
            }
        }
        else {
            $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["NumWrong"]++;
        }
    }

    if($_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["NumCorrect"] == 4) {
        if($_SESSION["Game"]["Difficulty"] == "Easy") {
            $multiplier = 1;
        }
        if($_SESSION["Game"]["Difficulty"] == "Medium") {
            $multiplier = 2;
        }
        if($_SESSION["Game"]["Difficulty"] == "Hard") {
            $multiplier = 3;
        }
        $score = ($multiplier*100)*((5/($_SESSION["Game"]["Round"]-1))*100);
        insertLeader($_SESSION["Username"], $score);
        print_r("Winner: " . $score);
    }

}

if($_SESSION["Game"]["Round"] > 1) {
    //print_r($_SESSION["Game"]["Secret"]);
    //print_r($_SESSION["Game"]["Guesses"]);
    //print_r($_SESSION["Game"]["Answers"]);
}
?>
<form action="game.php" method="post">
<table>
<?php
if(isset($_SESSION["Game"]["Guesses"])) {
    for($index = sizeof($_SESSION["Game"]["Guesses"])+1; $index > 1; $index--) {
        echo("<tr>");
        for ($index2 = 0; $index2 < sizeof($_SESSION["Game"]["Guesses"][$index]); $index2++) {
            echo("<td>" . $_SESSION['Game']['Guesses'][$index][$index2] . "</td>");
        }
        for($index3 = 0; $index3 < $_SESSION["Game"]["Answers"][$index]["NumCorrect"]; $index3++) {
            echo("<td>Correct</td>");
        }
        for($index4 = 0; $index4 < $_SESSION["Game"]["Answers"][$index]["NumClose"]; $index4++){
            echo("<td>Close</td>");
        }
        for($index5 = 0; $index5 < $_SESSION["Game"]["Answers"][$index]["NumWrong"]; $index5++){
            echo("<td>Wrong</td>");
        }
        echo("</tr>");
    }
}?>
<tr>
    <td>
    <select name="C1">
        <option value="red">red</option>
        <option value="yellow">yellow</option>
        <option value="green">green</option>
        <option value="blue">blue</option>
        <option value="black">black</option>
        <?php
        if($_SESSION["Difficulty"] == "Medium") { ?>
        <option value="purple">purple</option>
        <?php }
        if($_SESSION["Difficulty"] == "Hard") { ?>
        <option value="brown">brown</option>
        <?php } ?>
    </select>
    </td>
    <td>
    <select name="C2">
        <option value="red">red</option>
        <option value="yellow">yellow</option>
        <option value="green">green</option>
        <option value="blue">blue</option>
        <option value="black">black</option>
        <?php
        if($_SESSION["Difficulty"] == "Medium") { ?>
            <option value="purple">purple</option>
        <?php }
        if($_SESSION["Difficulty"] == "Hard") { ?>
            <option value="brown">brown</option>
        <?php } ?>
    </select>
    </td>
    <td>
    <select name="C3">
        <option value="red">red</option>
        <option value="yellow">yellow</option>
        <option value="green">green</option>
        <option value="blue">blue</option>
        <option value="black">black</option>
        <?php
        if($_SESSION["Difficulty"] == "Medium") { ?>
            <option value="purple">purple</option>
        <?php }
        if($_SESSION["Difficulty"] == "Hard") { ?>
            <option value="brown">brown</option>
        <?php } ?>
    </select>
    </td>
    <td>
    <select name="C4">
        <option value="red">red</option>
        <option value="yellow">yellow</option>
        <option value="green">green</option>
        <option value="blue">blue</option>
        <option value="black">black</option>
        <?php
        if($_SESSION["Difficulty"] == "Medium") { ?>
            <option value="purple">purple</option>
        <?php }
        if($_SESSION["Difficulty"] == "Hard") { ?>
            <option value="brown">brown</option>
        <?php } ?>
    </select>
    </td>
    <td>
    <input type="submit" name="GuessSubmit" value="Submit">
    </td>
</tr>
</table>
</form>
<br>
<a href="logout.php">Logout</a>
<?php
print_r($_SESSION["Game"]["Secret"]);
?>