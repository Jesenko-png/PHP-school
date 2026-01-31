<?php
require_once 'recenzije_db.php';
require_once 'proizvodi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_review'])) {
    $proizvod_id = $_POST['proizvod_id'];
    $komentar = $_POST['komentar'];
    $ocena = $_POST['ocena'];
    
    addRecenzija($proizvod_id, $komentar, $ocena);
    header("Location: proizvodi_view.php");
    exit();
}

$proizvod_id = isset($_GET['id']) ? $_GET['id'] : null;
$recenzije = $proizvod_id ? getRecenzijeByProizvod($proizvod_id) : [];
$proizvod = $proizvod_id ? getProizvodById($proizvod_id) : null;
?>
