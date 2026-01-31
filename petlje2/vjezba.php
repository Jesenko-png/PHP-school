<?php

$automobili = [
    "zastava" => [
        "model" => "yugo 45",
        "godiste" => 1995
    ],
    "renault" => [
        "model" => "megane",
        "godiste" => 2017
    ],
    "toyota" => [
        "model" => "raw4",
        "godiste" => 2024
    ],
];

foreach($automobili as $auto => $model)
    {
   $starost = $model["godiste"];
   $trenutnaGodina = date("Y");
   
   $starostAutomobila = $trenutnaGodina - $starost;

  if($starostAutomobila <= 5)
  {
    echo $model["model"] . " je nov auto <br>";
        }
       else if($starostAutomobila > 5 && $starostAutomobila < 11)
        {
            echo $model["model"] . " je noviji auto <br>";
        }
        else {
            echo $model ["model"]. "je oldtimer <br>";
        }
           
        
  }