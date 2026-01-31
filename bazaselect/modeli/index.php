<?php

require_once "baze/baza.php";

$rezultat = $baza -> query("SELECT * FROM korisnici");


if ($rezultat -> num_rows > 0 )
{
    echo "ukupno smo nasli korisnika :" .$rezultat->num_rows;
    $korisnici = $rezultat -> fetch_all(MYSQLI_ASSOC);
   foreach($korisnici as $korisnik){
    echo $korisnik ["email"]; 
   }
}
else {
    "Nismo nasli nijednog korisnika";
}