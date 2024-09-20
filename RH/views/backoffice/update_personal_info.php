<?php
session_start();
require_once '../../middleware/RoleMiddleware.php';
require_once '../../Controllers/UserController.php';

// Check if the user is an employee
RoleMiddleware::check(['employee']);

$controller = new UserController();
$user = $controller->readOne($_SESSION['user_id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($_SESSION['user_id']);
    header('Location: view_personal_info.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Personal Information</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Update Personal Information</h1>
        <?php if ($user): ?>
            <form action="update_personal_info.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br><br>

                <input type="submit" value="Update Information" class="button">
            </form>
        <?php else: ?>
            <p>User not found.</p>
        <?php endif; ?>
        <a href="employee_dashboard.php" class="button">Back to Dashboard</a>
    </div>
</body>

</html>