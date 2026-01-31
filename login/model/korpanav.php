<?php
session_start();
require_once __DIR__ . "/baza.php";

if(!isset($_SESSION["ulogovan"])){
    die("Morate biti ulogovani");
}

// Dohvati sve narudžbe korisnika
$userId = $_SESSION['user_id'];
$rezultat = $baza->query("
    SELECT narudjbine.id AS narudzba_id, narudjbine.kolicina, narudjbine.cijena, proizvodi.ime
    FROM narudjbine
    INNER JOIN proizvodi ON proizvodi.id = narudjbine.id_proizvoda
    WHERE narudjbine.id_korisnika = $userId
");
$narudjbe = $rezultat->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Korpa</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-primary-subtle">

<?php include __DIR__ . "/../html/navigacija.php"; ?>

<div class="container py-5">
    <h1 class="text-center mb-4">🛒 Moja korpa</h1>

    <!-- Flash poruka -->
    <?php if(isset($_SESSION['flash'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($_SESSION['flash']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <?php if($rezultat->num_rows == 0): ?>
        <div class="alert alert-info text-center">
            <h4>Nemate nijedan proizvod u korpi</h4>
            <a href="../proizvodi.php" class="btn btn-primary mt-3">Idi na početnu</a>
        </div>
    <?php else: ?>
        <div class="row">
            <?php foreach($narudjbe as $n): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= htmlspecialchars($n['ime']) ?></h5>
                            <p class="card-text"><strong>Količina:</strong> <?= $n['kolicina'] ?></p>
                            <p class="card-text"><strong>Cijena:</strong> <?= $n['cijena'] ?> €</p>

                            <!-- Dugme za brisanje proizvoda -->
                            <form action="/login/model/obrisi_narudzbu.php" method="POST" class="mt-auto">
                                <input type="hidden" name="narudzba_id" value="<?= $n['narudzba_id'] ?>">
                                <button type="submit" class="btn btn-danger w-100">
                                    🗑 Obriši
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-4">
            <a href="../proizvodi.php" class="btn btn-outline-secondary">⬅ Nastavi kupovinu</a>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
