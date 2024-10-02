<?php
session_start();
require_once '../../Controllers/PerformanceController.php';

$performanceController = new PerformanceController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $date_evaluation = $_POST['date_evaluation'];
    $score = $_POST['score'];
    $commentaire_general = $_POST['commentaire_general'];
    $critere = $_POST['critere'];
    $note = $_POST['note'];
    $commentaire_critere = $_POST['commentaire_critere'];

    $performanceController->createEvaluation($user_id, $date_evaluation, $score, $commentaire_general, $critere, $note, $commentaire_critere);
    header('Location: employee_dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Performance Evaluation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Add Performance Evaluation</h1>
        <form action="add_performance_evaluations.php" method="POST">
            <div class="form-group">
                <label for="date_evaluation">Date Evaluation:</label>
                <input type="date" id="date_evaluation" name="date_evaluation" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="score">Score:</label>
                <input type="number" id="score" name="score" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="commentaire_general">Commentaire General:</label>
                <textarea id="commentaire_general" name="commentaire_general" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="critere">Critere:</label>
                <input type="text" id="critere" name="critere" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="note">Note:</label>
                <input type="number" id="note" name="note" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="commentaire_critere">Commentaire Critere:</label>
                <textarea id="commentaire_critere" name="commentaire_critere" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add Evaluation</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>