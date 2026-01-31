<?php
require_once __DIR__ . "/model/baza.php";
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

// Dohvati proizvode
$rezultat = $baza->query("SELECT * FROM proizvodi");
$proizvodi = $rezultat->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Proizvodi</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-primary-subtle">

<?php include __DIR__ . "/html/navigacija.php"; ?>

<div class="container py-5">
    <?php if(isset($_SESSION['flash'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($_SESSION['flash']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <h1 class="text-center mb-5">🛍️ Naši proizvodi</h1>
    <div class="row g-4">
        <?php foreach ($proizvodi as $proizvod): ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= htmlspecialchars($proizvod["ime"]) ?></h5>
                        <p class="card-text mb-1"><?= htmlspecialchars($proizvod["opis"]) ?></p>
                        <p class="card-text mb-1"><strong>Cijena:</strong> <?= $proizvod["cijena"] ?> €</p>
                        <p class="card-text mb-3"><strong>Na stanju:</strong> <?= $proizvod["kolicina"] ?></p>

                        <?php if(isset($_SESSION['ulogovan'])): ?>
                            <?php if($proizvod["kolicina"] > 0): ?>
                                <form action="korpa.php" method="POST" class="mt-auto">
                                    <input type="hidden" name="id_proizvoda" value="<?= $proizvod['id'] ?>">
                                    <input type="number" name="kolicina" min="1" max="<?= $proizvod['kolicina'] ?>" value="1" class="form-control mb-2 text-center" required>
                                    <button type="submit" name="dodaj_u_korpu" class="btn btn-success w-100">🛒 Dodaj u korpu</button>
                                </form>
                            <?php else: ?>
                                <button class="btn btn-secondary w-100" disabled>Nema na stanju</button>
                            <?php endif; ?>
                        <?php else: ?>
                            <a href="loginforma.php" class="btn btn-primary w-100">Prijavite se da kupite</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
