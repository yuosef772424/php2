<?php
// معلومات الاتصال بقاعدة البيانات
$host = 'localhost';        // اسم المضيف
$dbname = 'test_db';        // اسم قاعدة البيانات
$username = 'root';         // اسم المستخدم
$password = '';             // كلمة المرور

try {
    // إنشاء كائن PDO
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4"; // DSN
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // تفعيل وضع الأخطاء
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // تعيين نمط جلب البيانات الافتراضي
        PDO::ATTR_EMULATE_PREPARES   => false,                  // تعطيل محاكاة التحضيرات
    ];

    $pdo = new PDO($dsn, $username, $password, $options);

    echo "تم الاتصال بقاعدة البيانات بنجاح!";
} catch (PDOException $e) {
    // معالجة الأخطاء
    die("فشل الاتصال بقاعدة البيانات: " . $e->getMessage());
}

// استعلام إدخال البيانات
$sql = "INSERT INTO users (name, email) VALUES (:name, :email)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'name' => 'naserAladeeb',
    'email' => 'aladeebnaser@gmail.com',
]);

echo "تم إدخال البيانات بنجاح!";

// استعلام جلب البيانات
$sql = "SELECT * FROM users";
$stmt = $pdo->query($sql);

while ($row = $stmt->fetch()) {
    echo "الاسم: " . $row['name'] . " - البريد الإلكتروني: " . $row['email'] . "<br>";
}

// استعلام تحديث البيانات
$sql = "UPDATE users SET email = :email WHERE name = :name";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'email' => 'aladeebnaser@gmail.com',
    'name' => 'naserAladeeb',
]);

echo "تم تحديث البيانات بنجاح!";

// استعلام حذف البيانات
$sql = "DELETE FROM users WHERE name = :name";

$stmt = $pdo->prepare($sql);
$stmt->execute(['name' => 'naserAladeeb']);

echo "تم حذف البيانات بنجاح!";
?>
