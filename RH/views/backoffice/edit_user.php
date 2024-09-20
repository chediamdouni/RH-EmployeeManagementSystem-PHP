<?php
require_once '../../controllers/UserController.php';

$controller = new UserController();
$user = null;

if (isset($_GET['id'])) {
    $user = $controller->readOne($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>

<body>
    <h1>Edit User</h1>
    <?php if ($user): ?>
        <form action="edit_user.php?id=<?php echo $user['id']; ?>" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br><br>
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="admin" <?php echo $user['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                <option value="manager" <?php echo $user['role'] == 'manager' ? 'selected' : ''; ?>>Manager</option>
                <option value="employee" <?php echo $user['role'] == 'employee' ? 'selected' : ''; ?>>Employee</option>
            </select><br><br>
            <input type="submit" value="Update User">
        </form>
    <?php else: ?>
        <p>User not found.</p>
    <?php endif; ?>
</body>

</html>