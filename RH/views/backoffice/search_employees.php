<?php
session_start();
require_once '../../middleware/RoleMiddleware.php';
require_once '../../Controllers/UserController.php';

// Check if the user is a manager
RoleMiddleware::check(['manager']);

$controller = new UserController();
$employees = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchCriteria = $_POST['search_criteria'];
    $employees = $controller->search($searchCriteria);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Search Employees</title>
</head>

<body>
    <h1>Search Employees</h1>
    <form method="POST">
        <input type="text" name="search_criteria" placeholder="Enter search criteria">
        <input type="submit" value="Search">
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