<?php
session_start();
include 'db.php';
include 'header.php';
include 'authorize.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $stmt = $pdo->prepare("UPDATE Books SET title = ?, author = ? WHERE id = ?");
    $stmt->execute([$title, $author, $id]);
    header('Location: index.php');
    exit;
} else {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM Books WHERE id = ?");
    $stmt->execute([$id]);
    $book = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<h2>Edit Book</h2>
<form method="post">
    <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
    Title: <input type="text" name="title" value="<?php echo htmlspecialchars($book['title']); ?>"><br>
    Author: <input type="text" name="author" value="<?php echo htmlspecialchars($book['author']); ?>"><br>
    Year: <input type="text" name="year" value="<?php echo htmlspecialchars($book['year']); ?>"><br>
    <input type="submit" value="Update Book">
</form>
