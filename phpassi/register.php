<?php
session_start();
include 'db.php';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO Users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $password]);
    header('Location: login.php');
    exit;
}
?>
<h2>Register</h2>
<form method="post">
    Username: <input type="text" name="username"><br>
    Email: <input type="email" name="email"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Register">
</form>
