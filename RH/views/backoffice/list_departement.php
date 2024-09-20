<?php
require_once '../../controllers/DepartmentController.php';
require_once '../../controllers/CategoryController.php';
require_once '../../middleware/RoleMiddleware.php';

RoleMiddleware::check(['admin']);

$controller = new DepartmentController();
$departments = $controller->readAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['search'])) {
        $departments = $controller->search($_POST['search']);
    } elseif (isset($_POST['sort'])) {
        $departments = $controller->sort($_POST['column'], $_POST['order']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>List Departments</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>List of Departments</h1>
        <button onclick="window.location.href='add_departement.php'" class="button">Add Department</button>
        <form method="POST" class="search-form">
            <input type="text" name="search" placeholder="Search...">
            <input type="submit" value="Search" class="button">
        </form>
        <form method="POST" class="sort-form">
            <select name="column">
                <option value="d.name">Department Name</option>
                <option value="c.name">Category Name</option>
            </select>
            <select name="order">
                <option value="ASC">Ascending</option>
                <option value="DESC">Descending</option>
            </select>
            <input type="submit" name="sort" value="Sort" class="button">
        </form>
        <?php if ($departments->rowCount() > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $departments->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['category_name']); ?></td>
                            <td>
                                <a href="edit_departement.php?id=<?php echo $row['id']; ?>" class="button">Edit</a>
                                <a href="delete_departement.php?id=<?php echo $row['id']; ?>" class="button" onclick="return confirm('Are you sure you want to delete this department?');">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No departments found.</p>
        <?php endif; ?>
        <a href="admin_dashboard.php" class="button">Back to Dashboard</a>
    </div>
</body>

</html>