<?php

class Osobe
{
    public $ime;
    public $prezime;
    public $godinaRodjenja;
    public $visina;
    public $tezina;

    public function godine()
    {
        $trenutnaGodina = date("Y");
        echo $trenutnaGodina-$this->godinaRodjenja;
        
    }
}
