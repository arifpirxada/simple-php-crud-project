<?php
$server = "localhost";
$username = "root";
$password = "";
$accounts = "accounts";

$conn = mysqli_connect($server, $username, $password, $accounts);
if(!$conn){
    die("Connection was unsuccessfull because of this error" . mysqli_connect_error());
}
?>