<?php
$conn = new mysqli("localhost", "root", "", "termini");
$result = $conn->query("SELECT id, datum, vreme, ime, razlog FROM termini ORDER BY datum, vreme");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Panel – Termini</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="admin-container">
    <h2>Admin – Pregled termina</h2>
    <table>
        <thead>
            <tr>
                <th>Datum</th>
                <th>Vrijeme</th>
                <th>Ime</th>
                <th>Razlog</th>
                <th>Spremi</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr data-id="<?= $row['id'] ?>">
                <td data-label="Datum"><?= $row['datum'] ?></td>
                <td data-label="Vrijeme"><?= $row['vreme'] ?></td>
                <td data-label="Ime"><input type="text" class="ime" value="<?= htmlspecialchars($row['ime']) ?>"></td>
                <td data-label="Razlog" class="razlog" data-tooltip="<?= htmlspecialchars($row['razlog']) ?>">
                    <?= $row['razlog'] ? 'Pogledaj' : '' ?>
                </td>
                <td data-label="Spremi"><button class="saveBtn">Spremi</button></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script>
    // Spremanje izmjena imena
    document.querySelectorAll(".saveBtn").forEach(btn => {
        btn.addEventListener("click", () => {
            const tr = btn.closest("tr");
            const id = tr.getAttribute("data-id");
            const ime = tr.querySelector(".ime").value.trim();

            // Razlog readonly, ne šaljemo izmjene
            const formData = new FormData();
            formData.append("id", id);
            formData.append("ime", ime);

            fetch("update_termin.php", {
                method: "POST",
                body: formData
            })
            .then(res => res.text())
            .then(res => {
                if(res === "OK") {
                    alert("Ime ažurirano ✔");
                } else {
                    alert("Greška prilikom ažuriranja ❌");
                }
            });
        });
    });
</script>

</body>
</html>
