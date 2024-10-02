<?php
require_once '../../Controllers/DepartmentController.php';

$controller = new DepartmentController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $controller->updateDepartement($id, $nom);
    header('Location: list_departement.php');
    exit();
} else {
    $id = $_GET['id'];
    $departement = $controller->getDepartementById($id);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Departement</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Departement</h1>
        <form action="edit_departement.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $departement['id']; ?>">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" class="form-control" value="<?php echo $departement['nom']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Departement</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>