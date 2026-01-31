<?php


if(!isset($_POST["ime"]) || empty($_POST["ime"]))
{
    die("niste proslijedili ime");
}
if(!isset($_POST["opis"]) || empty($_POST["opis"]))
{
    die("niste proslijedili ime");
}
if(!isset($_POST["cijena"]) || empty($_POST["cijena"]))
{
    die("niste proslijedili cijenu");
}
if(!isset($_POST["slika"]) || empty($_POST["slika"]))
{
    die("niste proslijedili sliku");
}
if(!isset($_POST["kolicina"]) || empty($_POST["kolicina"]))
{
    die("niste proslijedili kolicinu");
}



$ime=$_POST["ime"];
$opis=$_POST["opis"];
$cijena=$_POST["cijena"];
$slika=$_POST["slika"];
$kolicina=$_POST["kolicina"];


require_once "baza.php";

$baza->query ("INSERT INTO proizvodi (ime,opis,cijena,slika,kolicina) VALUES ('$ime','$opis','$cijena','$slika','$kolicina')");
