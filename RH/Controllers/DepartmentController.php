<?php
require_once '../../config/database.php';
require_once '../../models/Departement.php';

class DepartmentController {
    private $departementModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->departementModel = new Departement($db);
    }

    public function getAllDepartements() {
        return $this->departementModel->getAllDepartements();
    }

    public function getDepartementById($id) {
        return $this->departementModel->getDepartementById($id);
    }

    public function createDepartement($nom) {
        return $this->departementModel->createDepartement($nom);
    }

    public function updateDepartement($id, $nom) {
        return $this->departementModel->updateDepartement($id, $nom);
    }

    public function deleteDepartement($id) {
        return $this->departementModel->deleteDepartement($id);
    }
}
