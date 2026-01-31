<?php

if(!isset($_GET["pretraga"]) || empty ($_GET["pretraga"]))
{
    die ("niste proslijedili ime");
}

$ime = $_GET["pretraga"];

require_once "baza.php";

$rezultat = $baza->query("SELECT * FROM proizvodi WHERE ime LIKE '%$ime%' OR opis LIKE '%$ime%'");

IF ($rezultat-> num_rows >= 1)
{
    echo "nasli smo :" .$rezultat->num_rows . "korisnika";
}
else {
    echo "nismo nasli poklapanje";
}