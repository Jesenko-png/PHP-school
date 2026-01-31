<?php

// function greet($ime){

//         echo "Zdravo {$ime},dobrodosli";
// }

// greet("Jesenko");

function izracunatiProizvod($desno , $lijevo){
    return $desno * $lijevo;

}

$desnoLijevo = izracunatiProizvod(10 , 5);

function calculateSUm($a , $b) {

    return $a + $b;
}

$sum = calculateSUm (5 , 10);

echo "suma je : $sum";