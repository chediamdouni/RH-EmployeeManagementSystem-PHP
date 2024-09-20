<?php
session_start();
require_once '../../middleware/RoleMiddleware.php';
require_once '../../Controllers/UserController.php';

// Check if the user is a manager
RoleMiddleware::check(['manager']);

$controller = new UserController();
$employees = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $column = $_POST['column'];
    $order = $_POST['order'];
    $employees = $controller->sort($column, $order);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sort Employees</title>
</head>

<body>
    <h1>Sort Employees</h1>
    <form method="POST">
        <select name="column">
            <option value="name">Name</option>
            <option value="email">Email</option>
            <option value="role">Role</option>
        </select>
        <select name="order">
            <option value="ASC">Ascending</option>
            <option value="DESC">Descending</option>
        </select>
        <input type="submit" value="Sort">
    </form>
    <?php if (!empty($employees)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($employee['name']); ?></td>
                        <td><?php echo htmlspecialchars($employee['email']); ?></td>
                        <td><?php echo htmlspecialchars($employee['role']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <a href="manager_dashboard.php">Back to Dashboard</a>
</body>

</html>