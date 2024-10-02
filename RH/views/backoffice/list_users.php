<?php
require_once '../../Controllers/UserController.php';
require_once '../../Controllers/DepartmentController.php';
require_once '../../Controllers/CategoryController.php';
require_once '../../middleware/RoleMiddleware.php';

// Check if the user is an admin
RoleMiddleware::check(['admin']);
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

// Appliquer les filtres si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedDepartment = $_POST['departement_id'];
    $selectedCategory = $_POST['categorie_id'];
    $selectedRole = $_POST['role'];
    $sortBy = $_POST['sort_by'];

    if ($selectedDepartment != 'all') {
        $users = array_filter($users, function ($user) use ($selectedDepartment) {
            return $user['departement_id'] == $selectedDepartment;
        });
    }

    if ($selectedCategory != 'all') {
        $users = array_filter($users, function ($user) use ($selectedCategory) {
            return $user['categorie_id'] == $selectedCategory;
        });
    }

    if ($selectedRole != 'all') {
        $users = array_filter($users, function ($user) use ($selectedRole) {
            return $user['role'] == $selectedRole;
        });
    }

    if ($sortBy != 'none') {
        usort($users, function ($a, $b) use ($sortBy) {
            return strcmp($a[$sortBy], $b[$sortBy]);
        });
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>List Users</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">List of Users</h1>

        <form method="POST" action="list_users.php" class="form-inline mb-4">
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

            <div class="form-group mr-3">
                <label for="role" class="mr-2">Role:</label>
                <select id="role" name="role" class="form-control">
                    <option value="all">All</option>
                    <option value="admin">Admin</option>
                    <option value="employee">Employee</option>
                </select>
            </div>

            <div class="form-group mr-3">
                <label for="sort_by" class="mr-2">Sort By:</label>
                <select id="sort_by" name="sort_by" class="form-control">
                    <option value="none">None</option>
                    <option value="nom">Nom</option>
                    <option value="prenom">Prenom</option>
                    <option value="email">Email</option>
                    <option value="role">Role</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Filter & Sort</button>
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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['nom']; ?></td>
                        <td><?php echo $user['prenom']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['role']; ?></td>
                        <td><?php echo $departmentNames[$user['departement_id']]; ?></td>
                        <td><?php echo $categoryNames[$user['categorie_id']]; ?></td>
                        <td>
                            <a href="edit_user.php?id=<?php echo $user['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete_user.php?id=<?php echo $user['id']; ?>" class="btn btn-sm btn-danger">Delete</a>
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