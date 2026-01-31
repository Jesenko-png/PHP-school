<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_POST["id_proizvoda"]) || empty($_POST["id_proizvoda"])){
    die ("Morate unjeti id proizvoda");
}

if(!isset($_POST["kolicina"]) || empty($_POST["kolicina"])){
    die ("Morate unjeti kolicinu");
}

require_once "model/baza.php";
$idProizvoda = $_POST["id_proizvoda"];
$kolicina = $_POST["kolicina"];
$idKorisnika = $_SESSION["user_id"];
$rezultat = $baza->query("SELECT cijena FROM proizvodi WHERE id = $idProizvoda");

$cijenaIzBaze = $rezultat->fetch_assoc();
$cijena = $cijenaIzBaze["cijena"];
$cijena = $cijena * $kolicina;

$idProizvoda = $baza->real_escape_string($idProizvoda);
$kolicina = $baza->real_escape_string($kolicina);
$idKorisnika = $baza->real_escape_string($idKorisnika);
$cijena = $baza->real_escape_string($cijena);

$baza->query("INSERT INTO narudjbine (id_proizvoda , id_korisnika , cijena , kolicina) VALUES ($idProizvoda , $idKorisnika , $cijena, $kolicina) ");



