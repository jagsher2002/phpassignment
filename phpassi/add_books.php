<?php
session_start();
include 'db.php';
include 'header.php';
include 'authorize.php'; // This script checks if the user is logged in

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $stmt = $pdo->prepare("INSERT INTO Books (title, author,year) VALUES (?, ?)");
    $stmt->execute([$title, $author]);
    header('Location: index.php');
    exit;
}

?>
<h2>Add Book</h2>
<form method="post">
    Title: <input type="text" name="title"><br>
    Author: <input type="text" name="author"><br>
    Year: <input type="text" name="year"><br>
    <input type="submit" value="Add Book">
</form>
