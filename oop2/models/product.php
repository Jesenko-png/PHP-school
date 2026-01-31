<?php

class product{
    public $ime;
    public $opis;
    public $cijena;
    public $slika;
    public $kolicina;

    public function __construct($ime,$opis,$cijena,$slika,$kolicina)
    {
            $this->ime = $ime;
            $this->opis = $opis;
            $this->cijena = $cijena;
            $this->slika = $slika;
            $this->kolicina = $kolicina;

    }
    public function save()
    {
        $baza=mysqli_connect("localhost", "root" , "" ,"oop");

        $ime=$baza->real_escape_string($this->ime);
        $opis=$baza->real_escape_string($this->opis);
        $cijena=$baza->real_escape_string($this->cijena);
        $slika=$baza->real_escape_string($this->slika);
        $kolicina=$baza->real_escape_string($this->kolicina);

        $baza->query("INSERT INTO proizvodi (ime,opis,cijena,slika,kolicina) VALUES ('$ime' , '$opis' , $cijena ,'$slika',$kolicina )");
    }
}