<?php


// kalkulator.php?broj_1=123&broj_2=456

//var_dump($_GET);

// array(2) { ["broj_1"]=> "123" ["broj_2"]=> "456" 

///echo $_GET ["broj_1"];
//echo $_GET ["broj_2"];


// kalkulator.php?broj_1=123&broj_2=123&vrstaRacunice=Sabiranje

$sabiranje = $_GET["broj_1"]+$_GET["broj_2"];
$oduzimanje = $_GET["broj_1"]-$_GET["broj_2"];

$vrstaRacunice = $_GET["vrstaRacunice"];
$broj1 = $_GET["broj_1"];
$broj2 = $_GET["broj_2"];

if($vrstaRacunice == "Sabiranje") 
    {
    echo $broj1 + $broj2;
}
else if($vrstaRacunice == "Oduzimanje")
{
    echo $broj1 - $broj2;
}
