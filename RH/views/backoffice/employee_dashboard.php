<?php
session_start();
require_once '../../middleware/RoleMiddleware.php';

// Check if the user is an employee
RoleMiddleware::check(['employee']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Employee Dashboard</h1>
        <ul class="nav">
            <li><a href="view_personal_info.php">View Personal Information</a></li>
            <li><a href="update_personal_info.php">Update Personal Information</a></li>
            <li><a href="view_performance_evaluations.php">View Performance Evaluations</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</body>

</html>