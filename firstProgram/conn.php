<?php
    $username = "root";
    $password = "";
    $database = "user";
    $host = "localhost";

    // Create connection
    $conn = mysqli_connect($host, $username, $password, $database);

    // Check connection
    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }  ;
?>

