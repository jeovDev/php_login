<?php


$server = "localhost";
$user = "root";
$pass = "";
// $db = "register";

// $result = "";
$conn = new mysqli($server,$user,$pass);

//checking connection
if($conn->connect_error){
    echo "404 Connection not Found" . $conn->connect_error;
}

$db = "CREATE DATABASE IF NOT EXISTS register";
if($conn->query($db)==FALSE){
    return true;
}

$tbl = "CREATE TABLE IF NOT EXISTS register.tbl (ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT, d_username VARCHAR(30) NOT NULL, d_password VARCHAR(100) NOT NULL)";

if($conn->query($tbl)===false){
    echo "Table not Found" . $conn->error;
}


?>