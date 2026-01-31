<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_FILES["file"]["error"] === UPLOAD_ERR_OK) {
        $uploaddir = "uploads/";
        $filename = basename($_FILES["file"]["name"]);
        $target_file = $uploaddir . $filename;

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "Datoteka " . htmlspecialchars($filename) . " je uspješno prenesena.";
        } else {
            echo "Žao nam je, došlo je do pogreške pri prijenosu datoteke.";
        }
    } else {
        echo "Greška pri uploadu: " . $_FILES["file"]["error"];
    }
}
?>