<?php

// $x = "2";
// $y = 2;
// {
//     if ($x == $y)

//         echo "IT IS";
// }

$age = 18;
// $hasID = true;
// $hasPermition = true;
$isMember = false;
$hasDiscountCoupon = true;

// if($age >= 18 || $hasPermition){

//     echo "YOu are allowed to enter";
// }else {

//     echo "Acces denied";
// }

// if(!$isMember){

//     echo "You need to sign up";
// } else {

//     echo "Welcome back";
// }

if ($age >= 18 && ($isMember || $hasDiscountCoupon)){

    echo "You are eligible for doscount";
}else {
    echo "No discount aviable";
}