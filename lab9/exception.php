<?php
/*
 * هذا الكود الشامل يوضح جميع أنواع معالجة الأخطاء والاستثناءات في PHP
 * مع أمثلة عملية لكل حالة من الحالات الأساسية والمتقدمة
 */

// ================ 1. فئات الاستثناءات المخصصة ================
class CustomException extends Exception {
    public function errorDetails() {
        return sprintf("خطأ مخصص في الملف: %s (السطر: %d)", 
            $this->getFile(), 
            $this->getLine()
        );
    }
}

class NetworkException extends RuntimeException {
    public function logNetworkError() {
        error_log(sprintf(
            "[%s] خطأ شبكة: %s - %s:%d",
            date('Y-m-d H:i:s'),
            $this->getMessage(),
            $this->getFile(),
            $this->getLine()
        ));
    }
}

class DatabaseException extends PDOException {
    public function getDetailedMessage() {
        return sprintf(
            "خطأ قاعدة بيانات [كود %d]: %s\nمسار: %s:%d",
            $this->getCode(),
            $this->getMessage(),
            $this->getFile(),
            $this->getLine()
        );
    }
}

// ================ 2. إعدادات معالجة الأخطاء ================
set_error_handler(function($errno, $errstr, $errfile, $errline) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});

// ================ 3. الدوال الرئيسية للأمثلة ================
function runBasicExamples() {
    // مثال 1: Exception الأساسية
    try {
        throw new Exception("هذا خطأ تجريبي عام");
    } catch (Exception $e) {
        echo "<div class='example'><b>1. معالجة Exception:</b> " . $e->getMessage() . "</div>";
    }

    // مثال 2: TypeError
    try {
        function calculate(int $a, int $b): int {
            return $a + $b;
        }
        calculate("10", 5); // تمرير قيمة نصية
    } catch (TypeError $e) {
        echo "<div class='example'><b>2. معالجة TypeError:</b> " . $e->getMessage() . "</div>";
    }

    // مثال 3: ParseError
    try {
        eval("invalid php syntax;");
    } catch (ParseError $e) {
        echo "<div class='example'><b>3. معالجة ParseError:</b> " . $e->getMessage() . "</div>";
    }

    // مثال 4: RuntimeException
    try {
        $file = 'non_existent_file.txt';
        if (!file_exists($file)) {
            throw new RuntimeException("الملف {$file} غير موجود");
        }
    } catch (RuntimeException $e) {
        echo "<div class='example'><b>4. معالجة RuntimeException:</b> " . $e->getMessage() . "</div>";
    }

    // مثال 5: LogicException
    try {
        function validateEmail(string $email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new LogicException("تنسيق البريد الإلكتروني غير صالح");
            }
        }
        validateEmail("invalid-email");
    } catch (LogicException $e) {
        echo "<div class='example'><b>5. معالجة LogicException:</b> " . $e->getMessage() . "</div>";
    }

    // مثال 6: InvalidArgumentException
    try {
        function deposit(float $amount) {
            if ($amount <= 0) {
                throw new InvalidArgumentException("المبلغ يجب أن يكون موجبًا");
            }
        }
        deposit(-100);
    } catch (InvalidArgumentException $e) {
        echo "<div class='example'><b>6. معالجة InvalidArgumentException:</b> " . $e->getMessage() . "</div>";
    }

    // مثال 7: PDOException
    try {
        $pdo = new PDO('mysql:host=invalid_host;dbname=test', 'user', 'wrong_pass');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "<div class='example'><b>7. معالجة PDOException:</b> " . $e->getMessage() . "</div>";
    }

    // مثال 8: Error العام
    try {
        undefinedFunctionCall();
    } catch (Error $e) {
        echo "<div class='example'><b>8. معالجة Error:</b> " . $e->getMessage() . "</div>";
    }
}

