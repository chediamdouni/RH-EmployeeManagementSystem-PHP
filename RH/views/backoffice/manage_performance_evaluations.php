<?php
session_start();
require_once '../../middleware/RoleMiddleware.php';
require_once '../../Controllers/PerformanceController.php';

// Check if the user is a manager
RoleMiddleware::check(['manager']);

$controller = new PerformanceController();
$evaluations = $controller->getAllEvaluations();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submissions for adding, updating, or deleting evaluations
    // This part will depend on your specific requirements and implementation
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Performance Evaluations</title>
</head>

<body>
    <h1>Manage Performance Evaluations</h1>
    <?php if ($evaluations->rowCount() > 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Date</th>
                    <th>Score</th>
                    <th>Comments</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $evaluations->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['user_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['date']); ?></td>
                        <td><?php echo htmlspecialchars($row['score']); ?></td>
                        <td><?php echo htmlspecialchars($row['comments']); ?></td>
                        <td>
                            <a href="edit_evaluation.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a href="delete_evaluation.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this evaluation?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No performance evaluations found.</p>
    <?php endif; ?>
    <a href="manager_dashboard.php">Back to Dashboard</a>
</body>

</html>