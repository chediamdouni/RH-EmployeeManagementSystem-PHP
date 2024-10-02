<?php
require_once '../../Controllers/UserController.php';

$controller = new UserController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $controller->deleteUser($id);
    header('Location: list_users.php');
    exit();
}
?>