function runAdvancedExamples() {
    // مثال 9: تسلسل الاستثناءات
    try {
        try {
            new PDO('invalid_dsn', 'user', 'pass');
        } catch (PDOException $e) {
            throw new DatabaseException("فشل الاتصال بالخادم", 1001, $e);
        }
    } catch (DatabaseException $e) {
        echo "<div class='example'><b>9. تسلسل الاستثناءات:</b><br>";
        echo "الخطأ الحالي: " . $e->getMessage() . "<br>";
        echo "الخطأ الأصلي: " . $e->getPrevious()->getMessage() . "</div>";
    }

    // مثال 10: إعادة رمي الاستثناء
    try {
        function processPayment(float $amount) {
            if ($amount < 0) {
                throw new InvalidArgumentException("قيمة الدفع غير صالحة");
            }
        }
        
        try {
            processPayment(-50);
        } catch (InvalidArgumentException $e) {
            error_log("خطأ في الدفع: " . $e->getMessage());
            throw $e;
        }
    } catch (Exception $e) {
        echo "<div class='example'><b>10. إعادة رمي الاستثناء:</b> " . $e->getMessage() . "</div>";
    }

    // مثال 11: استخدام finally مع الموارد
    $file = null;
    try {
        $file = fopen("temp_data.txt", "w");
        fwrite($file, "بيانات مؤقتة");
        throw new Exception("خطأ مفاجئ أثناء الكتابة");
    } catch (Exception $e) {
        echo "<div class='example'><b>11. معالجة خطأ الملف:</b> " . $e->getMessage() . "</div>";
    } finally {
        if ($file) {
            fclose($file);
            echo "<div class='example'><b>12. إغلاق الملف:</b> تم إغلاق الملف بنجاح</div>";
        }
    }

    // مثال 13: معالجة عدة أنواع استثناءات
    try {
        $action = rand(0, 1) ? 'json' : 'db';
        
        if ($action === 'json') {
            json_decode("{invalid JSON}");
        } else {
            new PDO('invalid_dsn');
        }
    } catch (JsonException | PDOException $e) {
        echo "<div class='example'><b>13. خطأ متعدد:</b> " . get_class($e) . " - " . $e->getMessage() . "</div>";
    }

    // مثال 14: استثناءات مخصصة
    try {
        throw new CustomException("حدث خطأ في النظام");
    } catch (CustomException $e) {
        echo "<div class='example'><b>14. استثناء مخصص:</b> " . $e->errorDetails() . "</div>";
    }
}

// ================ 4. معالجة الأخطاء الخاصة ================
function handleSpecialCases() {
    // مثال 15: تحويل الأخطاء إلى استثناءات
    try {
        echo $undefinedVariable;
    } catch (ErrorException $e) {
        echo "<div class='example'><b>15. تحويل خطأ:</b> " . $e->getMessage() . "</div>";
    }

    // مثال 16: استثناءات في الكائنات
    class UserRegistration {
        public function register(string $email) {
            if (empty($email)) {
                throw new InvalidArgumentException("البريد الإلكتروني مطلوب");
            }
            // عملية التسجيل
        }
    }
    
    try {
        $registration = new UserRegistration();
        $registration->register("");
    } catch (InvalidArgumentException $e) {
        echo "<div class='example'><b>16. خطأ في التسجيل:</b> " . $e->getMessage() . "</div>";
    }

    // مثال 17: أخطاء المصفوفات
    try {
        $data = ['a' => 1, 'b' => 2];
        echo $data['c'];
    } catch (Error $e) {
        echo "<div class='example'><b>17. خطأ في المصفوفة:</b> " . $e->getMessage() . "</div>";
    }
}

// ================ 5. نظام تسجيل الأخطاء ================
class ErrorLogger {
    public static function logException(Throwable $e) {
        $logMessage = sprintf(
            "[%s] %s\nالملف: %s\nالسطر: %d\nالتتبع:\n%s\n\n",
            date('Y-m-d H:i:s'),
            $e->getMessage(),
            $e->getFile(),
            $e->getLine(),
            $e->getTraceAsString()
        );
        
        file_put_contents('errors.log', $logMessage, FILE_APPEND);
    }
}

// ================ 6. الإعدادات النهائية ================
set_exception_handler(function($e) {
    echo "<div class='error'><b>خطأ غير معالج:</b><br>";
    echo "النوع: " . get_class($e) . "<br>";
    echo "الرسالة: " . $e->getMessage() . "<br>";
    echo "الموقع: " . $e->getFile() . " (السطر: " . $e->getLine() . ")</div>";
    
    ErrorLogger::logException($e);
});

// ================ 7. تنفيذ الأمثلة ================
echo "<!DOCTYPE html>
<html>
<head>
    <title>أمثلة معالجة الأخطاء في PHP</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .example { margin: 15px 0; padding: 10px; border: 1px solid #ddd; }
        .error { color: red; padding: 15px; border: 2px solid red; }
    </style>
</head>
<body>
    <h1>أمثلة معالجة الأخطاء في PHP</h1>";

runBasicExamples();
runAdvancedExamples();
handleSpecialCases();

// مثال أخير لاستثناء غير ممسوك
throw new NetworkException("فشل في الاتصال بالخادم البعيد");

echo "</body></html>";