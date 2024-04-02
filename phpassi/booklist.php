<?php
session_start();
include 'db.php';
include 'header.php';

// Fetch books from the database
$stmt = $pdo->prepare("SELECT id, title, author, year FROM Books ORDER BY title");
$stmt->execute();
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<h2>Book List</h2>
<?php if($books): ?>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                <th>Actions</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($books as $book): ?>
                <tr>
                    <td><?= htmlspecialchars($book['title']) ?></td>
                    <td><?= htmlspecialchars($book['author']) ?></td>
                    <td><?= htmlspecialchars($book['year']) ?></td>
                    <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                    <td>
                        <a href="edit_books.php?id=<?= $book['id'] ?>">Edit</a> |
                        <a href="delete_books.php?id=<?= $book['id'] ?>" onclick="return confirm('Are you sure you want to delete this book?');">Delete</a>
                    </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No books found.</p>
<?php endif; ?>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
    }
    th, td {
        padding: 8px;
        text-align: left;
    }
</style>
