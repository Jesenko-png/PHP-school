<?php

$brojevi = [2 , 4 , 3 ,5];

foreach($brojevi as &$broj){
    $broj *= $broj;

   
}

var_dump($brojevi);

unset($broj);

var_dump($brojevi);



