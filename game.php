<html>
    <head>
        <title>Mastermind!</title>
        <link rel="stylesheet" href="styling.css">

    </head>
        <body>
        <?php
require("protect.php");
require("game-handler.php");
?>
<form action="game-handler.php" method="post">
<table id='userInput' class='game'>
<?php
// Display all previous guesses and the answer key
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
<a href="logout.php"><button type="button">Logout</button></a>

<?php
// Uncomment to show the secret key
// print_r($_SESSION["Game"]["Secret"]);
?>
        </body>
    
</html>