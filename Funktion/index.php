<?php
// Konekcija sa bazom podataka
$host = 'localhost';
$user = 'root'; // Korisničko ime (po defaultu za XAMPP je "root")
$password = ''; // Lozinka (po defaultu za XAMPP je prazno)
$dbname = 'test_baza';

// Kreiranje konekcije
$conn = identifier.sqlite($host, $user, $password, $dbname);

// Provera konekcije
if ($conn->connect_error) {
    die("Konekcija nije uspela: " . $conn->connect_error);
}

// Provera da li je poslata forma za unos podataka
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ime = $_POST['ime'];
    $email = $_POST['email'];

    // SQL upit za unos podataka
    $sql = "INSERT INTO korisnici (ime, email) VALUES ('$ime', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Novi korisnik je uspešno unet!";
    } else {
        echo "Greška: " . $sql . "<br>" . $conn->error;
    }
}

// SQL upit za prikazivanje podataka
$sql = "SELECT id, ime, email FROM korisnici";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stranica sa Bazom Podataka</title>
</head>
<body>
    <h1>Unos korisnika</h1>
    <form method="POST">
        <label for="ime">Ime:</label>
        <input type="text" id="ime" name="ime" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="Unesi korisnika">
    </form>

    <h2>Lista korisnika:</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Ime</th>
            <th>Email</th>
        </tr>

        <?php
        // Prikazivanje podataka iz baze
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row['id'] . "</td><td>" . $row['ime'] . "</td><td>" . $row['email'] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nema korisnika</td></tr>";
        }

        // Zatvaranje konekcije
        $conn->close();
        ?>
    </table>
</body>
</html>
