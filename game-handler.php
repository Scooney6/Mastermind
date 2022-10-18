<?php

function generateCode($Difficulty) {
    global $colors;
    $colors[] = array("red", "yellow", "green", "blue", "black", "purple", "brown");
    if($Difficulty == "Easy") {
        return(array($colors[rand(0, 4)], $colors[rand(0, 4)], $colors[rand(0, 4)], $colors[rand(0, 4)], $colors[rand(0, 4)]));
    }
}