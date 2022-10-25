<?php
require("protect.php");
require("game-handler.php");
?>
<html>
    <head>
        <title>Mastermind!</title>
        <link rel="stylesheet" href="styling.css">

    </head>
        <body>
<form action="game-handler.php" method="post">
<table id='userInput' class='game'>
<?php
// Display all previous guesses and the answer key
if(isset($_SESSION["Game"]["Guesses"])) {
    for($index = sizeof($_SESSION["Game"]["Guesses"])+1; $index > 1; $index--) {
        echo("<tr style='height: 20px'>");
        for ($index2 = 0; $index2 < sizeof($_SESSION["Game"]["Guesses"][$index]); $index2++) {?>
            <td style="width: 20px; background-color: <?php echo($_SESSION['Game']['Guesses'][$index][$index2])?>"></td>
        <?php }
        for($index3 = 0; $index3 < $_SESSION["Game"]["Answers"][$index]["NumCorrect"]; $index3++) {?>
            <td style="width: 20px; background-color:black"></td>
        <?php }
        for($index4 = 0; $index4 < $_SESSION["Game"]["Answers"][$index]["NumClose"]; $index4++){?>
            <td style="width: 20px; background-color:white"></td>
        <?php }
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
    <td colspan="4">
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