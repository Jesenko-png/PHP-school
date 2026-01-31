<?php

$baza = mysqli_connect("localhost" , "root" , "" , "prvi_cas");

if(mysqli_connect_error())
{
    die("Desila se greska prilikom povezivanja na bazu podataka");
}

$ime = "krompir";
$opis = "bijeli krompir";
$cijena=100;
$datumNabavke="2023-01-01";
$kolicina = 50;

$baza->query("INSERT INTO proizvodi (ime,opis,cijena,dan_nabavke,kolicina) VALUES ('Jabuke','crvene',300,'2022-04-06',20)");
$baza->query("INSERT INTO proizvodi (ime,opis,cijena,dan_nabavke,kolicina) VALUES ('kruske','zelene',300,'2022-04-06',20)");
$baza->query("INSERT INTO proizvodi (ime,opis,cijena,dan_nabavke,kolicina) VALUES ('sljica','srne',300,'2022-04-06',20)");

$baza->query("UPDATE proizvodi SET ime='$ime',opis='$opis',cijena=$cijena,dan_nabavke='$datumNabavke',kolicina=$kolicina WHERE ime='kruske' ");

