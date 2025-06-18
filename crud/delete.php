<?php
include 'conn.php';

$id = $_GET['id'];

if ($id) {
    mysqli_query($conn, "DELETE FROM user WHERE id = $id");
}

header('Location: index.php');
exit;
?>
