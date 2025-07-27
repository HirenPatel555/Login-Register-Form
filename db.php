<?php 

$hostname = "localhost";
$username = "root";
$password = "hiren@123";
$database = "users_db";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error){
    die("Connection Filed: ". $conn->connect_error);

}