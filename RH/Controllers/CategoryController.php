<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Category.php';

class CategoryController
{
    private $db;
    private $category;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->category = new Category($this->db);
    }

    public function readAll()
    {
        return $this->category->readAll();
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->category->name = $_POST['name'];
            if ($this->category->create()) {
                echo "Category created successfully.";
            } else {
                echo "Failed to create category.";
            }
        }
    }
}
