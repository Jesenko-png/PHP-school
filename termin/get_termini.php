<?php
require "db.php";

if (!isset($_GET['datum'])) exit;

$datum = $_GET['datum'];


$stmt = $conn->prepare("SELECT TIME_FORMAT(vreme, '%H:%i') AS vreme FROM termini WHERE datum = ?");
$stmt->bind_param("s", $datum);
$stmt->execute();
$result = $stmt->get_result();

$termini = [];
while ($row = $result->fetch_assoc()) {
    $termini[] = $row['vreme']; // uvijek HH:MM
}

echo json_encode($termini);

