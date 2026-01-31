<?php

$baza = mysqli_connect("localhost" , "root" , "" ,"php27");


$name = "Amna";
$password = "asdasdasd";

//$baza->query("INSERT INTO user(username,password) VALUES ('$name','$password')");

$pdo=new PDO ('mysql:host=localhost;dbname=php27', "root" ,"");

$stmt=$pdo->prepare("INSERT INTO user (username,password) VALUES (:name , :password)");

//$stmt->execute([
 ///   ':name' => $name,
 //   ':password' => $password
//]);

$stmt2=$pdo->prepare("SELECT * FROM user WHERE username=:name");
$stmt2->execute([
    ':name' => $name
]);

if($stmt->rowCount() < 5){
    echo "imamo manje od 5 rezultata";
}

$users=$stmt2->fetch();
var_dump($users);
