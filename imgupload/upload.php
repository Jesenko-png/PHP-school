<?php

$connection= mysqli_connect("localhost" , "root" , "" , "php23");

if (!isset($_FILES['profileImage'])) {
    die("Niste proslijedili sliku");
}

$imageSize = $_FILES['profileImage']['size'];
$maxFileSize = 2 * 1024 * 1024;

if ($imageSize > $maxFileSize) {
    die("Slika je prevelika");
}
$imageInfo = getimagesize($_FILES['profileImage']['tmp_name']);

if ($imageInfo === false) {
    die("Fajl nije slika");
}

$width  = $imageInfo[0];
$height = $imageInfo[1];

if ($width > 1920 || $height > 1024) {
    die("Slika može biti maksimalno 1920px širine i 1024px visine");
}

$allowedExtensions = ["jpg", "jpeg", "png", "gif"];
$extension = strtolower(pathinfo($_FILES['profileImage']['name'], PATHINFO_EXTENSION));

if (!in_array($extension, $allowedExtensions)) {
    die("Format slike nije dobar , mora biti: " . implode(', ', $allowedExtensions));
}

$uploadDir = "uploads";

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$imageName = time() . "." . $extension;
$finalPath = "./uploads/" . $imageName;

$tmpFileName = $_FILES['profileImage']['tmp_name'];

if (move_uploaded_file($tmpFileName, $finalPath)) {
    $imageName=$connection->real_escape_string($imageName);
    $connection->query("INSERT INTO images (image) VALUES ('$imageName')");
    die("Uspješno ste dodali sliku");
} else {
    die("Neuspješno dodavanje slike");
}


