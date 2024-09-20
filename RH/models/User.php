<?php
class User
{
    private $conn;
    private $table_name = "users";

    public $id;
    public $name;
    public $email;
    public $role;
    public $password;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function readAll()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, email=:email, role=:role, password=:password";
        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->role = htmlspecialchars(strip_tags($this->role));
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":role", $this->role);
        $stmt->bindParam(":password", $this->password);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function readOne()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET name = :name, email = :email, role = :role WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->role = htmlspecialchars(strip_tags($this->role));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function search($criteria)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE name LIKE :criteria OR email LIKE :criteria OR role LIKE :criteria";
        $stmt = $this->conn->prepare($query);
        $criteria = "%{$criteria}%";
        $stmt->bindParam(':criteria', $criteria);
        $stmt->execute();
        return $stmt;
    }

    public function sort($column, $order)
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY " . $column . " " . $order;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function findByEmailAndRole($email, $role)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email AND role = :role LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':role', $role);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findByEmail($email)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
