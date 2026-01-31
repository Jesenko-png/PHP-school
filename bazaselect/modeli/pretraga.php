<?php

require_once "../baze/novabaza.php";

if (isset($_POST["korisnik"])) {

    $email = $_POST["korisnik"];

    $rezultat = $baza->query("SELECT * FROM korisnici WHERE email LIKE '%$email%'");

    if ($rezultat->num_rows >= 1) {
        echo "Našli smo: " . $rezultat->num_rows . " korisnika sa ovom adresom";
    } else {
        echo "Nema rezultata.";
    }
}