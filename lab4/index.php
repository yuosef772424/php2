<?php
$host = 'localhost';
$dbname = 'test';
$username = 'root';
$password = '';

try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $pdo = new PDO($dsn, $username, $password, $options);

} catch (PDOException $e) {
    die("فشل الاتصال بقاعدة البيانات: " . $e->getMessage());
}

require 'db.php';

// استعلام جلب البيانات
$sql = "SELECT * FROM users";
$stmt = $pdo->query($sql);

foreach ($stmt as $row) {
    echo "الاسم: " . $row['name'] . " - البريد الإلكتروني: " . $row['email'] . "<br>";
}
?>