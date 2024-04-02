<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Library</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>

<header>
    <nav class="nav">
        <ul class="nav-list">
            <li><a href="index.php" class="nav-link">Home</a></li>
            <li><a href="booklist.php" class="nav-link">Book List</a></li>
            <li><a href="add_books.php" class="nav-link">Add Book</a></li>
            <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
                <li><a href="logout.php" class="nav-link">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php" class="nav-link">Login</a></li>
                <li><a href="register.php" class="nav-link">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
