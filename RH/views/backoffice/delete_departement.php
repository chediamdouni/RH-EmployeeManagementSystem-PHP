<?php
require_once '../../Controllers/DepartmentController.php';

$controller = new DepartmentController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $controller->deleteDepartement($id);
    header('Location: list_departement.php');
    exit();
}
?>
