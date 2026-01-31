<?php

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION["ulogovan"])){
    die("morate biti ulogovani");
}

require_once "baza.php";

