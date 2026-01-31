<?php       

   // function setBio (string $grad , string $drzava , int $godiste){
    //     return "Rodjen sam u gradu $grad -u , drzava $drzava, $godiste-e godine";
    //        }

//echo setBio ("Bugojno" , "Bosna" , 1993);






function calculateAge(int $godina , int $godiste){
 return "Imam ". $godina - $godiste."godine";
}

echo calculateAge(2026 , 1993);