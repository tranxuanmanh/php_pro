<?php
$server = "localhost";
$username = "root";
$pass = "";
$database = "shoponline";
$conn = new mysqli($server, $username, $pass, $database);
if (!$conn) {
    echo "Ket noi that bai";
}