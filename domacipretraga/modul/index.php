<?php

if(!isset($_POST["ime"]) || empty($_POST["ime"])){
    die("moste proslijedili ime");
}
if(!isset($_POST["opis"]) || empty($_POST["opis"])){
    die("moste proslijedili opis");
}
if(!isset($_POST["cijena"]) || empty($_POST["cijena"])){
    die("moste proslijedili cijenu");
}
if(!isset($_POST["slika"]) || empty($_POST["slika"])){
    die("moste proslijedili sliku");
}
if(!isset($_POST["kolicina"]) || empty($_POST["kolicina"])){
    die("moste proslijedili kolicinu");
}


$ime = $_POST["ime"];
$opis = $_POST["opis"];
$cijena = $_POST["cijena"];
$slika = $_POST["slika"];
$kolicina = $_POST["kolicina"];

require_once "baza.php";

$q = " INSERT INTO proizvodi (ime,opis,cijena,slika,kolicina) VALUES ('$ime','$opis','$cijena','$slika','$kolicina') ";

$baza->query($q);

