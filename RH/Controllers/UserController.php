<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';

class UserController
{
    private $db;
    private $user;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function readAll()
    {
        return $this->user->readAll();
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->user->name = $_POST['name'];
            $this->user->email = $_POST['email'];
            $this->user->role = $_POST['role'];
            $this->user->password = $_POST['password'];
            if ($this->user->create()) {
                echo "User created successfully.";
            } else {
                echo "Failed to create user.";
            }
        }
    }

    public function readOne($id)
    {
        $this->user->id = $id;
        return $this->user->readOne();
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->user->id = $id;
            $this->user->name = $_POST['name'];
            $this->user->email = $_POST['email'];
            $this->user->role = $_POST['role'];
            if ($this->user->update()) {
                echo "User updated successfully.";
            } else {
                echo "Failed to update user.";
            }
        }
    }

    public function search($criteria)
    {
        return $this->user->search($criteria);
    }

    public function sort($column, $order)
    {
        return $this->user->sort($column, $order);
    }
    public function delete($id)
    {
        $this->user->id = $id;
        if ($this->user->delete()) {
            echo "User deleted successfully.";
        } else {
            echo "Failed to delete user.";
        }
    }

    public function authenticate($email, $password)
    {
        $user = $this->user->findByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
