<?php
require 'db.php';

if (!isset($_GET['id'])) {
    die("Nije proslijeđen ID slike");
}

$image_id = (int)$_GET['id'];

// Prvo dohvatimo ime fajla da ga obrišemo s diska
$stmt = $pdo->prepare("SELECT filename FROM images WHERE id = ?");
$stmt->execute([$image_id]);
$image = $stmt->fetch();

if ($image) {
    $filePath = "uploads/" . $image['filename'];
    if (file_exists($filePath)) {
        unlink($filePath); // briše fajl
    }

    // Obriši iz baze (komentari će biti obrisani zbog FOREIGN KEY)
    $stmt = $pdo->prepare("DELETE FROM images WHERE id = ?");
    $stmt->execute([$image_id]);
}

header("Location: index.php");
exit;
