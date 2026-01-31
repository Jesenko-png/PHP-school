<?php
require_once 'recenzije_controller.php';
if (!$proizvod_id) {
    header("Location: proizvodi_view.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Recenzije - <?php echo htmlspecialchars($proizvod['name']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Recenzije za proizvod: <?php echo htmlspecialchars($proizvod['name']); ?></h1>
        <a href="proizvodi_view.php" class="btn">Nazad na proizvode</a>

        <div class="review-form">
            <h2>Dodaj recenziju</h2>
            <form method="POST">
                <input type="hidden" name="proizvod_id" value="<?php echo $proizvod_id; ?>">
                <div class="form-group">
                    <label for="komentar">Komentar:</label>
                    <textarea name="komentar" id="komentar" required></textarea>
                </div>
                <div class="form-group">
                    <label for="ocena">Ocena (1-5):</label>
                    <select name="ocena" id="ocena" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <button type="submit" name="add_review" class="btn">Dodaj recenziju</button>
            </form>
        </div>

        <div class="reviews-list">
            <h2>Sve recenzije</h2>
            <?php if (empty($recenzije)): ?>
                <p>Još uvek nema recenzija za ovaj proizvod.</p>
            <?php else: ?>
                <?php foreach ($recenzije as $recenzija): ?>
                    <div class="review-item">
                        <div class="rating">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <span class="star <?php echo $i <= $recenzija['ocena'] ? 'filled' : ''; ?>">★</span>
                            <?php endfor; ?>
                        </div>
                        <div class="comment">
                            <?php echo htmlspecialchars($recenzija['komentar']); ?>
                        </div>
                        <div class="date">
                            <?php echo date('d.m.Y H:i', strtotime($recenzija['datum'])); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
