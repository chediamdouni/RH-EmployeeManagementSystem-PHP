<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Departement.php';

class DepartmentController
{
    private $db;
    private $department;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->department = new Department($this->db);
    }

    public function readAll()
    {
        return $this->department->readAll();
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->department->name = $_POST['name'];
            $this->department->category_id = $_POST['category_id'];
            if ($this->department->create()) {
                echo "Department created successfully.";
            } else {
                echo "Failed to create department.";
            }
        }
    }

    public function readOne($id)
    {
        $this->department->id = $id;
        return $this->department->readOne();
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->department->id = $id;
            $this->department->name = $_POST['name'];
            $this->department->category_id = $_POST['category_id'];
            if ($this->department->update()) {
                echo "Department updated successfully.";
            } else {
                echo "Failed to update department.";
            }
        }
    }

    public function delete($id)
    {
        $this->department->id = $id;
        if ($this->department->delete()) {
            echo "Department deleted successfully.";
        } else {
            echo "Failed to delete department.";
        }
    }

    public function search($criteria)
    {
        return $this->department->search($criteria);
    }

    public function sort($column, $order)
    {
        return $this->department->sort($column, $order);
    }
}
