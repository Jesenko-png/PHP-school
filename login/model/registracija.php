<?php
require_once "baza.php";
header('Content-Type: application/json');

if (!isset($_POST["email"], $_POST["sifra"])) {
    echo json_encode(['status' => 'error', 'message' => 'Nisu poslati podaci.']);
    exit;
}

$email = $_POST["email"];
$sifra = password_hash($_POST["sifra"], PASSWORD_BCRYPT);

$stmt = $baza->prepare("INSERT INTO korisnici (email, sifra) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $sifra);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Uspešna registracija!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Greška pri registraciji ili email već postoji.']);
}
