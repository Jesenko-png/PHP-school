<?php

$automobili = [
"Zastava" => ["Yugo" , "Skala" , "101"]

];
echo $automobili ["Zastava"][1];
// asocijativni array
$osobe = [
    //"Jeca " to je kljuc u array 
        "Jeca" => [
            "prezime" => "Idrizovic",
            "godine" => 33,
            "programer" => true,
            "pravoIme" => "Jesenko"
            
        ],
//amna to je kljuc u array 
        "Amna" => [
            "ime" => "Amna",
            "prezime" => "Zekotic",
            "godine" => 30,
            "programer" => false,
            "jmbg" => 1242346547
            ]
        ];

    echo $osobe ["Jeca"]["pravoIme"];
    echo $osobe ["Amna"]["godine"];  

    // DOdavanje u asocijatvni array
   $osobe["Zara"] = //Zara to je kljuc u array 
            [
                "ime" => "Zara",
                "prezime" => "Idrizovic",
                "godine" => 4,
                "programer" => false,
                "jmbg" => 23043285
            
   ];
    
    echo $osobe ["Zara"]["jmbg"];
   

    $imena = array_keys($osobe); // uloga je da uhvati sve kljuceve (  u ovom slucaju imena) koja imamo u array
    

    foreach($osobe as $podaci) {
        echo $podaci["prezime"];
    }
    foreach($osobe as $minus){
        echo $minus ["godine"] . "<br>";
    }

    $prezimena = array_column($osobe , "prezime");
    foreach($prezimena as $prezime)
        echo $prezime;

    $godista = array_column($osobe , "godine");
    foreach($godista as $godiste)
        echo $godiste;
