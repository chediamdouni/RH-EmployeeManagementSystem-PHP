<?php
require_once '../../Controllers/UserController.php';
require_once '../../Controllers/DepartmentController.php';
require_once '../../Controllers/CategoryController.php';
require_once '../../middleware/RoleMiddleware.php';

// Check if the user is an admin and a manager 
RoleMiddleware::check(['admin', 'manager']);
$userController = new UserController();
$departmentController = new DepartmentController();
$categoryController = new CategoryController();

$users = $userController->getAllUsers();
$departments = $departmentController->getAllDepartements();
$categories = $categoryController->getAllCategories();

// Créer des tableaux associatifs pour les départements et les catégories
$departmentNames = [];
foreach ($departments as $department) {
    $departmentNames[$department['id']] = $department['nom'];
}

$categoryNames = [];
foreach ($categories as $category) {
    $categoryNames[$category['id']] = $category['nom'];
}

// Filtrer les utilisateurs pour ne garder que ceux qui ont le rôle "employee"
$employees = array_filter($users, function ($user) {
    return $user['role'] === 'employee';
});

// Appliquer les filtres si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedDepartment = $_POST['departement_id'];
    $selectedCategory = $_POST['categorie_id'];

    if ($selectedDepartment != 'all') {
        $employees = array_filter($employees, function ($employee) use ($selectedDepartment) {
            return $employee['departement_id'] == $selectedDepartment;
        });
    }

    if ($selectedCategory != 'all') {
        $employees = array_filter($employees, function ($employee) use ($selectedCategory) {
            return $employee['categorie_id'] == $selectedCategory;
        });
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Search Employees</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">List of Employees</h1>

        <form method="POST" action="search_employees.php" class="form-inline mb-4">
            <div class="form-group mr-3">
                <label for="departement_id" class="mr-2">Departement:</label>
                <select id="departement_id" name="departement_id" class="form-control">
                    <option value="all">All</option>
                    <?php foreach ($departments as $department): ?>
                        <option value="<?php echo $department['id']; ?>"><?php echo $department['nom']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group mr-3">
                <label for="categorie_id" class="mr-2">Categorie:</label>
                <select id="categorie_id" name="categorie_id" class="form-control">
                    <option value="all">All</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['nom']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Departement</th>
                    <th>Categorie</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee): ?>
                    <tr>
                        <td><?php echo $employee['nom']; ?></td>
                        <td><?php echo $employee['prenom']; ?></td>
                        <td><?php echo $employee['email']; ?></td>
                        <td><?php echo $employee['role']; ?></td>
                        <td><?php echo $departmentNames[$employee['departement_id']]; ?></td>
                        <td><?php echo $categoryNames[$employee['categorie_id']]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>