<?php
session_start();

function getRecenzije() {
    if (!isset($_SESSION['recenzije'])) {
        $_SESSION['recenzije'] = [];
    }
    return $_SESSION['recenzije'];
}

function saveRecenzije($recenzije) {
    $_SESSION['recenzije'] = $recenzije;
}

function addRecenzija($proizvod_id, $komentar, $ocena) {
    $recenzije = getRecenzije();
    
    // Create new review ID
    $newId = 1;
    if (!empty($recenzije)) {
        $ids = array_column($recenzije, 'id');
        $newId = max($ids) + 1;
    }
    
    // Add new review
    $recenzije[] = [
        'id' => $newId,
        'proizvod_id' => $proizvod_id,
        'komentar' => $komentar,
        'ocena' => $ocena,
        'datum' => date('Y-m-d H:i:s')
    ];
    
    saveRecenzije($recenzije);
}

function getRecenzijeByProizvod($proizvod_id) {
    $recenzije = getRecenzije();
    return array_filter($recenzije, function($recenzija) use ($proizvod_id) {
        return $recenzija['proizvod_id'] == $proizvod_id;
    });
}
?>
