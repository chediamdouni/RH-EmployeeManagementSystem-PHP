<?php
require_once '../../config/database.php';
require_once '../../models/Category.php';

class CategoryController {
    private $categoryModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->categoryModel = new Category($db);
    }

    public function getAllCategories() {
        return $this->categoryModel->getAllCategories();
    }

    public function getCategoryById($id) {
        return $this->categoryModel->getCategoryById($id);
    }

    public function createCategory($nom, $departement_id) {
        return $this->categoryModel->createCategory($nom, $departement_id);
    }

    public function updateCategory($id, $nom, $departement_id) {
        return $this->categoryModel->updateCategory($id, $nom, $departement_id);
    }

    public function deleteCategory($id) {
        return $this->categoryModel->deleteCategory($id);
    }
}
