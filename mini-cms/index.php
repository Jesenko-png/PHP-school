<?php
require 'db.php';
$images = $pdo->query("SELECT * FROM images ORDER BY uploaded_at DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Mini CMS - Galerija</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>Mini CMS - Galerija</h1>

    <a href="upload.php" class="button">Dodaj novu sliku</a>

    <div class="gallery">
        <?php foreach($images as $img): ?>
            <div class="image-card">
                <img src="uploads/<?= htmlspecialchars($img['filename']) ?>" alt="">
                <div class="comments">
                    <h4>Komentari:</h4>
                    <?php
                    $stmt = $pdo->prepare("SELECT * FROM comments WHERE image_id = ? ORDER BY created_at DESC");
                    $stmt->execute([$img['id']]);
                    $comments = $stmt->fetchAll();
                    ?>
                    <ul>
                        <?php foreach($comments as $c): ?>
                            <li><?= htmlspecialchars($c['comment_text']) ?> (<?= $c['created_at'] ?>)</li>
                        <?php endforeach; ?>
                    </ul>

                    <a href="delete.php?id=<?= $img['id'] ?>" class="delete-button"
                       onclick="return confirm('Jeste li sigurni da želite obrisati ovu sliku?')">
                       Obriši
                    </a>

                    <form method="post" action="comment.php">
                        <input type="hidden" name="image_id" value="<?= $img['id'] ?>">
                        <input type="text" name="comment_text" placeholder="Dodaj komentar" required>
                        <button type="submit">Komentiraj</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
