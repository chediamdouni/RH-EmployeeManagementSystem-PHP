<?php
require_once '../../controllers/DepartmentController.php';

$controller = new DepartmentController();

if (isset($_GET['id'])) {
    $controller->delete($_GET['id']);
}

header("Location: list_departement.php");
exit();
