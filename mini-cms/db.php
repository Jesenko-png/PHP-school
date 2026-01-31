<?php
$host = "localhost";
$dbname = "mini_cms";
$user = "root"; // XAMPP default
$pass = "";     // XAMPP default

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Greška kod spajanja na bazu: " . $e->getMessage());
}