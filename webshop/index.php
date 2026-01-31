<?php

require_once "modeli/baza.php";




$rezultat = $baza->query("SELECT * FROM proizvodi");



$proizvodi =$rezultat->fetch_all(MYSQLI_ASSOC);
//array(3) { [0]=> array(6) { ["id"]=> "1" ["ime"]=>"iphoiner 11" ["opis"]=>"dobar" ["cijena"]=> "1999.99" ["slika"]=>  "slika.jpg" ["kolicina"]=>  "45" } 
//           [1]=> array(6) { ["id"]=>  "2" ["ime"]=> "iphoiner 13" ["opis"]=>  "los" ["cijena"]=>  "19349.99" ["slika"]=>  "slika1.jpg" ["kolicina"]=>  "47" }
 //          [2]=> array(6) { ["id"]=>  "3" ["ime"]=>  "iphoiner 55" ["opis"]=>  "moze proci" ["cijena"]=>  "1245.34" ["slika"]=>  "slika3.jpg" ["kolicina"]=> "11" } }
//var_dump($proizvodi


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php foreach($proizvodi as $proizvod):  ?>

<div>
    <h1><?= $proizvod ["ime"] ?></h1>
    <p><?= $proizvod ["opis"] ?></p>
    <p>Cijena proizvoda :<?= $proizvod ["cijena"] ?></p>
    <p>
    <?php if($proizvod ["kolicina"] > 0): ?>
        Na stanju <?= $proizvod["kolicina"]; ?>
        <?php else:?> 
            Nema na stanju
    <?php endif; ?>
      </p>
      <a href="proizvod.php?id=<?= $proizvod["id"] ?>"> Pogledaj proizvod</a>
</div>

        <?php endforeach;  ?>
    </body>
</html>