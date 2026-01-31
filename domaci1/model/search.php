<?php

if(!isset($_GET["search"]) || empty($_GET["search"]))
{
    die("Niste proslijedili pretragu");
}

$pretraga = $_GET["search"];

require_once "baza.php";

$rezultat = $baza->query ("SELECT * FROM korisnici WHERE email LIKE '%$pretraga%'");

if($rezultat->num_rows >= 1){
    echo "Nasli smo : " .$rezultat->num_rows . " korisnika <br>";
    $korisnici = $rezultat -> fetch_all(MYSQLI_ASSOC);
    foreach ($korisnici as $korisnik) {
        echo $korisnik["email"] . " , ";
    }
}
else {
    echo "Nema korisnika koji se poklapaju sa Vasom pretragom";
}


