<?php

class PerformanceEvaluation
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllEvaluations()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM performance_evaluation");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEvaluationById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM performance_evaluation WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createEvaluation($user_id, $date_evaluation, $score, $commentaire_general, $critere, $note, $commentaire_critere)
    {
        $stmt = $this->pdo->prepare("INSERT INTO performance_evaluation (user_id, date_evaluation, score, commentaire_general, critere, note, commentaire_critere) VALUES (:user_id, :date_evaluation, :score, :commentaire_general, :critere, :note, :commentaire_critere)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':date_evaluation', $date_evaluation);
        $stmt->bindParam(':score', $score);
        $stmt->bindParam(':commentaire_general', $commentaire_general);
        $stmt->bindParam(':critere', $critere);
        $stmt->bindParam(':note', $note);
        $stmt->bindParam(':commentaire_critere', $commentaire_critere);
        return $stmt->execute();
    }

    public function updateEvaluation($id, $user_id, $manager_id, $date_evaluation, $score, $commentaire_general, $critere, $note, $commentaire_critere)
    {
        $stmt = $this->pdo->prepare("UPDATE performance_evaluation SET user_id = :user_id, manager_id = :manager_id, date_evaluation = :date_evaluation, score = :score, commentaire_general = :commentaire_general, critere = :critere, note = :note, commentaire_critere = :commentaire_critere WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':manager_id', $manager_id);
        $stmt->bindParam(':date_evaluation', $date_evaluation);
        $stmt->bindParam(':score', $score);
        $stmt->bindParam(':commentaire_general', $commentaire_general);
        $stmt->bindParam(':critere', $critere);
        $stmt->bindParam(':note', $note);
        $stmt->bindParam(':commentaire_critere', $commentaire_critere);
        return $stmt->execute();
    }

    public function deleteEvaluation($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM performance_evaluation WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
