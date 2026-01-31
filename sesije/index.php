<?php

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
        <?php if(isset($_SESSION["ime"])): ?>

        <p>Pozdrav <?=   $_SESSION["ime"] ?></p>
        <a href="prekini_sesiju.php"> Obrisi sesiju</a>

        <?php else : ?>
 <form action="logika.php" method="post">
        <input type="text" name="ime">
        <button>Zapamti ime</button>
        <?php endif; ?>
        
        
        </form>
    </body>
</html>