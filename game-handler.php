<?php
require("leaderboard-handler.php");

// Function to generate the secret code for the player to guess
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

// When a round of guesses are submitted, add them to the session.
if(isset($_POST["GuessSubmit"])) {
    session_start();
    $_SESSION["Game"]["Round"]++;
    $_SESSION["Game"]["Guesses"][$_SESSION["Game"]["Round"]] = array($_POST["C1"], $_POST["C2"], $_POST["C3"], $_POST["C4"]);
    $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["NumCorrect"] = 0;
    $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["NumClose"] = 0;
    $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["NumWrong"] = 0;
    $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["MatchedIndexes"] = [];
    $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["MatchedColors"] = [];
    for($index = 0; $index < sizeof($_SESSION["Game"]["Guesses"][$_SESSION["Game"]["Round"]]); $index++) {
        if ($_SESSION["Game"]["Guesses"][$_SESSION["Game"]["Round"]][$index] == $_SESSION["Game"]["Secret"][$index]) {
            $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["NumCorrect"]++;
            $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["MatchedIndexes"][] = $index;
            $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["MatchedColors"][]= $_SESSION["Game"]["Guesses"][$_SESSION["Game"]["Round"]][$index];
        }
    }
    for($index = 0; $index < sizeof($_SESSION["Game"]["Guesses"][$_SESSION["Game"]["Round"]]); $index++) {
        //If this isn't a color that's already correct
        if(!in_array($index, $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["MatchedIndexes"])) {
            //If the color is elsewhere in the secret
            if (in_array($_SESSION["Game"]["Guesses"][$_SESSION["Game"]["Round"]][$index], $_SESSION["Game"]["Secret"])) {
                // If color in the secret doesn't have a match already
                if (count(array_keys($_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["MatchedColors"],
                        $_SESSION["Game"]["Guesses"][$_SESSION["Game"]["Round"]][$index]))
                        < count(array_keys($_SESSION["Game"]["Secret"],
                        $_SESSION["Game"]["Guesses"][$_SESSION["Game"]["Round"]][$index]))) {
                    $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["NumClose"]++;
                    $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["MatchedColors"][] = $_SESSION["Game"]["Guesses"][$_SESSION["Game"]["Round"]][$index];
                } else {
                    $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["NumWrong"]++;
                }
            } else {
                $_SESSION["Game"]["Answers"][$_SESSION["Game"]["Round"]]["NumWrong"]++;
            }
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
        $time = microtime(true) - $_SESSION["Game"]["StartTime"];
        $score = intval(($multiplier*100)*(((5/($_SESSION["Game"]["Round"]-1))*50)/log($time)));
        insertLeader($_SESSION["Username"], $score);
        $_SESSION["Game"]["Score"] = $score;
        $_SESSION["Game"]["Time"] = $time;
        header("location:win.php");
        exit();
    }
    header("location:game.php");
    exit();
}

// If this is the first round, generate the secret code and start the timer.
if($_SESSION["Game"]["Round"] == 0) {
    $_SESSION["Game"]["Round"]++;
    $_SESSION["Game"]["StartTime"] = microtime(true);
    $_SESSION["Game"]["Secret"] = generateCode($_SESSION["Game"]["Difficulty"]);
    header("location:game.php");
    exit();
}
?>

