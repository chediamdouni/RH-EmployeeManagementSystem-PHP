<?php
require_once '../../Controllers/UserController.php';
require_once '../../Controllers/DepartmentController.php';
require_once '../../Controllers/CategoryController.php';

$controller = new UserController();
$departmentController = new DepartmentController();
$categoryController = new CategoryController();

$departments = $departmentController->getAllDepartements();
$categories = $categoryController->getAllCategories();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $departement_id = $_POST['departement_id'];
    $categorie_id = $_POST['categorie_id'];
    $controller->updateUser($id, $nom, $prenom, $email, $password, $role, $departement_id, $categorie_id);
    header('Location: list_users.php');
    exit();
} else {
    $id = $_GET['id'];
    $user = $controller->getUserById($id);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit User</h1>
        <form action="edit_user.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" class="form-control" value="<?php echo $user['nom']; ?>" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prenom:</label>
                <input type="text" id="prenom" name="prenom" class="form-control" value="<?php echo $user['prenom']; ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo $user['email']; ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="role">Role:</label>
                <input type="text" id="role" name="role" class="form-control" value="<?php echo $user['role']; ?>" required>
            </div>

            <div class="form-group">
                <label for="departement_id">Departement:</label>
                <select id="departement_id" name="departement_id" class="form-control" required>
                    <?php foreach ($departments as $department): ?>
                        <option value="<?php echo $department['id']; ?>" <?php if ($department['id'] == $user['departement_id']) echo 'selected'; ?>>
                            <?php echo $department['nom']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="categorie_id">Categorie:</label>
                <select id="categorie_id" name="categorie_id" class="form-control" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $user['categorie_id']) echo 'selected'; ?>>
                            <?php echo $category['nom']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>