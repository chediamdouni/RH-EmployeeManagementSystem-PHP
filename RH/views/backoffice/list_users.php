<?php
require_once '../../Controllers/UserController.php';
require_once '../../middleware/RoleMiddleware.php';

RoleMiddleware::check(['admin']);

$controller = new UserController();
$users = $controller->readAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['search'])) {
        $users = $controller->search($_POST['search']);
    } elseif (isset($_POST['sort'])) {
        $users = $controller->sort($_POST['column'], $_POST['order']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>List Users</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>List of Users</h1>
        <form method="POST" class="search-form">
            <input type="text" name="search" placeholder="Search...">
            <input type="submit" value="Search" class="button">
        </form>
        <form method="POST" class="sort-form">
            <select name="column">
                <option value="name">Name</option>
                <option value="email">Email</option>
                <option value="role">Role</option>
            </select>
            <select name="order">
                <option value="ASC">Ascending</option>
                <option value="DESC">Descending</option>
            </select>
            <input type="submit" name="sort" value="Sort" class="button">
        </form>
        <button onclick="window.location.href='add_user.php'" class="button">Add User</button>
        <?php if ($users->rowCount() > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $users->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['role']); ?></td>
                            <td>
                                <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="button">Edit</a>
                                <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="button" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No users found.</p>
        <?php endif; ?>
        <a href="admin_dashboard.php" class="button">Back to Dashboard</a>
    </div>
</body>

</html>