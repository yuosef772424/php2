

<?php
function p($n){
    echo $n."<br>";
}

$x = 10;
$y = 15;
if($x < $y):           // تصحيح $X إلى $x (حساسية حالة الأحرف)
    p( "the $x < $y");
else:
    p( "the $x > $y");
endif;           // إضافة endif لإغلاق جملة if

$yuosef = "yuosef mansor";
$len = strlen($yuosef); 
echo $len; // تصحيح $yosef إلى $yuosef
for ($i = 0; $i < $len-1; $i++) { 
    p( "I " . ($i+1) . " " . substr($yuosef, 0, $i+1) . "<br>");    
}
$i=3;
switch($i) {
    case 0:
        p( $i);
        break;
    case 2:
        p( "case 2");
    default:
        p( "the value out range");

}
$x=10;
while($x<10){
    p("the loop $x");
    $x+=1;
}
do{
    p( "yuosef");
    $x+=1;
}while($x<10);

$y="yuosef";

$y = "yuosef";
$n = ["item1", "item2", "item3"];  

foreach($n as $y){
    p($y . '</br>');  
}