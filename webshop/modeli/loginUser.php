<?php

if(!isset($_POST["email"]) || empty ($_POST["email"]))
{
    die("niste unjeli email");
}

if(!isset($_POST["sifra"]) || empty ($_POST["sifra"]))
{
    die("niste unjeli sifru");
}

require_once "baza.php";

///$email = $_POST["email"];
//$sifra=$_POST["sifra"];

//$baza -> query ("INSERT INTO korisnici (email,sifra) VALUES ('$email','$sifra')");

//$email = $_POST['email'] ?? '';
// $sifra = $_POST['sifra'] ?? '';

// // 1. Pripremi SQL upit
// $stmt = $baza->prepare("SELECT sifra FROM korisnici WHERE email = ?");
// $stmt->bind_param("s", $email);
// $stmt->execute();
// $result = $stmt->get_result();

// // 2. Provjeri postoji li korisnik
// if ($result->num_rows === 0) {
//     die("Korisnik ne postoji");
// }

// // 3. Dohvati hash lozinke iz baze
// $user = $result->fetch_assoc();
// $hashIzBaze = $user['sifra'];

// // 4. Provjeri lozinku
// if (password_verify($sifra, $hashIzBaze)) {
//     echo "Prijava uspješna!";
// } else {
//     echo "Pogrešna lozinka!";
// }

$email = $_POST["email"];
$sifra=$_POST["sifra"];

$rezultat = $baza -> query ("SELECT * FROM korisnici WHERE email = '$email'");

if ($rezultat -> num_rows == 1){
    $korisnik=$rezultat->fetch_assoc();

    $verifikovanaSifra= password_verify($sifra , $korisnik["sifra"]);
    if($verifikovanaSifra==true){
        echo "uspjesno ste se logovali";
    }
    else{
        echo "sifra nije tacka";
    }
}
else {
    echo "korisnik ne postoji";
}
