<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "model/baza.php";

$rezultat = $baza->query ("SELECT * FROM proizvodi");

$proizvodi = $rezultat->fetch_all(MYSQLI_ASSOC);




?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
        <?php require_once "html/navigacija.php" ?>
<div class="container mt-4">
    <div class="row">

        <?php foreach($proizvodi as $proizvod): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">

                        <h5 class="card-title"><?= $proizvod["ime"] ?></h5>
                        <p class="card-text"><?= $proizvod["opis"] ?></p>
                        <p class="fw-bold"><?= $proizvod["cijena"] ?> KM</p>

                        <p>
                            <?php if ($proizvod["kolicina"] == 0): ?>
                                <span class="text-danger">Nema na stanju</span>
                            <?php else: ?>
                                <span class="text-success">
                                    Na stanju: <?= $proizvod["kolicina"] ?>
                                </span>
                            <?php endif; ?>
                        </p>

                        <a class="btn btn-primary w-100"
                           href="model/permalink.php?id=<?= $proizvod["id"] ?>">
                            Idi na proizvod
                        </a>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
