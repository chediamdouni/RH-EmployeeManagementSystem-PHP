<?php
require_once "../../controllers/CategoryController.php";

$controller = new CategoryController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->create();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Category</title>
</head>

<body>
    <h1>Add New Category</h1>
    <form action="add_category.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <input type="submit" value="Add Category">
    </form>
</body>

</html>