<?php
require_once '../../controllers/CategoryController.php';

$controller = new CategoryController();
$categories = $controller->readAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>List Categories</title>
</head>

<body>
    <h1>List of Categories</h1>
    <?php if ($categories->rowCount() > 0): ?>
        <ul>
            <?php while ($row = $categories->fetch(PDO::FETCH_ASSOC)): ?>
                <li><?php echo htmlspecialchars($row['name']); ?></li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>No categories found.</p>
    <?php endif; ?>
</body>

</html>