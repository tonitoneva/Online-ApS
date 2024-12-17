<?php
// Настройки за свързване към базата данни
$host = 'localhost'; // Хостът (обикновено 'localhost')
$dbname = 'auto_parts_shop'; // Името на базата данни
$user = 'root'; // Потребителско име за MySQL (по подразбиране 'root' в XAMPP)
$password = ''; // Парола за MySQL (по подразбиране празно в XAMPP)

try {
    // Свързване към базата данни с PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>