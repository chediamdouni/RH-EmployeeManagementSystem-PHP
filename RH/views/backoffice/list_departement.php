<?php
require_once '../../Controllers/DepartmentController.php';
require_once '../../middleware/RoleMiddleware.php';

// Check if the user is an admin
RoleMiddleware::check(['admin']);
$controller = new DepartmentController();
$departements = $controller->getAllDepartements();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>List Departements</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">List of Departements</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($departements as $departement): ?>
                    <tr>
                        <td><?php echo $departement['nom']; ?></td>
                        <td>
                            <a href="edit_departement.php?id=<?php echo $departement['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete_departement.php?id=<?php echo $departement['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>