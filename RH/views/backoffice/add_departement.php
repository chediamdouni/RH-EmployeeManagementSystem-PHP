<?php
require_once '../../Controllers/DepartmentController.php';

$controller = new DepartmentController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $controller->createDepartement($nom);
    header('Location: list_departement.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Departement</title>
</head>

<body>
    <h1>Add Departement</h1>
    <form action="add_departement.php" method="POST">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br><br>
        <input type="submit" value="Add Departement">
    </form>
</body>

</html>
