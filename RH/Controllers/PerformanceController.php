<?php
require_once '../../config/database.php';
require_once '../../models/PerformanceEvaluation.php';

class PerformanceController {
    private $performanceModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->performanceModel = new PerformanceEvaluation($db);
    }

    public function getAllEvaluations() {
        return $this->performanceModel->getAllEvaluations();
    }

    public function getEvaluationById($id) {
        return $this->performanceModel->getEvaluationById($id);
    }

    public function createEvaluation($user_id, $date_evaluation, $score, $commentaire_general, $critere, $note, $commentaire_critere)
    {
        return $this->performanceModel->createEvaluation($user_id, $date_evaluation, $score, $commentaire_general, $critere, $note, $commentaire_critere);
    }

    public function updateEvaluation($id, $user_id, $manager_id, $date_evaluation, $score, $commentaire_general, $critere, $note, $commentaire_critere) {
        return $this->performanceModel->updateEvaluation($id, $user_id, $manager_id, $date_evaluation, $score, $commentaire_general, $critere, $note, $commentaire_critere);
    }

    public function deleteEvaluation($id) {
        return $this->performanceModel->deleteEvaluation($id);
    }
}
