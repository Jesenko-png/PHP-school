<?php

class db {
    public $db;

    public function __construct()
    {
        $this->db = new PDO ("mysql:host=localhost;dbname=php27" , "root" , "");
    }
}