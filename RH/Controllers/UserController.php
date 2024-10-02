<?php
require_once '../../config/database.php';
require_once '../../models/User.php';

class UserController {
    private $userModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->userModel = new User($db);
    }

    public function getAllUsers() {
        return $this->userModel->getAllUsers();
    }

    public function getUserById($id) {
        return $this->userModel->getUserById($id);
    }

    public function createUser($nom, $prenom, $email, $password, $role, $departement_id, $categorie_id) {
        return $this->userModel->createUser($nom, $prenom, $email, $password, $role, $departement_id, $categorie_id);
    }

    public function updateUser($id, $nom, $prenom, $email, $password, $role, $departement_id, $categorie_id) {
        return $this->userModel->updateUser($id, $nom, $prenom, $email, $password, $role, $departement_id, $categorie_id);
    }

    public function deleteUser($id) {
        return $this->userModel->deleteUser($id);
    }

    public function authenticate($email, $password) {
        return $this->userModel->authenticate($email, $password);
    }
}
