<?php

class Category {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllCategories() {
        $stmt = $this->pdo->prepare("SELECT * FROM categories");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoryById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM categories WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createCategory($nom, $departement_id) {
        $stmt = $this->pdo->prepare("INSERT INTO categories (nom, departement_id) VALUES (:nom, :departement_id)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':departement_id', $departement_id);
        return $stmt->execute();
    }

    public function updateCategory($id, $nom, $departement_id) {
        $stmt = $this->pdo->prepare("UPDATE categories SET nom = :nom, departement_id = :departement_id WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':departement_id', $departement_id);
        return $stmt->execute();
    }

    public function deleteCategory($id) {
        $stmt = $this->pdo->prepare("DELETE FROM categories WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
