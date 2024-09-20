<?php
class Department
{
    private $conn;
    private $table_name = "departments";

    public $id;
    public $name;
    public $category_id;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function readAll()
    {
        $query = "SELECT d.*, c.name as category_name FROM " . $this->table_name . " d LEFT JOIN categories c ON d.category_id = c.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, category_id=:category_id";
        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":category_id", $this->category_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function readOne()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET name = :name, category_id = :category_id WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':category_id', $this->category_id);
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
        $query = "SELECT d.*, c.name as category_name FROM " . $this->table_name . " d LEFT JOIN categories c ON d.category_id = c.id WHERE d.name LIKE :criteria OR c.name LIKE :criteria";
        $stmt = $this->conn->prepare($query);
        $criteria = "%{$criteria}%";
        $stmt->bindParam(':criteria', $criteria);
        $stmt->execute();
        return $stmt;
    }

    public function sort($column, $order)
    {
        $query = "SELECT d.*, c.name as category_name FROM " . $this->table_name . " d LEFT JOIN categories c ON d.category_id = c.id ORDER BY {$column} {$order}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
