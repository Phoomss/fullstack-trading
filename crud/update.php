<?php
include 'conn.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
$row = mysqli_fetch_assoc($result);

// var_dump($row);
?>