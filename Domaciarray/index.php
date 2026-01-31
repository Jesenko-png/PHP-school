<?php

$naslov = "Postani programer";
$navBar = ["Glavna" , "O naama" , "Kontakt"];
$trenutnagodina = date("Y");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $naslov?></title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <h1><?= $naslov ?></h1> <br>
    <div class="navigation">
    <a href="http://google.com"><?= $navBar[0] ?></a>
    <a href=""><?= $navBar[1] ?></a>
    <a href=""><?= $navBar[2] ?></a>
    </div>

   
        <footer>
            Copyright &copy; moj sajt <?= $trenutnagodina ?>
        </footer>
    
</body>
</html>