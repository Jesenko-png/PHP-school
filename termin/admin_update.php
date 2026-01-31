<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit("Nedozvoljen pristup – mora biti POST");
}

require "db.php";

$id = $_POST['id'];
$ime = trim($_POST['ime']);
$razlog = trim($_POST['razlog']);

if (!$id || !$ime) {
    exit("Greška: nedostaju podaci");
}

$stmt = $conn->prepare("UPDATE termini SET ime = ?, razlog = ? WHERE id = ?");
$stmt->bind_param("ssi", $ime, $razlog, $id);
$stmt->execute();

echo "OK";
