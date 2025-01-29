<?php
// 1. تعريف مصفوفة من النصوص
$texts = ["Hello", "World", "PHP", "Programming", "12345", "test@example.com", "2023-10-05"];

// 2. التحقق من صحة البريد الإلكتروني باستخدام preg_match
$email = "test@example.com";
if (preg_match("/^[a-zA-Z0-9-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
    echo "البريد الإلكتروني صحيح.\n";
} else {
    echo "البريد الإلكتروني غير صحيح.\n";
}

// 3. البحث عن كلمة معينة في النص
$text = "This is a sample text.";
if (preg_match("/sample/", $text)) {
    echo "تم العثور على الكلمة.\n";
} else {
    echo "الكلمة غير موجودة.\n";
}

// 4. استبدال نص باستخدام preg_replace
$text = "Hello World!";
$newText = preg_replace("/World/", "PHP", $text);
echo $newText . "\n"; // Output: Hello PHP!

// 5. تقسيم النص باستخدام preg_split
$text = "apple,banana,orange";
$fruits = preg_split("/,/", $text);
print_r($fruits); // Output: Array ( [0] => apple [1] => banana [2] => orange )

// 6. استخدام التعبيرات النمطية مع Unicode (UTF-8)
$unicodeText = "مرحبا بالعالم";
if (preg_match("/\p{Arabic}+/u", $unicodeText)) {
    echo "تم العثور على نص عربي.\n";
}

// 7. استخدام التعبيرات النمطية العودية (Recursive Patterns)
$nestedText = "(abc(def)ghi)";
if (preg_match('/\(([^()]|(?R))*\)/', $nestedText)) {
    echo "تم العثور على نص متداخل.\n";
}

// 8. استخدام التعبيرات النمطية الشرطية (Conditional Patterns)
$conditionalText = "123";
if (preg_match('/(?(?=\d)\d{3}|[A-Z]{3})/', $conditionalText)) {
    echo "تم العثور على نمط شرطي.\n";
}

// 9. استخدام التعبيرات النمطية ذات الأسماء (Named Patterns)
$dateText = "2023-10-05";
if (preg_match('/(?<year>\d{4})-(?<month>\d{2})-(?<day>\d{2})/', $dateText, $matches)) {
    echo "السنة: " . $matches['year'] . "\n"; // Output: السنة: 2023
}

// 10. استخدام التعبيرات النمطية ذات التعليقات (Comments)
$commentPattern = '/(?# هذا تعليق)\d{3}/';
if (preg_match($commentPattern, "123")) {
    echo "تم العثور على نمط مع تعليق.\n";
}

// 11. استخدام التعبيرات النمطية ذات الأنماط الذرية (Atomic Groups)
$atomicPattern = '/a(?>bc|b)c/';
if (!preg_match($atomicPattern, "abc")) {
    echo "النمط الذري لم يطابق.\n";
}

// 12. استخدام التعبيرات النمطية ذات الأنماط غير الملتقطة (Non-Capturing Groups)
$nonCapturingPattern = '/(?:abc){2}/';
if (preg_match($nonCapturingPattern, "abcabc")) {
    echo "تم العثور على نمط غير ملتقط.\n";
}

// 13. استخدام التعبيرات النمطية ذات الأنماط الإيجابية والسلبية (Lookahead and Lookbehind)
$lookaheadText = "24px";
if (preg_match('/\d{2}(?=px)/', $lookaheadText)) {
    echo "تم العثور على lookahead.\n";
}

// 14. استخدام التعبيرات النمطية ذات الأنماط الديناميكية (Dynamic Patterns)
$dynamicWord = "apple";
$dynamicPattern = "/\b$dynamicWord\b/";
if (preg_match($dynamicPattern, "I love apple pie.")) {
    echo "تم العثور على نمط ديناميكي.\n";
}

// 15. استخدام التعبيرات النمطية ذات الأنماط المتغيرة (Subroutines)
$subroutinePattern = '/(\d{3})-(?1)/';
if (preg_match($subroutinePattern, "123-456")) {
    echo "تم العثور على نمط متغير.\n";
}

// 16. استخدام التعبيرات النمطية ذات الأنماط المحددة مسبقًا (Predefined Character Classes)
$unicodePattern = '/\p{L}+/u';
if (preg_match($unicodePattern, "Hello")) {
    echo "تم العثور على حروف Unicode.\n";
}

// 17. استخدام التعبيرات النمطية ذات الأنماط المتعددة (Multiline Patterns)
$multilineText = "line1\nstart line2";
if (preg_match('/^start/m', $multilineText)) {
    echo "تم العثور على نمط متعدد الأسطر.\n";
}

// 18. استخدام التعبيرات النمطية ذات الأنماط المتكررة (Possessive Quantifiers)
$possessivePattern = '/\d++/';
if (preg_match($possessivePattern, "123")) {
    echo "تم العثور على نمط تملكي.\n";
}

// 19. استخدام التعبيرات النمطية ذات الأنماط الديناميكية (Dynamic Backreferences)
$backreferencePattern = '/(\d{2})-\g{1}/';
if (preg_match($backreferencePattern, "12-12")) {
    echo "تم العثور على backreference ديناميكي.\n";
}

// 20. استخدام التعبيرات النمطية ذات الأنماط المحددة مسبقًا (Predefined Assertions)
$assertionPattern = '/\Astart/';
if (preg_match($assertionPattern, "start of the text")) {
    echo "تم العثور على assertion.\n";
}

// ================================================================================




// =================================================================================
// 1. الحصول على الشهادة الزمنية الحالية
echo "1. الشهادة الزمنية الحالية:\n";
$timestamp = time();
echo "   الوقت الحالي (UNIX Timestamp): $timestamp\n\n";

// 2. تنسيق التاريخ والوقت باستخدام date()
echo "2. تنسيق التاريخ والوقت:\n";
$dateString = date('Y-m-d H:i:s', $timestamp);
echo "   التاريخ والوقت الحاليان: $dateString\n\n";

// 3. الحصول على معلومات مفصلة عن التاريخ باستخدام getdate()
echo "3. معلومات مفصلة عن التاريخ:\n";
$dateInfo = getdate($timestamp);
echo "   السنة: " . $dateInfo['year'] . "\n";
echo "   الشهر: " . $dateInfo['mon'] . "\n";
echo "   اليوم: " . $dateInfo['mday'] . "\n";
echo "   الساعة: " . $dateInfo['hours'] . "\n";
echo "   الدقيقة: " . $dateInfo['minutes'] . "\n";
echo "   الثانية: " . $dateInfo['seconds'] . "\n";
echo "   اليوم في الأسبوع: " . $dateInfo['wday'] . "\n";
echo "   اليوم في السنة: " . $dateInfo['yday'] . "\n";
echo "   اسم اليوم: " . $dateInfo['weekday'] . "\n";
echo "   اسم الشهر: " . $dateInfo['month'] . "\n\n";

// 4. تحويل نص إلى شهادة زمنية باستخدام strtotime()
echo "4. تحويل نص إلى شهادة زمنية:\n";
$futureTimestamp = strtotime('+1 week', $timestamp);
echo "   الشهادة الزمنية بعد أسبوع: $futureTimestamp\n";
echo "   التاريخ بعد أسبوع: " . date('Y-m-d H:i:s', $futureTimestamp) . "\n\n";

// 5. إنشاء شهادة زمنية يدويًا باستخدام mktime()
echo "5. إنشاء شهادة زمنية يدويًا:\n";
$manualTimestamp = mktime(12, 34, 56, 10, 10, 2023);
echo "   الشهادة الزمنية اليدوية: $manualTimestamp\n";
echo "   التاريخ اليدوي: " . date('Y-m-d H:i:s', $manualTimestamp) . "\n\n";

// 6. التحقق من صحة تاريخ باستخدام checkdate()
echo "6. التحقق من صحة تاريخ:\n";
$isValidDate = checkdate(2, 29, 2023); // 2023 ليست سنة كبيسة
echo "   هل التاريخ 2023-02-29 صحيح؟ " . ($isValidDate ? 'نعم' : 'لا') . "\n\n";

// 7. الحصول على الوقت بالمايكروثواني باستخدام microtime()
echo "7. الحصول على الوقت بالمايكروثواني:\n";
$microtime = microtime(true);
echo "   الوقت بالمايكروثواني: $microtime\n\n";

// 8. تعيين المنطقة الزمنية باستخدام date_default_timezone_set()
echo "8. تعيين المنطقة الزمنية:\n";
date_default_timezone_set('Asia/Riyadh');
echo "   المنطقة الزمنية الحالية: " . date_default_timezone_get() . "\n";
echo "   الوقت الحالي بتوقيت الرياض: " . date('Y-m-d H:i:s') . "\n\n";

// 9. استخدام DateTime للتعامل مع التواريخ
echo "9. استخدام كائن DateTime:\n";
$dateTime = new DateTime();
echo "   التاريخ والوقت الحاليان (DateTime): " . $dateTime->format('Y-m-d H:i:s') . "\n";

// إضافة فترة زمنية باستخدام DateInterval
$dateInterval = new DateInterval('P10D'); // 10 أيام
$dateTime->add($dateInterval);
echo "   التاريخ بعد إضافة 10 أيام: " . $dateTime->format('Y-m-d H:i:s') . "\n";

// حساب الفرق بين تاريخين
$dateTime1 = new DateTime('2023-10-01');
$dateTime2 = new DateTime('2023-10-10');
$interval = $dateTime1->diff($dateTime2);
echo "   الفرق بين 2023-10-01 و 2023-10-10: " . $interval->days . " أيام\n\n";

// 10. استخدام DateTimeImmutable
echo "10. استخدام DateTimeImmutable:\n";
$dateTimeImmutable = new DateTimeImmutable();
echo "   التاريخ والوقت الحاليان (DateTimeImmutable): " . $dateTimeImmutable->format('Y-m-d H:i:s') . "\n";

// إضافة فترة زمنية (لا يؤثر على الكائن الأصلي)
$newDateTime = $dateTimeImmutable->add(new DateInterval('P5D'));
echo "   التاريخ بعد إضافة 5 أيام: " . $newDateTime->format('Y-m-d H:i:s') . "\n";
echo "   التاريخ الأصلي لم يتغير: " . $dateTimeImmutable->format('Y-m-d H:i:s') . "\n\n";

// 11. استخدام strftime() للتنسيق المحلي
echo "11. استخدام strftime() للتنسيق المحلي:\n";
setlocale(LC_TIME, 'ar_SA.UTF-8'); // تعيين اللغة العربية
echo "   التاريخ والوقت الحاليان (strftime): " . strftime('%A %d %B %Y %H:%M:%S') . "\n\n";

// 12. استخدام gmdate() للحصول على الوقت بتوقيت جرينتش
echo "12. الحصول على الوقت بتوقيت جرينتش:\n";
echo "   الوقت الحالي بتوقيت جرينتش: " . gmdate('Y-m-d H:i:s') . "\n\n";

// 13. استخدام DatePeriod للتكرار عبر مجموعة من التواريخ
echo "13. استخدام DatePeriod للتكرار عبر مجموعة من التواريخ:\n";
$startDate = new DateTime('2023-10-01');
$endDate = new DateTime('2023-10-05');
$interval = new DateInterval('P1D'); // فترة يوم واحد
$datePeriod = new DatePeriod($startDate, $interval, $endDate);

foreach ($datePeriod as $date) {
    echo "   التاريخ: " . $date->format('Y-m-d') . "\n";
}
echo "\n";

// 14. استخدام DateTimeZone للتعامل مع المناطق الزمنية
echo "14. استخدام DateTimeZone:\n";
$timezone = new DateTimeZone('America/New_York');
$dateTimeWithTZ = new DateTime('now', $timezone);
echo "   الوقت الحالي في نيويورك: " . $dateTimeWithTZ->format('Y-m-d H:i:s') . "\n\n";

// 15. استخدام DateInterval لإنشاء فترات زمنية
echo "15. استخدام DateInterval:\n";
$interval = new DateInterval('P1Y2M10DT2H30M'); // 1 سنة، 2 أشهر، 10 أيام، ساعتان، 30 دقيقة
echo "   الفترة الزمنية: " . $interval->format('%y سنوات، %m أشهر، %d أيام، %h ساعات، %i دقائق') . "\n\n";

// 16. استخدام DateTime::createFromFormat()
echo "16. استخدام DateTime::createFromFormat():\n";
$date = DateTime::createFromFormat('d/m/Y', '10/10/2023');
echo "   التاريخ من التنسيق المخصص: " . $date->format('Y-m-d') . "\n\n";

// 17. استخدام DateTime::setTimestamp()
echo "17. استخدام DateTime::setTimestamp():\n";
$dateTime = new DateTime();
$dateTime->setTimestamp(1697049600);
echo "   التاريخ بعد تعيين الشهادة الزمنية: " . $dateTime->format('Y-m-d H:i:s') . "\n\n";

// 18. استخدام DateTime::getTimestamp()
echo "18. استخدام DateTime::getTimestamp():\n";
$dateTime = new DateTime();
echo "   الشهادة الزمنية الحالية: " . $dateTime->getTimestamp() . "\n\n";

// 19. استخدام DateTime::modify()
echo "19. استخدام DateTime::modify():\n";
$dateTime = new DateTime();
$dateTime->modify('+1 day');
echo "   التاريخ بعد التعديل: " . $dateTime->format('Y-m-d H:i:s') . "\n\n";

// 20. استخدام DateTime::setTimezone()
echo "20. استخدام DateTime::setTimezone():\n";
$dateTime = new DateTime();
$timezone = new DateTimeZone('Europe/London');
$dateTime->setTimezone($timezone);
echo "   الوقت الحالي بتوقيت لندن: " . $dateTime->format('Y-m-d H:i:s') . "\n\n";

// 21. استخدام DateTime::getTimezone()
echo "21. استخدام DateTime::getTimezone():\n";
$dateTime = new DateTime();
$timezone = $dateTime->getTimezone();
echo "   المنطقة الزمنية الحالية: " . $timezone->getName() . "\n\n";

// 22. استخدام DateTime::setDate()
echo "22. استخدام DateTime::setDate():\n";
$dateTime = new DateTime();
$dateTime->setDate(2024, 1, 1);
echo "   التاريخ بعد التعيين: " . $dateTime->format('Y-m-d') . "\n\n";

// 23. استخدام DateTime::setTime()
echo "23. استخدام DateTime::setTime():\n";
$dateTime = new DateTime();
$dateTime->setTime(14, 30);
echo "   الوقت بعد التعيين: " . $dateTime->format('H:i:s') . "\n\n";

// 24. استخدام DateTime::getOffset()
echo "24. استخدام DateTime::getOffset():\n";
$dateTime = new DateTime();
echo "   الفارق الزمني عن جرينتش: " . $dateTime->getOffset() . " ثانية\n\n";

// 25. استخدام DateTime::sub()
echo "25. استخدام DateTime::sub():\n";
$dateTime = new DateTime();
$interval = new DateInterval('P10D'); // 10 أيام
$dateTime->sub($interval);
echo "   التاريخ قبل 10 أيام: " . $dateTime->format('Y-m-d') . "\n\n";


?>