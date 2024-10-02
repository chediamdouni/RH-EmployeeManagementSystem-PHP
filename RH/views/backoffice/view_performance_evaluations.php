<?php
require_once '../../Controllers/PerformanceController.php';

$controller = new PerformanceController();
$evaluations = $controller->getAllEvaluations();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Performance Evaluations</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">View Performance Evaluations</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Date Evaluation</th>
                    <th>Score</th>
                    <th>Commentaire General</th>
                    <th>Critere</th>
                    <th>Note</th>
                    <th>Commentaire Critere</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($evaluations as $evaluation): ?>
                    <tr>
                        <td><?php echo $evaluation['date_evaluation']; ?></td>
                        <td><?php echo $evaluation['score']; ?></td>
                        <td><?php echo $evaluation['commentaire_general']; ?></td>
                        <td><?php echo $evaluation['critere']; ?></td>
                        <td><?php echo $evaluation['note']; ?></td>
                        <td><?php echo $evaluation['commentaire_critere']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>