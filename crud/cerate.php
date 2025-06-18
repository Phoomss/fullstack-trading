<?php include 'conn.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];

    mysqli_query($conn, "INSERT INTO user (firstname, lastname, phone) VALUES ('$firstname', '$lastname', '$phone')");

    header('Location: index.php');
    exit();
}

?>


<h1>add new user</h1>
<form method="post">
    <label for="firstname">First Name:</label>
    <input type="text" id="firstname" name="firstname" required>

    <label for="lastname">Last Name:</label>
    <input type="text" id="lastname" name="lastname" required>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" required>

    <button type="submit">Add User</button>
</form>