<?php

require_once "baza.php";

$email = $_POST["email"];
$sifra = password_hash($_POST["sifra"], PASSWORD_BCRYPT);

$baza->query ("INSERT INTO korisnici (email,sifra) VALUES ('$email','$sifra')");