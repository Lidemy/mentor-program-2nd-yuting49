<?php


// Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);
    $conn->query("SET NAMES 'UTF8'");
    $conn->query("SET time_zone = '+08:00'");

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
?>