<?php

if(!isset($_GET["ime"]) || empty($_GET["ime"])){
    die("niste proslijedili ime");
}

require_once "baza.php";

$ime = $_GET["ime"];


$rezultat  = $baza -> query ("SELECT * FROM proizvodi WHERE ime LIKE '%$ime%' OR opis LIKE '%$ime%' ");

if($rezultat->num_rows >= 1){
    echo "uspjesno smo pronasli : "  . $rezultat->num_rows ." korisnika";
}
else {
    echo "nismo pronasli nijedan rezultat";
}


