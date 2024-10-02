<?php
require_once '../../Controllers/CategoryController.php';
require_once '../../Controllers/DepartmentController.php';

$categoryController = new CategoryController();
$departmentController = new DepartmentController();

$departments = $departmentController->getAllDepartements();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $departement_id = $_POST['departement_id'];
    $categoryController->updateCategory($id, $nom, $departement_id);
    header('Location: list_category.php');
    exit();
} else {
    $id = $_GET['id'];
    $category = $categoryController->getCategoryById($id);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Category</title>
</head>

<body>
    <h1>Edit Category</h1>
    <form action="edit_category.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?php echo $category['nom']; ?>" required><br><br>

        <label for="departement_id">Departement:</label>
        <select id="departement_id" name="departement_id" required>
            <?php foreach ($departments as $department): ?>
                <option value="<?php echo $department['id']; ?>" <?php if ($department['id'] == $category['departement_id']) echo 'selected'; ?>>
                    <?php echo $department['nom']; ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <input type="submit" value="Update Category">
    </form>
</body>

</html>
