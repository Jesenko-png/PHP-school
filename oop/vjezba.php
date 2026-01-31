<?php

require_once "klase/Osobe.php";

    $covjek = new Osobe();
    $covjek->ime ="Jesenko";
    $covjek->prezime ="Idrizovic";
    $covjek->godinaRodjenja=1993;
    $covjek->visina= "180 cm";
    $covjek->tezina = "90kg";

    $covjek->godine();
