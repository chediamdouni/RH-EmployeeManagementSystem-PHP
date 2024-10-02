<?php

class Departement {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllDepartements() {
        $stmt = $this->pdo->prepare("SELECT * FROM departements");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDepartementById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM departements WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createDepartement($nom) {
        $stmt = $this->pdo->prepare("INSERT INTO departements (nom) VALUES (:nom)");
        $stmt->bindParam(':nom', $nom);
        return $stmt->execute();
    }

    public function updateDepartement($id, $nom) {
        $stmt = $this->pdo->prepare("UPDATE departements SET nom = :nom WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);
        return $stmt->execute();
    }

    public function deleteDepartement($id) {
        $stmt = $this->pdo->prepare("DELETE FROM departements WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
