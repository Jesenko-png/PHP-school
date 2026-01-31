<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "login"; 

$baza = new mysqli($host, $user, $password, $database);

if ($baza->connect_error) {
    die("Greška prilikom konekcije: " . $baza->connect_error);
}

$baza->set_charset("utf8");