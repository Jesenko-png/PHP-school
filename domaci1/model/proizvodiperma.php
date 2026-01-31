<?php

if(!isset($_GET["id"]) || empty($_GET["id"])){
    die ("niste proslijedili id");
}

require_once "baza.php";

$idProizvoda = $_GET["id"];

$rezultat = $baza->query("SELECT * FROM proizvodi WHERE id = $idProizvoda");

if($rezultat->num_rows == 0){
    die("ovaj proizvod ne postoji");
}

$proizvod = $rezultat->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?= $proizvod["ime"] ?></h1>
    <p><?= $proizvod["opis"] ?></p>
    <p> Cijena proizvoda : <?= $proizvod["cijena"] ?></p>
    <p> Na stanju : <?= $proizvod["stanje"] ?></p>
</body>
</html>