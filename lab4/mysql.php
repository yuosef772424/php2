<?php
// معلومات الاتصال بقاعدة البيانات
$host = 'localhost';        // اسم المضيف
$dbname = 'test';        // اسم قاعدة البيانات
$username = 'root';         // اسم المستخدم
$password = '';             // كلمة المرور

//
/*$conn =new mysqli($host, $dbname, $username, $password);
if ($conn->connect_error) {
die("فشل الاتصال بقاعدة البيانات" . $conn->connect_error);
echo "تم الاتصال بقاعدة البيانات بنجاح!";
}
$conn->close(); */
//الاتصال عن طريق PDO
try {
    // إنشاء كائن PDO
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4"; // DSN
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       
        PDO::ATTR_EMULATE_PREPARES   => false,                 
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
    'name' => 'tareqalolofe',
    'email' => 'tmem123@@gmail.com',
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
    'email' => 'tmem123@@gmail.com',
    'name' => 'tareqalolofe',
]);

echo "تم تحديث البيانات بنجاح!";

// استعلام حذف البيانات
$sql = "DELETE FROM users WHERE name = :name";

$stmt = $pdo->prepare($sql);
$stmt->execute(['name' => 'tareqalolofe']);

echo "تم حذف البيانات بنجاح!";
?>
