<?php

$username = isset($_POST["username"]);

if($username == false)
{
   die("nistu unjeli username");
}

$lozinka = isset($_POST["sifra"]);

if($username == false)
{
    die("niste unjeli sifru");
}

$ime = $_POST["username"];
if ($ime == ""){
  die("niste unjeli username");
}
$sifra = $_POST["sifra"];

if($sifra == ""){
   die("niste unjeli sifru");
}

echo $_POST["username"] . " " . $_POST["sifra"];
