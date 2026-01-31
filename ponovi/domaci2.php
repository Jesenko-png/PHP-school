<?php

$ime = strtolower("adMinistrator");
$lozinka = strtolower("mojalozinkajeNAJbolja");

if ($ime == "administrator" && $lozinka == "mojalozinkajenajbolja")
     {
echo "dobrodosao administratore";
}
else {
    echo "Nemate pristup";
}


$vrijeme = "23:55";
if ($vrijeme >= 5 && $vrijeme <=12) {
    echo "Jutro je";
}
else if ($vrijeme >= "12:01" && $vrijeme <=20) {
   echo "Popodne je";
}
else{
    echo "noc je";
}


