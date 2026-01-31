<?php

require_once "klase/Auto.php";

$audia4 = new Auto();

$audia4->marka = "Audi";
$audia4->model = "a4";
$audia4->boja = "plava";
$audia4->kubikaza = 2000;

$yugo= new Auto ();
$yugo->marka = "Zastava";
$yugo->model =" Yugo 55";
$yugo->boja = "Bijela";
$yugo->kubikaza = 1600;

echo "Napravili smo novi automobil pod imenom " .$audia4->marka;
echo "Napravili smo novi automobil pod imenom " .$yugo->model;

$yugo->model = "Yugo 45";
echo "Napravili smo novi automobil pod imenom " .$yugo->model;

$audia4->snimiAuto();
$yugo->snimiAuto();

$yugo->ofarbajAuto("crvena");
echo "auto je ofarban u boju : " . $yugo->boja;