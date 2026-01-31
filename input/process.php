<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$usernameErr = $emailErr = "";
$username = $email = "";

if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
} else {
    $username = htmlspecialchars(trim($_POST["username"]));
}

}
echo $username;
?>