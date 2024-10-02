<?php

class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllUsers() {
        $stmt = $this->pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($nom, $prenom, $email, $password, $role, $departement_id, $categorie_id) {
        $stmt = $this->pdo->prepare("INSERT INTO users (nom, prenom, email, password, role, departement_id, categorie_id) VALUES (:nom, :prenom, :email, :password, :role, :departement_id, :categorie_id)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_BCRYPT));
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':departement_id', $departement_id);
        $stmt->bindParam(':categorie_id', $categorie_id);
        return $stmt->execute();
    }

    public function updateUser($id, $nom, $prenom, $email, $password, $role, $departement_id, $categorie_id) {
        $stmt = $this->pdo->prepare("UPDATE users SET nom = :nom, prenom = :prenom, email = :email, password = :password, role = :role, departement_id = :departement_id, categorie_id = :categorie_id WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_BCRYPT));
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':departement_id', $departement_id);
        $stmt->bindParam(':categorie_id', $categorie_id);
        return $stmt->execute();
    }

    public function deleteUser($id) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function authenticate($email, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
