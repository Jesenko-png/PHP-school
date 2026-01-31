<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_POST["email"]) || empty($_POST["email"]))
{
    die("Niste proslijedili email");
}

if(!isset($_POST["sifra"]) || empty($_POST["sifra"]))
{
    die("Niste proslijedili sifru");
}

$email = $_POST["email"];
$sifra = $_POST["sifra"];

require_once "baza.php";

$rezultat = $baza->query("SELECT * FROM korisnici WHERE email = '$email' ");

if($rezultat->num_rows == 1){
    $korisnik = $rezultat->fetch_assoc();
    $verify = password_verify($sifra , $korisnik["sifra"]);

    if($verify == true)
    {
       if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$_SESSION["ulogovan"] = true;
$_SESSION["user_id"] = $korisnik["id"];
         header("Location: ../proizvodi.php");
    }
    else {
        echo "uneseni podatci nisu tacni";
    }
}
else {
    echo "korisnik ne postoji";
}