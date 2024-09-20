<?php
session_start();
require_once '../../middleware/RoleMiddleware.php';
require_once '../../Controllers/UserController.php';

// Check if the user is an employee
RoleMiddleware::check(['employee']);

$controller = new UserController();
$user = $controller->readOne($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Personal Information</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Personal Information</h1>
        <?php if ($user): ?>
            <p>Name: <?php echo htmlspecialchars($user['name']); ?></p>
            <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
            <p>Role: <?php echo htmlspecialchars($user['role']); ?></p>
        <?php else: ?>
            <p>User not found.</p>
        <?php endif; ?>
        <a href="employee_dashboard.php" class="button">Back to Dashboard</a>
    </div>
</body>

</html>