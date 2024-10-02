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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Admin Dashboard</h1>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="list_users.php"> <i class="fas fa-users"></i>Manage Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add_user.php"> <i class="fas fa-user-plus"></i>Add User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="list_departement.php"><i class="fas fa-building"></i>Manage Departments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </li>
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>