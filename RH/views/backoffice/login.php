<?php
session_start();
require_once '../../Controllers/UserController.php';

$controller = new UserController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $controller->authenticate($email, $password);
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['role'];

        // Redirect based on role
        switch ($user['role']) {
            case 'admin':
                header('Location: admin_dashboard.php');
                break;
            case 'manager':
                header('Location: manager_dashboard.php');
                break;
            case 'employee':
                header('Location: employee_dashboard.php');
                break;
            default:
                header('Location: login.php');
                break;
        }
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="login.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>

</html>