<?php

function p($n){
    if (is_array($n)){
        foreach ($n as $x){
            p($x);
        }}
    else{
    echo $n."<br>";}
}
$arr1 = array(1, 2, 3);
$arr2 = [1, 2, 3];

$person = [
    "name" => "Yousef", 
    "age" => 25
];

// Array operations
array_push($arr1, "new_item");
p($arr1);

array_unshift($arr2, "new_item"); 
p($arr2);

array_pop($arr1);
p($arr1);

array_shift($arr2);
p($arr2);

// Array functions
p(count($arr1));
p(in_array("item", $arr1));
p(array_search("item", $arr1));

// Sorting
sort($arr1);
p($arr1);

rsort($arr1);
p($arr1);

asort($arr1);
p($arr1);

ksort($arr1);
p($arr1);

// Array transformations
$merged = array_merge($arr1, $arr2);
p($merged);

$filtered = array_filter($arr1, function($item) {
    return $item > 5;
});
p($filtered);

$mapped = array_map(function($item) {
    return $item * 2;
}, $arr1);
p($mapped);

$joined = implode(",", $arr1);
p($joined);

$unique = array_unique($arr1);
p($unique);
$str = "Hello World";
// String functions
p(strlen($str));
p(strtoupper($str));
p(strtolower($str));
p(ucfirst($str));
p(ucwords($str));

// String search and manipulation
p(strpos($str, "search"));
p(str_replace("old", "new", $str));
p(substr($str, 0, 5));

// String trimming
p(trim($str));
p(ltrim($str));
p(rtrim($str));

// String splitting
p(explode(" ", $str));

// String searching
p(substr_count($str, "search"));
p(strstr($str, "search"));
p(stristr($str, "search"));
$str1 = "Test String 1";
$str2 = "Test String 2";
// String comparison
p(strcmp($str1, $str2));
p(strcasecmp($str1, $str2));

// Hashing
p(md5($str));
p(sha1($str));
$name = "Yousef";
$age = 25;

// Formatting
p(printf("Name: %s, Age: %d", $name, $age));
p(sprintf("Name: %s, Age: %d", $name, $age));

// String repetition and padding
p(str_repeat($str, 3));
