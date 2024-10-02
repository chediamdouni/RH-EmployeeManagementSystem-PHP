<?php
session_start();
require_once '../../middleware/RoleMiddleware.php';

// Check if the user is a manager
RoleMiddleware::check(['manager']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manager Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Manager Dashboard</h1>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="search_employees.php"><i class="fas fa-search"></i>Search Employees</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="manage_performance_evaluations.php"><i class="fas fa-tasks"></i>Manage Performance Evaluations</a>
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