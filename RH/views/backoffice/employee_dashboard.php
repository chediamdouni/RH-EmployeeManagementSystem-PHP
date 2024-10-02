<?php
session_start();
require_once '../../Controllers/UserController.php';
require_once '../../Controllers/PerformanceController.php';
require_once '../../middleware/RoleMiddleware.php';

$userController = new UserController();
$performanceController = new PerformanceController();
RoleMiddleware::check(['employee']);
$user = $userController->getUserById($_SESSION['user_id']);
$evaluations = $performanceController->getAllEvaluations();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employee Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .nav-item {
            margin-right: 15px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Welcome, <?php echo $user['nom']; ?></h1>
        <ul class="nav nav-pills mb-4">
            <li class="nav-item">
                <a class="nav-link" href="view_personal_info.php"><i class="fas fa-user"></i> View Personal Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="update_personal_info.php"><i class="fas fa-edit"></i> Update Personal Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="view_performance_evaluations.php"><i class="fas fa-chart-line"></i> View Performance Evaluations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add_performance_evaluations.php"><i class="fas fa-tasks"></i> Ajouter Performance Evaluations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>