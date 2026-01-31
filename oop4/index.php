<?php

require_once "Models/Korisnik.php";

$korisnik= new Korisnik();
$email = "jesenko9332223@hotmail.com";
$hash = "kakav";



$korisnik->setName("jesenko");
echo $korisnik->getName();



$korisnik->update("jesenko9@hotmail.com" , "jesenko9ss@hotmail.com");

if($korisnik->provjera($email) === false)
    {
    $korisnik->registar($email , "sfdafdsdg");
} else 
{
    die("Vec postoji korisnik sa ovom email adresom u bazi");
}


