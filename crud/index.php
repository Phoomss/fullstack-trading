<?php include 'conn.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Users</title>
</head>
<body>
    <h1>List Users</h1>
    <a href="create.php">➕ Add User</a>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>FIRSTNAME</th>
            <th>LASTNAME</th>
            <th>PHONE</th>
            <th>ACTION</th>
        </tr>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM user");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['firstname']}</td>
                    <td>{$row['lastname']}</td>
                    <td>{$row['phone']}</td>
                    <td>
                        <a href='update.php?id={$row['id']}'>✏️ Edit</a> |
                        <a href='delete.php?id={$row['id']}'>❌ Delete</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
