<?php

function isEven($number)
{
    if($number % 2 ==0)
    {
        return true;
      }
        else{
            return false;
        }
    }
$number = 20;

if (isEven($number)){
    echo "the number {$number} is even";
}
else {
    echo "the number {$number} is not even";
}