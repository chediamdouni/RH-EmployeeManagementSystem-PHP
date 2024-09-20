<?php
require_once '../../config/database.php';

class PerformanceController
{
    private $conn;
    private $table_name = "performance_evaluations";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getEvaluationsByUserId($userId)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $userId);
        $stmt->execute();
        return $stmt;
    }

    public function getAllEvaluations()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function addEvaluation($userId, $date, $score, $comments)
    {
        $query = "INSERT INTO " . $this->table_name . " (user_id, date, score, comments) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $userId);
        $stmt->bindParam(2, $date);
        $stmt->bindParam(3, $score);
        $stmt->bindParam(4, $comments);
        return $stmt->execute();
    }

    public function updateEvaluation($id, $userId, $date, $score, $comments)
    {
        $query = "UPDATE " . $this->table_name . " SET user_id = ?, date = ?, score = ?, comments = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $userId);
        $stmt->bindParam(2, $date);
        $stmt->bindParam(3, $score);
        $stmt->bindParam(4, $comments);
        $stmt->bindParam(5, $id);
        return $stmt->execute();
    }

    public function deleteEvaluation($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}
