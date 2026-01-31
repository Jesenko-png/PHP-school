<?php

$godine = 19;
$kazne = false;

if($godine >= 18){
        if($kazne == false)
                            
{
    echo "Mozete polagati za vozacki ispit<br>";
}
}
else {
    echo "niste ispunili uslove<br>";
}


if($godine >= 18 && $kazne == false)
{
    echo "Mozete polagati za automobil";
}
else{
    echo "niste ispunili sve potrebne uslove";
}