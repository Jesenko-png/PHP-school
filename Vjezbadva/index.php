<?php   

    $patike = ["Reebok" , "Adidas" , "Nike"];

    sort ($patike);

    $patike[3]= "Puma";
        sort ($patike);

        

        unset($patike[0]);

    var_dump($patike);