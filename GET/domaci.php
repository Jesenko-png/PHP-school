<?php

$cijena = $_GET ["cijena"];
$dodatnaOprema = $_GET ["dodatno"];

if ($dodatnaOprema == "hrana"){
    $cijena += 50;
}
elseif ($dodatnaOprema == "oprema") {
    $cijena += 350;
}
if(isset($_GET["porez"]))
{
    $cijena *= 1.10;
}
echo $cijena;
