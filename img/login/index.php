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
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
<a href="index.php"> Pocetna</a>
<?php if(isset($_SESSION["ulogovan"])): ?>
    <a href="logout.php">Logout</a>

<?php else: ?>
    <a href="loginforma.php">Login</a>

<?php endif; ?>



<div class="proizvodi-wrapper">
        <?php foreach($proizvodi as $proizvod): ?>

            <div class="proizvodi">
            <h1><?= $proizvod["ime"]; ?></h1>
            <p><?= $proizvod["opis"]; ?></p>
            <p>Cijena : <?= $proizvod["cijena"]; ?></p>
            <p> Na stanju :  <?php  if($proizvod["stanje"] == 0): ?>
                Nema na stanju
                         <?php else :?>
                                <?= $proizvod["stanje"]; ?>
                                                  <?php endif; ?>
                                                                    </p>
                      <a href="model/permalink.php?id=<?= $proizvod["id"] ?>">Idi na proizvod</a> 
       </div>
        


        <?php endforeach; ?>
         </div>
    </body>
</html>