<?php

require_once "models/User.php";

$korisnikJesenko=new User("jesenko@hotmail.com" , "123123");

$korisnikAmna=new User("amna@hotmail.com" , "13331");

echo $korisnikJesenko->email;
echo $korisnikAmna->email;


