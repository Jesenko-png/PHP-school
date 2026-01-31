<?php
$conn = new mysqli("localhost", "root", "", "zakazivanje");

$result = $conn->query(
    "SELECT datum, vreme FROM termini ORDER BY datum, vreme"
);
?>

<h2>Zauzeti termini</h2>

<ul>
<?php while ($row = $result->fetch_assoc()): ?>
    <li>
        <?= $row['datum'] ?> u <?= $row['vreme'] ?>
    </li>
<?php endwhile; ?>
</ul>
