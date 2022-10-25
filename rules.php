<?php
function get_rules()
{
    echo("<p>
    <b>Goal:</b> Guess the secret 4-digit code.
    <br>
    For every guess you submit, you will get a black square if one of the colors is the correct color and in the right spot.<br>
    You will get a white square if one of the colors is the correct color but in the wrong spot.<br>
    You will get nothing for a color not in the secret.<br>
    <br>
    <b>Note:</b> The black and white squares are not in order based on your guess.<br>
<br>
    <b>Scoring:</b><br>
    Scoring is based on the number of tries you take and the time it takes you to guess the correct code.
</p>");
}?>