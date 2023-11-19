<?php
$serverName = "localhost";
$dBUsername = "root";
$dBpassword = "";
$dBName = "phplogin";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if ($conn === false){
    die("Could not connect to the database". mysqli_connect_error());
}
?>