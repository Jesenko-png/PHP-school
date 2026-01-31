<?php

if(!isset($_POST['username'])|| !isset($_POST['password'])){
    die("Niste proslijedili podatke");
}

require_once "../models/user.php";

$user = new User ();