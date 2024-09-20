<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class RoleMiddleware
{
    public static function check($requiredRoles)
    {
        $userRole = $_SESSION['user_role'] ?? null;
        if (!$userRole) {
            header('Location: ../../views/backoffice/login.php');
            exit();
        }

        // Debugging statements
        error_log("User Role: " . $userRole);
        error_log("Required Roles: " . implode(", ", $requiredRoles));

        if (!in_array($userRole, $requiredRoles)) {
            header('HTTP/1.1 403 Forbidden');
            echo "You do not have permission to access this page.";
            exit();
        }
    }
}
