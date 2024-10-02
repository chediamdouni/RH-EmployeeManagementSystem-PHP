<?php
session_start();
require_once '../../Controllers/UserController.php';
require_once '../../middleware/RoleMiddleware.php';

$userController = new UserController();
RoleMiddleware::check(['employee']);
$user = $userController->getUserById($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Personal Information</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Personal Information</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name: <?php echo $user['nom'] . ' ' . $user['prenom']; ?></h5>
                <p class="card-text"><strong>Email:</strong> <?php echo $user['email']; ?></p>
                <p class="card-text"><strong>Role:</strong> <?php echo $user['role']; ?></p>
                <p class="card-text"><strong>Department:</strong> <?php echo $user['departement_id']; ?></p>
                <p class="card-text"><strong>Category:</strong> <?php echo $user['categorie_id']; ?></p>
            </div>
        </div>
        <a href="employee_dashboard.php" class="btn btn-primary mt-3">Back to Dashboard</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>