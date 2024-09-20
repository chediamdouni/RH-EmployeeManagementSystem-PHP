<?php
require_once '../../controllers/DepartmentController.php';
require_once '../../controllers/CategoryController.php';

$controller = new DepartmentController();
$categoryController = new CategoryController();
$categories = $categoryController->readAll();
$department = null;

if (isset($_GET['id'])) {
    $department = $controller->readOne($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($_GET['id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Department</title>
</head>
<body>
    <h1>Edit Department</h1>
    <?php if ($department): ?>
        <form action="edit_departement.php?id=<?php echo $department['id']; ?>" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $department['name']; ?>" required><br><br>

            <label for="category_id">Category:</label>
            <select id="category_id" name="category_id" required>
                <?php while ($row = $categories->fetch(PDO::FETCH_ASSOC)): ?>
                    <option value="<?php echo $row['id']; ?>" <?php echo $department['category_id'] == $row['id'] ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($row['name']); ?>
                    </option>
                <?php endwhile; ?>
            </select><br><br>

            <input type="submit" value="Update Department">
        </form>
    <?php else: ?>
        <p>Department not found.</p>
    <?php endif; ?>
</body>
</html>
