<?php

require_once "model/baza.php";

$rezultat = $baza->query ("SELECT * FROM proizvodi");

$proizvodi = $rezultat->fetch_all(MYSQLI_ASSOC);

if(session_status() == PHP_SESSION_NONE)
{
    session_start();

}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <a href="ispis.php">Glavna</a>

<?php if(isset($_SESSION["ulogovan"])): ?>
<a href="logout.php">Logout</a>
    <?php else : ?>
<a href="login.php">Login</a>
        <?php endif; ?>

        
    </div>
<?php  foreach ($proizvodi as $proizvod): ?>

<div>
    <h1>  <?= $proizvod["ime"]; ?></h1>
    <p>Opis proizvoda :  <?=  $proizvod["opis"]; ?></p>
    <p>Cijena Proizvoda :  <?= $proizvod["cijena"]; ?></p>
    <p> Na stanju :
        <?php 
            if($proizvod["stanje"] == 0){
                echo "Nema na stanju";
            }        
            else if ($proizvod["stanje"] >= 1)
                echo $proizvod["stanje"];
            ?></p>
            <a href="model/proizvodiperma.php?id=<?=$proizvod["id"]  ?>"> Idi na proizvod</a>

</div>

<?php endforeach; ?>
</body>
</html>