<?php

if (!isset($_POST["email"]) || empty($_POST["email"])){
    die("niste proslijedili email");
}
if (!isset($_POST["sifra"]) || empty($_POST["sifra"])){
    die("niste proslijedili sifru");
}

require_once "../baze/novabaza.php";

$email=$_POST["email"];
$sifra=password_hash($_POST["sifra"], PASSWORD_BCRYPT);

$rezultat = $baza->query("SELECT * FROM korisnici WHERE email='$email'");
 if ($rezultat->num_rows == 1){
    die("vec postoji korisnik sa ovom email adresom");
 }
 else {
 echo "uspjesno ste se registrovali";
}
    $baza -> query ("INSERT INTO korisnici(email,sifra) VALUES ('$email' , '$sifra')");


    $rezultatSlova = $baza->query("SELECT * FROM korisnici WHERE email LIKE '%fg%' ");

 var_dump($rezultatSlova);

 





