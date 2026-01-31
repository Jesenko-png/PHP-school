<?php   

$ime = strtolower("admiNIStRATor");
$lozinka = "mojaSifraJeSigurna";

if(
        $ime == "administrator" && $lozinka == "mojaSifraJeSigurna"
)
{
    echo "dobrodosao administratore<br>";
}


$vrijeme = time();

if ($vrijeme >= 5 && $vrijeme <12) {
    echo "Jutro je";
}
else if ($vrijeme >= 12 && $vrijeme <=20) {
    echo "Podne je";
}
else {
    echo "noc je";
}
