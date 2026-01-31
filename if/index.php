<?php

$godinaRodjenja = 1993;
$trenutnaGodina = date("Y");
$godine = $trenutnaGodina - $godinaRodjenja;


    if($godinaRodjenja == 1993)
             {
        echo "Imate $godine godina.";
    };

    $broj = 10;

    if($broj % 2 == 0)
        {
            echo "Broje je paran";
    }
    else {
        echo "broj je neparan";
    }

    $brojNovi = 10;

    $provjeraBroja = $brojNovi % 2;

    if($provjeraBroja == 0)
        {
        echo "Broje je paran";
    }
    else {
        echo "Broj je neparan";
    }

    $automobili = ["Golf 1" , "Golf 2" , "Golf 3"];

    if(in_array("Golf 4" , $automobili))
        {
             echo "Nasli smo najboljeg golfa";
    }
    else{
        echo "Golf 2 bi bio najbolja opcija";
    }