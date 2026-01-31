<?php

function jednakoJe($broj)

{
    if ($broj % 2 ==0) 
    {
        return true;
    } else {
         return false;
    }
}

$broj = 13;

    if (jednakoJe(($broj))){
        echo "broje $broj je jednak";
    }
    else{
        echo "broj $broj nije jednak";
    }