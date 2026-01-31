<?php   

$auta = ["BMW" , "Mercedes" , "Audi"];

array_push ($auta , "Zastava");

echo $auta[3] . $auta[1] . $auta[2] . $auta[0];

$ukupnoAutomobila = count($auta);

echo "Ukupno imamo $ukupnoAutomobila automobila";

?>