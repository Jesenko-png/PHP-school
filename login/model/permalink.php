<?php

require_once "baza.php";

if (!isset($_GET["id"])) {
    die("ID proizvoda nije prosleđen.");
}

$idProizvoda = $_GET["id"];

$rezultat = $baza->query("SELECT * FROM proizvodi WHERE id = $idProizvoda ");
$proizvod = $rezultat->fetch_assoc();

if(session_status() === PHP_SESSION_NONE){
    session_start();
}
?>

<?php if (isset($_SESSION["ulogovan"])): ?>
    <?php if ($proizvod["kolicina"] > 0): ?>
        <form action="../korpa.php" method="POST" class="w-50">
            <input type="number"
                   name="kolicina"
                   min="1"
                   max="<?= $proizvod["kolicina"] ?>"
                   class="form-control mb-2"
                   placeholder="Unesite količinu"
                   required>

            <input type="hidden" name="id_proizvoda" value="<?= $proizvod["id"] ?>">

            <button type="submit" name="dodaj_u_korpu" class="btn btn-success w-100">
                Dodaj u korpu
            </button>
        </form>
    <?php else: ?>
        <button class="btn btn-secondary w-50" disabled>
            Nema na stanju
        </button>
    <?php endif; ?>

<?php else: ?>
    <a href="../loginforma.php" class="btn btn-primary">
        Kliknite kako biste se ulogovali da biste kupili
    </a>
<?php endif; ?>