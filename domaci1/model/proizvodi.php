<?php

if(!isset($_GET["ime"]) || empty ($_GET["ime"])){
    die ("Niste proslijedili unos");
}
if(!isset($_GET["opis"]) || empty ($_GET["opis"])){
    die ("Niste proslijedili unos");
}
if(!isset($_GET["cijena"]) || empty ($_GET["cijena"])){
    die ("Niste proslijedili cijenu");
}

require_once "baza.php";

$ime = $_GET["ime"];
$opis = $_GET["opis"];
$cijena = $_GET["cijena"];
$stanje = $_GET["stanje"];

$baza->query ("INSERT INTO proizvodi (ime,opis,cijena,stanje) VALUES ('$ime','$opis','$cijena','$stanje')");