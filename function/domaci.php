<?php       

function cijenaSaDostavom($cijena , $grad)
{
    $cijenaDostave = 0;
     $dostava = [
    "Subotica" => 220,
    "Pancevo" => 10,
    "Sarajevo" => 292,
    "Split" => 799
    
];

    $gradPostoji = array_key_exists($grad , $dostava);

    if($gradPostoji == true){
        $rastojanje = $dostava[$grad];
        if($rastojanje = <= 100){
            $cijenaDostave = 200;
        }
        else if ($rastojanje > 100 && <= 200>){
            $cijenaDostave=350;
        }
        else {
            $cijenaDostave= 500;
        }
        return $cijenaDostave;

    }

    else {
      echo  "grad ne postoji";
    }

  


     }


    cijenaSaDostavom(1000 , "Subotica");



