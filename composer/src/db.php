<?php

namespace composer;

class db {
    public $conn;

    public function __construct()
    {
        $this->conn=new \PDO ("mysql;host=localhost;dbname=useri" , "root" , "");
    }
}