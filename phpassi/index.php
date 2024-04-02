<?php
session_start();
include 'db.php';
include 'header.php';

echo '<h1>Book Library</h1>';

$stmt = $pdo->query('SELECT id, title, author, year FROM Books');
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo htmlspecialchars($row['title']) . ' by ' . htmlspecialchars($row['author']);
    // Add Edit and Delete options for each book if logged in
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
        echo " <a href='edit_books.php?id=".$row['id']."'>Edit</a>";
        echo " <a href='delete_books.php?id=".$row['id']."' onclick='return confirm(\"Are you sure?\")'>Delete</a>";
    }
    echo '<br>';
}
?>
<p>Books are not just collections of written words on pages; they are gateways to different worlds, both real and imagined. They have the extraordinary ability to transport readers through time and space, offering glimpses into other cultures, philosophies, and ways of thinking. Beyond their role as sources of entertainment, books are invaluable tools for education, capable of conveying knowledge on virtually any topic, from the intricacies of quantum physics to the delicate art of French cuisine. They challenge our perceptions, expand our understanding, and encourage us to grow intellectually and emotionally. In a rapidly digitalizing world, books remain steadfast companions, offering solace and inspiration, fostering empathy by allowing us to live countless lives and experience the breadth of human emotion. Whether it's the feel of paper between your fingers or the convenience of a digital screen, books in all their forms continue to be a testament to humanity's enduring quest for knowledge, creativity, and connection.</p>
</body>
</html>
