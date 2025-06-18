<?php
$username = "root";
$password = "";
$database = "user";
$host = "localhost";

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
};

$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
};

$users = [];
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
};

// var_dump($users);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Phomms</h1>
    <h2>User list</h2>
    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                <?php echo htmlspecialchars($user['firstname']); ?> -
                <?php echo htmlspecialchars($user['lastname']); ?> -
                <?php echo htmlspecialchars($user['phone']); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>