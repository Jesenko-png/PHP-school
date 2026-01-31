<?php

$day = "Tuesda";
$message = "Today is ";



switch ($day)
{
    case "Monday":
        echo "$message $day";
        break;
    case "Tuesday":
            echo "$message $day";
            break;
        default:
        echo "Invalid date";
        break;

}