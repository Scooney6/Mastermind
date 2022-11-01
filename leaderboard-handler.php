<?php
// Function to display the top 10 leaderboard
function leaderboard() {
    $myfile = fopen("./leaderboard.txt", "r") or die("Unable to open file!"); ?>
    <table id='lead' class='center'>
        <tr>
            <th>Place</th>
            <th>Name</th>
            <th>Score</th>
        </tr>
        <?php
        for($i = 1; $i <= 10; $i++) {
            if ($line = fgets($myfile)) {
                $curr = explode(",", $line); ?>
            <tr>
                <td><?php echo($i); ?></td>
                <td><?php echo($curr[0]); ?></td>
                <td><?php echo($curr[1]); ?></td>
            </tr>
            <?php
            } else {
                break;
            }
        }
    ?>
    </table>
    <?php
}

// Function to sort leaderboard.txt
function sortLeaders()
{
    $file_path = './leaderboard.txt';
    $new_file_path = './leaderboard.txt';
    $data = file($file_path);
    foreach($data as $line) {
        $temp[] = explode(",", $line);
    }
    array_multisort(array_column($temp, 1), SORT_DESC, $temp);
    foreach($temp as $line){
        $final[] = implode(",", $line);
    }
    file_put_contents($new_file_path, $final);
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