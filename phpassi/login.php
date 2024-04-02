
<?php
session_start();
include 'db.php';
include 'header.php';

// Clear previous error
unset($_SESSION['login_error']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT id, password FROM Users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['loggedin'] = true;
        $_SESSION['userid'] = $user['id'];
        header('Location: index.php');
        exit;
    } else {
        // Instead of setting an error variable, set a session variable
        $_SESSION['login_error'] = 'Invalid login credentials.';
        // Redirect back to login.php or to a specific page to handle login errors
        header('Location: login.php');
        exit;
    }
}
?>
<h2>Login</h2>
<!-- Check for session error message instead -->
<?php if(isset($_SESSION['login_error'])): ?>
    <p><?php echo $_SESSION['login_error']; ?></p>
    <?php unset($_SESSION['login_error']); // Clear the error message after displaying ?>
<?php endif; ?>
<form method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>
