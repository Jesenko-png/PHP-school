<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image_id = (int)$_POST['image_id'];
    $comment = trim($_POST['comment_text']);

    if ($comment !== "") {
        $stmt = $pdo->prepare("INSERT INTO comments(image_id, comment_text) VALUES (?, ?)");
        $stmt->execute([$image_id, $comment]);
    }
}

header("Location: index.php");
exit;
