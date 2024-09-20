<?php
require_once '../../Controllers/UserController.php';
require_once '../../middleware/RoleMiddleware.php';

$controller = new UserController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    RoleMiddleware::check(['admin']);
    $controller->create();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add User</title>
</head>

<body>
    <h1>Add New User</h1>
    <form action="add_user.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="admin">Admin</option>
            <option value="manager">Manager</option>
            <option value="employee">Employee</option>
        </select><br><br>

        <input type="submit" value="Add User">
    </form>
</body>

</html>