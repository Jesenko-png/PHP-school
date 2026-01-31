<?php
// Funkcije za rad sa proizvodima (simulacija baze)
session_start();

function getProizvodi() {
    if (!isset($_SESSION['proizvodi'])) {
        $_SESSION['proizvodi'] = [
            ["id" => 1, "name" => "Laptop", "price" => 1200],
            ["id" => 2, "name" => "Miš", "price" => 25],
            ["id" => 3, "name" => "Tastatura", "price" => 45],
            ["id" => 4, "name" => "Monitor", "price" => 300],
        ];
    }
    return $_SESSION['proizvodi'];
}

function saveProizvodi($proizvodi) {
    $_SESSION['proizvodi'] = $proizvodi;
}

function getProizvodById($id) {
    $proizvodi = getProizvodi();
    foreach ($proizvodi as $p) {
        if ($p['id'] == $id) return $p;
    }
    return null;
}

function updateProizvod($id, $name, $price) {
    $proizvodi = getProizvodi();
    foreach ($proizvodi as &$p) {
        if ($p['id'] == $id) {
            $p['name'] = $name;
            $p['price'] = $price;
        }
    }
    unset($p);
    saveProizvodi($proizvodi);
}

function addProizvod($name, $price) {
    $proizvodi = getProizvodi();
    $newId = 1;
    if (!empty($proizvodi)) {
        $ids = array_column($proizvodi, 'id');
        $newId = max($ids) + 1;
    }
    $proizvodi[] = [
        'id' => $newId,
        'name' => $name,
        'price' => $price
    ];
    saveProizvodi($proizvodi);
}

function deleteProizvod($id) {
    $proizvodi = getProizvodi();
    foreach ($proizvodi as $i => $p) {
        if ($p['id'] == $id) {
            unset($proizvodi[$i]);
        }
    }
    $proizvodi = array_values($proizvodi);
    saveProizvodi($proizvodi);
}
