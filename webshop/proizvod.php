<?php

if(!isset($_GET["id"]) || empty ($_GET["id"]))
{
    die("fali id proizvoda");
}

require_once "modeli/baza.php";

$idProzivoda=$_GET["id"];
$rezultat = $baza ->query ("SELECT * FROM proizvodi WHERE id = $idProzivoda  ");

if($rezultat->num_rows == 0){
    die("Ovaj proizvod ne postoji");
}

$proizvod = $rezultat -> fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?= $proizvod["ime"] ?> </h1>
     <p><?= $proizvod["opis"] ?> <p>
        <p> Cijena proizvoda<?php $proizvod["cijena"]; ?><p>
              <p> <?php if($proizvod ["kolicina"] > 0): ?>
                Na stanju <?= $proizvod["kolicina"]; ?>
                 <?php else:?> 
                 Nema na stanju
                <?php endif; ?>
                 </p>

    
</body>
</html>
