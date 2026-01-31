<?php

$automobili = [
    "audi" => "a4",
    "bmw" => "x5"
];

foreach ( $automobili as $marka => $model){
    echo "marka automobila je $marka ,a model automobila je $model";
}

$imena = [
    "Jeca" => [
        "ime" => "jesenko",
        "prezime" => "idrizovic",
        "godine" => 33
    ],
    
    "amena" => [
        "ime" => "amna",
        "prezime" => "idrizovic",
        "godine" => 30
    ],
    ];

echo $imena["Jeca"]["prezime"];
echo $imena["amena"]["godine"];

foreach($imena as $ime => $osoba){
    $godine = $osoba["godine"];
    echo $godine;
}