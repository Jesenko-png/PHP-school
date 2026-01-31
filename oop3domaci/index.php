<?php

require_once "Models/Vodenezivotinje.php";
require_once "Models/Kopnenezivotinje.php";

$delfin=new Vodene();
$delfin->tezina=55;
$delfin->vrstaVode="Slana Voda";



$kopnenazivotinja = new Kopnene();
$kopnenazivotinja->brojNogu = 3;
$kopnenazivotinja->tezina=55;

echo $kopnenazivotinja->tezina." ".$kopnenazivotinja->brojNogu;