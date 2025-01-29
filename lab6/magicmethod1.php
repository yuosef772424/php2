<?php

class MagicMethodsExample {
    private $properties = [];
    public $publicProperty = "خاصية عامة";

    // __construct: يتم استدعاؤها عند إنشاء الكائن
    public function __construct($name) {
        echo "تم إنشاء الكائن، مرحبًا $name!<br>";
    }

    // __destruct: يتم استدعاؤها عند تدمير الكائن
    public function __destruct() {
        echo "تم تدمير الكائن.<br>";
    }

    // __get: يتم استدعاؤها عند الوصول إلى خاصية غير موجودة
    public function __get($name) {
        return $this->properties[$name] ?? "الخاصية '$name' غير موجودة.<br>";
    }

    // __set: يتم استدعاؤها عند تعيين قيمة لخاصية غير موجودة
    public function __set($name, $value) {
        $this->properties[$name] = $value;
        echo "تم تعيين القيمة '$value' للخاصية '$name'.<br>";
    }

    // __isset: يتم استدعاؤها عند استخدام isset() أو empty()
    public function __isset($name) {
        return isset($this->properties[$name]);
    }

    // __unset: يتم استدعاؤها عند استخدام unset()
    public function __unset($name) {
        unset($this->properties[$name]);
        echo "تم حذف الخاصية '$name'.<br>";
    }

    // __call: يتم استدعاؤها عند محاولة استدعاء دالة غير موجودة
    public function __call($name, $arguments) {
        echo "تم استدعاء الدالة '$name' بالمعطيات: " . implode(", ", $arguments) . ".<br>";
    }

    // __callStatic: يتم استدعاؤها عند استدعاء دالة ثابتة غير موجودة
    public static function __callStatic($name, $arguments) {
        echo "تم استدعاء الدالة الثابتة '$name' بالمعطيات: " . implode(", ", $arguments) . ".<br>";
    }

    // __toString: يتم استدعاؤها عند محاولة تحويل الكائن إلى نص
    public function __toString() {
        return "هذا الكائن يمثل مثالًا على الدوال السحرية.<br>";
    }

    // __invoke: يتم استدعاؤها عند محاولة استدعاء الكائن كدالة
    public function __invoke($argument) {
        echo "تم استدعاء الكائن كدالة مع المعطى: $argument.<br>";
    }

    // __clone: يتم استدعاؤها عند استنساخ الكائن
    public function __clone() {
        echo "تم استنساخ الكائن.<br>";
    }

    // __debugInfo: تحدد البيانات التي يتم عرضها عند استخدام var_dump
    public function __debugInfo() {
        return [
            'publicProperty' => $this->publicProperty,
            'storedProperties' => $this->properties
        ];
    }
}

// إنشاء كائن واختبار الدوال السحرية
$obj = new MagicMethodsExample("ناصر");

// __set و __get
$obj->name = "ناصر"; // __set
echo $obj->name;    // __get

// __isset و __unset
if (isset($obj->name)) { // __isset
    echo "الخاصية 'name' موجودة.<br>";
}
unset($obj->name);       // __unset

// __call و __callStatic
$obj->undefinedMethod("معطى1", "معطى2"); // __call
MagicMethodsExample::undefinedStaticMethod("معطى1", "معطى2"); // __callStatic

// __toString
echo $obj; // __toString

// __invoke
$obj("اختبار"); // __invoke

// استنساخ الكائن واختبار __clone
$clone = clone $obj; // __clone

// __debugInfo
var_dump($obj); // __debugInfo

?>
