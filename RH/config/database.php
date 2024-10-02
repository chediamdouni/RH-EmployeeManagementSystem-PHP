<?php
class Database
{
    private $host = "localhost";
    private $db_name = "gestion_rh";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

$role = [
    'admin' => [
        'manage_users',
        'manage_departments',
        'view_statistics',
        'assign_roles'
    ],
    'manager' => [
        'view_users',
        'view_departments'
    ],
    'employee' => [
        'view_profile'
    ]
];

// PDO : PHP Data Object
// PDO est une classe en PHP qui permet de se connecter à une base de données