<?php
$host = 'localhost';
$dbname = 'gis';
$user = 'postgres';
$password = '123456';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    echo "Connection successful!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
