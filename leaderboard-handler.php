<?php
// Function to display the top 10 leaderboard
function leaderboard() {
    sortLeaders();
    $myfile = fopen("./leaderboard.txt", "r") or die("Unable to open file!"); ?>
    <table id='lead' class='center'>
        <tr>
            <th>Place</th>
            <th>Name</th>
            <th>Score</th>
        </tr>
        <?php
        $highlighted = false;
        for($i = 1; $i <= 10; $i++) {
            if ($line = fgets($myfile)) {
                $curr = explode(",", $line);
                if (isset($_SESSION["Game"])) {
                    if ($_SESSION["Username"] == $curr[0] && $_SESSION["Game"]["Score"] == $curr[1] && !$highlighted) {
                        $highlighted = true; ?>
                        <tr class="rainbow_text_animated">
                    <?php } else { ?>
                        <tr>
                    <?php }
                }?>
                <td><?php echo($i) ?></td>
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
    $data = file($file_path);
    foreach($data as $line) {
        $temp[] = explode(",", $line);
    }
    array_multisort(array_column($temp, 1), SORT_DESC, SORT_NUMERIC, $temp);
    foreach($temp as $line){
        $final[] = implode(",", $line);
    }
    file_put_contents($file_path, $final);
}

// Function to add a leader to leaderboard.txt
function insertLeader($name, $score)
{
    $myfile = fopen("leaderboard.txt", "a+") or die("Unable to open file!");
    $txt = $name . ',' . $score . PHP_EOL;
    fwrite($myfile, $txt);
    fclose($myfile);
}
?>