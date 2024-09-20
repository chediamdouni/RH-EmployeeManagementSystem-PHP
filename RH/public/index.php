<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
        require __DIR__ . '/views/frontoffice/article_list.php';
        break;
    case '/admin':
        require __DIR__ . '/views/backoffice/article_manage.php';
        break;
        // ... other routes
    default:
        http_response_code(404);
        echo "Page not found";
        break;
}
