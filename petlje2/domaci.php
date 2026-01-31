<?php

$navBar = [
    "Glavna" => "glavna.php", 
"O nama" => "o nama.php", 
"Kontakt" => "kontakt.php"
];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php foreach($navBar as $navi => $url ): ?>

    

    <a href="<?php echo $url ?>"> 
        <?php echo $navi ?></a>

<?php endforeach; ?>
</form>
</body>
</html>