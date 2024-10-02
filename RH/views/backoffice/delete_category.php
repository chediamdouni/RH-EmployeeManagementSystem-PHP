<?php
require_once '../../Controllers/CategoryController.php';

$controller = new CategoryController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $controller->deleteCategory($id);
    header('Location: list_category.php');
    exit();
}
?>
