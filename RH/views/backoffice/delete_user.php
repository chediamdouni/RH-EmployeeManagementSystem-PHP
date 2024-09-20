<?php
require_once '../../controllers/UserController.php';

$controller = new UserController();

if (isset($_GET['id'])) {
    $controller->delete($_GET['id']);
}

header("Location: list_users.php");
exit();
