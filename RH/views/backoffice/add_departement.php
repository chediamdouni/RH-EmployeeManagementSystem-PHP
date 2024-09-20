<?php
require_once '../../controllers/DepartmentController.php';
require_once '../../controllers/CategoryController.php';

$controller = new DepartmentController();
$categoryController = new CategoryController();
$categories = $categoryController->readAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->create();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Department</title>
</head>

<body>
    <h1>Add New Department</h1>
    <form action="add_departement.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="category_id">Category:</label>
        <select id="category_id" name="category_id" required>
            <?php while ($row = $categories->fetch(PDO::FETCH_ASSOC)): ?>
                <option value="<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['name']); ?></option>
            <?php endwhile; ?>
        </select><br><br>

        <input type="submit" value="Add Department">
    </form>
</body>

</html>