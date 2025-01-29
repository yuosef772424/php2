<?php
class Utility {
    private $name;
    private $email;

    // منشئ لتعيين القيم
    public function __construct($name = "غير محدد", $email = "غير متوفر") {
        $this->name = $name;
        $this->email = $email;
    }

    // Value Method لإضافة رقمين
    public function add($a, $b) {
        return $a + $b;
    }

    // Value Method لحساب الفرق بين رقمين
    public function subtract($a, $b) {
        return $a - $b;
    }

    // Value Method لحساب مساحة مستطيل
    public function calculateArea($length, $width) {
        return $length * $width;
    }

    // Value Method لحساب محيط مستطيل
    public function calculatePerimeter($length, $width) {
        return 2 * ($length + $width);
    }

    // Value Method لإرجاع اسم المستخدم
    public function getName() {
        return $this->name;
    }

    // Value Method لإرجاع بريد المستخدم
    public function getEmail() {
        return $this->email;
    }

    // Value Method لتحية المستخدم
    public function greet($customName = null) {
        $targetName = $customName ?? $this->name;
        return "مرحبًا، $targetName!";
    }
}

// إنشاء كائن من الصف Utility
$utility = new Utility("ناصر", "nasser@example.com");

// العمليات الحسابية
echo "مجموع 5 و 10: " . $utility->add(5, 10) . "<br>";
echo "الفرق بين 10 و 5: " . $utility->subtract(10, 5) . "<br>";

// حسابات المستطيل
echo "مساحة المستطيل (5x10): " . $utility->calculateArea(5, 10) . "<br>";
echo "محيط المستطيل (5x10): " . $utility->calculatePerimeter(5, 10) . "<br>";

// استعلام بيانات المستخدم
echo "اسم المستخدم: " . $utility->getName() . "<br>";
echo "بريد المستخدم: " . $utility->getEmail() . "<br>";

// تحية المستخدم
echo $utility->greet() . "<br>";
echo $utility->greet("ناصر") . "<br>";
?>
