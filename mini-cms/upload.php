<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'db.php';

$uploadDir = "./uploads";
if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_FILES['image'])) die("Niste poslali sliku");

    $file = $_FILES['image'];

    if ($file['error'] !== 0) die("Upload nije uspio, error code: " . $file['error']);

    $size = $file['size'];
    $tmpName = $file['tmp_name'];
    $name = $file['name'];

    $maxFileSize = 2*1024*1024;
    if ($size > $maxFileSize) die("Slika je prevelika");

    $allowedExt = ['jpg','jpeg','png','gif'];
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    if (!in_array($ext, $allowedExt)) die("Dozvoljeni formati: " . implode(', ', $allowedExt));

    $imageInfo = getimagesize($tmpName);
    if ($imageInfo === false) die("Fajl nije slika");

    $newName = time() . "_" . rand(1000,9999) . "." . $ext;
    $finalPath = $uploadDir . "/" . $newName;

    if (move_uploaded_file($tmpName, $finalPath)) {
        $stmt = $pdo->prepare("INSERT INTO images(filename) VALUES (?)");
        $stmt->execute([$newName]);
        header("Location: index.php");
        exit;
    } else {
        die("Greška prilikom dodavanja slike");
    }
}
?>

<link rel="stylesheet" href="css/style.css">
<div class="container">
    <h1>Upload slike</h1>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="image" required>
        <button type="submit">Upload</button>
    </form>
    <a class="button" href="index.php">Nazad na galeriju</a>
</div>
