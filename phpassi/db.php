<?php
$host = '172.31.22.43'; // or your host
$dbname = 'Jagsher200567017';
$user = 'Jagsher200567017';
$pass = 'a_RwALIaGd';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
