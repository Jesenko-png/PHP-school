<?php
session_start();
require_once __DIR__ . "/model/baza.php";

if(!isset($_SESSION["ulogovan"])){
    die("Morate biti ulogovani");
}

// Dodavanje u korpu
if(isset($_POST['dodaj_u_korpu'])){
    $idProizvoda = (int) $_POST['id_proizvoda'];
    $kolicina = (int) $_POST['kolicina'];
    $userId = (int) $_SESSION['user_id'];

    $rez = $baza->query("SELECT kolicina, cijena FROM proizvodi WHERE id = $idProizvoda");
    $proizvod = $rez->fetch_assoc();

    if(!$proizvod || $proizvod['kolicina'] < $kolicina || $kolicina <= 0){
        $_SESSION['flash'] = "Nema dovoljno proizvoda na stanju!";
        header("Location: proizvodi.php");
        exit;
    }

    $ukupna = $proizvod['cijena'] * $kolicina;
    $baza->query("INSERT INTO narudjbine (id_proizvoda, id_korisnika, kolicina, cijena) VALUES ($idProizvoda, $userId, $kolicina, $ukupna)");
    $baza->query("UPDATE proizvodi SET kolicina = kolicina - $kolicina WHERE id = $idProizvoda");

    $_SESSION['flash'] = "Proizvod je uspješno dodan u korpu!";
    header("Location: proizvodi.php");
    exit;
}

// Prikaz korpe (korpanav.php)
header("Location: model/korpanav.php");
exit;
