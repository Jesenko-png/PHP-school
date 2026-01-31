<?php

require_once "Models/Automobil.php";
require_once "Models/Vozilo.php";
require_once "Models/Autobus.php";
require_once "Models/Avion.php";
$autobus = new Autobus();
$autobus->marka="Mercedes";
$autobus->brojSjedista=55;
$autobus->brojVrata=10;
$autobus->spratni=false;

echo $autobus->marka."&nbsp;&nbsp;&nbsp           ". $autobus->brojSjedista;


$audia4 = new Automobil();
$audia4->marka="Audi";
$audia4->model="A4";
$audia4->boja="crvena";
$audia4->vrsta="Automobil";
$audia4->tezina=2000;



$yugo55 = new Automobil();
$yugo55->marka="Yugo";
$yugo55->model="55";
$yugo55->boja="bijela";

$bmw = new Automobil();
$bmw->marka="BMW";
$bmw->model="X5";
$bmw->boja="Zuta";