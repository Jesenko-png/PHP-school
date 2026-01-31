<?php

$imena = ["Jesenko" , "Zara" , "Amna"];


foreach($imena as $ime => $osoba){
    $imena[$ime] = strtolower($osoba);
}
var_dump($imena);