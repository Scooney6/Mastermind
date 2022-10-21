
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<body>


    <?php
    function leaderboard(){
        echo "   <table>
        <tr>
            <td>Place</td>
            <td>Name</td>
            <td>Score</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
       </table> ";

        $myfile = fopen("./leaderboard.txt", "r") or die("Unable to open file!");
        $i = 1;
        echo "
        <table>
    <tr>
        <td>Place</td>
        <td>Name</td>
        <td>Score</td>
    </tr>";
    while($line = fgets($myfile)){
        $curr = explode(",",$line);
    // the leaderboard.txt file should be [score, name] because sorting is easier now
    echo "<tr>
    
        <td>$i</td>
        <td>$curr[1]</td>
        <td>$curr[0]</td>
    </tr>";
    $i++;
    }
   echo "</table>";
   

    }

    function sortLeaders(){
        $file_path = './leaderboard.txt';
        $new_file_path = './leaderboard.txt';

        $data = file($file_path);
        natsort($data);
        file_put_contents($new_file_path, implode("\n", $data));
    }
    
    function insertLeader($name,$score){
    $myfile = fopen("leaderboard.txt", "w") or die("Unable to open file!");
    $txt = $name.','.$score.'\n';
    fwrite($myfile, $txt);

    fclose($myfile);
    }
    
    ?>
        
    
</body>
</html>