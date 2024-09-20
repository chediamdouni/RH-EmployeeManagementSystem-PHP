<?php
session_start();
require_once '../../middleware/RoleMiddleware.php';

// Check if the user is an admin
RoleMiddleware::check(['admin']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <ul class="nav">
            <li><a href="list_users.php">Manage Users</a></li>
            <li><a href="list_departement.php">Manage Departments</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</body>

</html>