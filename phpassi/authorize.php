<?php
session_start();

// Check if user is not logged in, redirect to login page.
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

// For more advanced scenarios, you might check user roles or permissions.
// Example:
// if ($_SESSION['role'] !== 'admin') {
//     header('Location: unauthorized.php'); // Redirect to an "unauthorized access" page or some other handler.
//     exit;
// }
?>
