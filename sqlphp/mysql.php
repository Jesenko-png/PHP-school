<?php

$baza = mysqli_connect("localhost" , "root" , "" ,"proizvodi");




$ime = $_POST["ime"];
$cijena = $_POST["cijena"];
$kolicina = $_POST["kolicina"];
$opis = $_POST["opis"];
$datumNabavke = $_POST["datumNabavke"];


if (!isset ($_POST["ime"]) || empty($ime)){
    die("desila se greska");
}
if (!isset ($_POST["cijena"]) || empty($cijena)){
    die("desila se greska");
}
if (!isset ($_POST["kolicina"]) || empty($kolicina)){
    die("desila se greska");
}
if (!isset ($_POST["opis"]) || empty($opis)){
    die("desila se greska");
}
if (!isset ($_POST["datumNabavke"]) || empty($datumNabavke)){
    die("desila se greska");
}



$baza -> query("INSERT INTO  proizvodi (ime , cijena , kolicina ,opis,datumNabavke) VALUES ('$ime','$cijena','$kolicina','$opis','$datumNabavke')");