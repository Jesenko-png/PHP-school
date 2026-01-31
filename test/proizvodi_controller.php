<?php
require_once 'proizvodi_db.php';

$proizvodi = getProizvodi();
$editProizvod = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['edit_id'])) {
        $editProizvod = getProizvodById($_POST['edit_id']);
    } elseif (isset($_POST['save_id'])) {
        updateProizvod($_POST['save_id'], $_POST['name'], $_POST['price']);
        $proizvodi = getProizvodi();
    } elseif (isset($_POST['delete_id'])) {
        deleteProizvod($_POST['delete_id']);
        $proizvodi = getProizvodi();
    } elseif (isset($_POST['add_name']) && isset($_POST['add_price'])) {
        addProizvod($_POST['add_name'], $_POST['add_price']);
        $proizvodi = getProizvodi();
    }
}
