<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit("Nedozvoljen pristup – mora biti POST");
}

require "db.php";

$ime   = $_POST['ime'];
$datum = $_POST['datum'];
$vreme = $_POST['vreme'];
$razlog = $_POST['razlog'] ?? '';

// Provjera da li termin već postoji
$check = $conn->prepare("SELECT id FROM termini WHERE datum = ? AND vreme = ?");
$check->bind_param("ss", $datum, $vreme);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo "Zauzeto";
    exit;
}

// Insert
$stmt = $conn->prepare("INSERT INTO termini (ime, datum, vreme, razlog) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $ime, $datum, $vreme, $razlog);
$stmt->execute();

echo "OK";
