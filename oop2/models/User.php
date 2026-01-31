<?php

class User
{
    public $email;
    public $sifra;

    public function __construct($mail , $password)
    {
       $this->email = $mail;
       $this->sifra = $password; 
    }
}