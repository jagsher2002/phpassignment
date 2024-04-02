<?php
session_start();
include 'db.php';
include 'authorize.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM Books WHERE id = ?");
$stmt->execute([$id]);
header('Location: index.php');
?>
