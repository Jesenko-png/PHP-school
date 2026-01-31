<?php
session_start();
require_once __DIR__ . "/baza.php";

if(!isset($_SESSION['ulogovan'])){
    die("Morate biti ulogovani");
}

if(!isset($_POST['narudzba_id'])){
    die("ID narudžbe nije poslan");
}

$narudzbaId = (int)$_POST['narudzba_id'];

// Povrati količinu i id proizvoda da se vrati na stanje
$rez = $baza->query("SELECT id_proizvoda, kolicina FROM narudjbine WHERE id = $narudzbaId");
$narudzba = $rez->fetch_assoc();

if($narudzba){
    $idProizvoda = $narudzba['id_proizvoda'];
    $kolicina = $narudzba['kolicina'];

    // Vrati količinu nazad u proizvode
    $baza->query("UPDATE proizvodi SET kolicina = kolicina + $kolicina WHERE id = $idProizvoda");

    // Obriši iz narudžbi
    $baza->query("DELETE FROM narudjbine WHERE id = $narudzbaId");

    $_SESSION['flash'] = "Proizvod je obrisan iz korpe!";
}

header("Location: korpanav.php");
exit;
