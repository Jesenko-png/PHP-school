<?php
//ovo je za keyless array 
$osobe = [
//0
    [
        "ime" => "jesenko",
        "prezime" => "idrizovic",
        "godiste" => 1993
    ],
//1
    [
        "ime" => "amna",
        "prezime" => "zekotic",
        "godiste" => 1995
    ],
    ];

    echo $osobe[0]["ime"] . "<br>";
    echo $osobe[1]["prezime"];

    $godina = date("Y");
    $starost = $godina - $osobe[0]["godiste"];

    echo $starost;