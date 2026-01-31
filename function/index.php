<?php

function popust($cijena){

    return $cijena * 0.1;
}

$brojevi = [250 , 330 ,1000,2000,5000];
$popust = [];

foreach ($brojevi as $broj){
    $ukupanPopust = popust($broj);
    
    array_push($popust , $ukupanPopust);
}

$danasnjiPopust = array_sum($popust);

echo "danasnji ukupan popust itnosi: $danasnjiPopust";