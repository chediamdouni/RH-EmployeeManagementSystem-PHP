<?php
require_once '../../Controllers/CategoryController.php';
require_once '../../Controllers/DepartmentController.php';

$categoryController = new CategoryController();
$departmentController = new DepartmentController();

$departments = $departmentController->getAllDepartements();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $departement_id = $_POST['departement_id'];
    $categoryController->createCategory($nom, $departement_id);
    header('Location: list_category.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Category</title>
</head>

<body>
    <h1>Add Category</h1>
    <form action="add_category.php" method="POST">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="departement_id">Departement:</label>
        <select id="departement_id" name="departement_id" required>
            <?php foreach ($departments as $department): ?>
                <option value="<?php echo $department['id']; ?>"><?php echo $department['nom']; ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <input type="submit" value="Add Category">
    </form>
</body>

</html>
