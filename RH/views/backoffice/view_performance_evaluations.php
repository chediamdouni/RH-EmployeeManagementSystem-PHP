<?php
session_start();
require_once '../../middleware/RoleMiddleware.php';
require_once '../../Controllers/PerformanceController.php';

// Check if the user is an employee
RoleMiddleware::check(['employee']);

$controller = new PerformanceController();
$evaluations = $controller->getEvaluationsByUserId($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Performance Evaluations</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Performance Evaluations</h1>
        <?php if ($evaluations->rowCount() > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Score</th>
                        <th>Comments</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $evaluations->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['date']); ?></td>
                            <td><?php echo htmlspecialchars($row['score']); ?></td>
                            <td><?php echo htmlspecialchars($row['comments']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No performance evaluations found.</p>
        <?php endif; ?>
        <a href="employee_dashboard.php" class="button">Back to Dashboard</a>
    </div>
</body>

</html>