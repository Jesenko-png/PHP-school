<?php

require_once "models/product.php";

$krompir = new product ("krompir" , "bijeli krompir" , 99.99 , "test.jpg" , 24);

$krompir->save();