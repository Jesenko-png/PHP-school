<?php

function jeJednak($broj)
{
if ($broj % 2 ==0)
{
return true;
} else { 
     return false;
}
}

$broj = 10;

if (jeJednak($broj)){
    echo "Broj $broj je jednak";
}
else {
    echo "broj $broj nije jednak";
}
