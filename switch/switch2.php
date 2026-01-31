<?php

$mjesec = "februara";
$poruka = "Trenutno je";

switch($mjesec)

{
    case "januar":
        echo "$poruka $mjesec";
        break;

    case "februar":
        echo "$poruka $mjesec";
        break;
    default:
    echo "Nije ni januar ni februar";
    break;


}