<?php
// Function to display the top 10 leaderboard
function leaderboard() {
    $myfile = fopen("./leaderboard.txt", "r") or die("Unable to open file!");
    echo "
    <table>
        <tr>
            <td>Place</td>
            <td>Name</td>
            <td>Score</td>
        </tr>";
    for($i = 1; $i <= 10; $i++) {
        if ($line = fgets($myfile)) {
            $curr = explode(",", $line);
            echo "
        <tr>
            <td>$i</td>
            <td>$curr[0]</td>
            <td>$curr[1]</td>
        </tr>";
        } else {
            break;
        }
    }
    echo "</table>";
}

// Function to sort leaderboard.txt
function sortLeaders()
{
    $file_path = './leaderboard.txt';
    $new_file_path = './leaderboard.txt';
    $data = file($file_path);
    natsort($data);
    $data = array_reverse($data);
    file_put_contents($new_file_path, $data);
}

// Function to add a leader to leaderboard.txt, calls sortLeaders()
function insertLeader($name, $score)
{
    $myfile = fopen("leaderboard.txt", "a+") or die("Unable to open file!");
    $txt = $name . ',' . $score . PHP_EOL;
    fwrite($myfile, $txt);
    fclose($myfile);
    sortLeaders();
}
?>