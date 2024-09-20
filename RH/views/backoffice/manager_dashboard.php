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
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Manager Dashboard</h1>
        <ul class="nav">
            <li><a href="search_employees.php">Search Employees</a></li>
            <li><a href="sort_employees.php">Sort Employees</a></li>
            <li><a href="manage_performance_evaluations.php">Manage Performance Evaluations</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</body>

</html>