<?php

class Baza{

    const HOST = "localhost";
    const DB_USER = "root";
    const DB_PASSWORD = "";
    const DB_NAME = "oop";
    public $konekcija;

    public function __construct()
    {
        $this->konekcija=mysqli_connect(self :: HOST , self::DB_USER , self :: DB_PASSWORD , self::DB_NAME);
    }
}