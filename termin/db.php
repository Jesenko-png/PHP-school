<?php
$conn = new mysqli("localhost", "root", "", "termini");

if ($conn->connect_error) {
    die("Greška s bazom");
}
