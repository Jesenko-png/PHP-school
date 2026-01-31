<?php

require_once "Baza.php";

class Korisnik extends Baza{

    private $name="Jesenko";

    public function getName()
    {
        return $this->name;
    }

    public function setName($newName)
    {
        $this->name =ucfirst($newName);
    }
   
    public function registar($email , $sifra){

         $hash=password_hash($sifra , PASSWORD_BCRYPT);
        $this->konekcija->query("INSERT INTO korisnik (email , sifra) VALUES ('$email','$sifra')"); 
    }
    public function provjera($email){
    $email=$this->konekcija->real_escape_string($email);
    $result =$this->konekcija->query("SELECT * FROM korisnik WHERE email = '$email'");
    if ($result->num_rows > 0){
        return true;
    } else {
        return false;
    }
    }
    public function delete($email)
{
    $email=$this->konekcija->real_escape_string($email);

    $this->konekcija->query("DELETE FROM korisnik WHERE email='$email'");
}
public function update($oldEmail, $newEmail)
{
    $oldEmail = $this->konekcija->real_escape_string($oldEmail);
    $newEmail = $this->konekcija->real_escape_string($newEmail);

    $this->konekcija->query(
        "UPDATE korisnik SET email='$newEmail' WHERE email='$oldEmail'"
    );
}
}
