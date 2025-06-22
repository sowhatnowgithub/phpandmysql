<?php
$a = -23;
$b = 2.3;
$c = 4.553;

print "Absolute - function abs($a) is ".abs($a)."\n";
print "Ceil - function ceil($b) is ".ceil($b)."\n";
print "floor - funcion floor($b) is ".floor($b)."\n";
print "Exponential - function exp($c) is ".exp($c)."\n";
print "Logarithm to base e (natutal)- funcion log($b) is ".log($b)."\n";
print "Logarithm to base 10 - function log10($b) is ".log10($b)."\n";
print "Power - function pow($b,$c) its like num1^num2 is ".pow($b,$c)."\n";
print "pi value - function pi() is ".pi()."\n";
print "round - function round($c) is".round($c)."\n";
print "round to decimal point - funciton round($c,1) is ".round($c,1)."\n";
print "square root - function sqrt($c) is ".sqrt($c)."\n";

print "\n There are many trignometry functions \n\n";

print "Trimming a string\n\n";
$s = " \"abcde\" ";
print "function - trim($s) is ".trim($s)."\n";
print "function - ltrim($s) is ".ltrim($s)."\n";
print "function - rtrim($s) is ".rtrim($s)."\n";
print "\n\n";
print "Changing Case of a string\n\n";

$str1 = "johnson617";
$str2 = "Johnson617";

print "string to lower case - function strtolower($str2) is ".strtolower($str2)."\n";
print "string to upper case - function strtoupper($str2) is ".strtoupper($str2)."\n";

print "\n\n Converting Initial Letters to Uppercase \n\n";
$name = "robinson";
print "Dear Mr.".ucfirst($name)."\n";
print "first letter to Uppercase - function ucfirst($name) is ".ucfirst($name)."\n";
$str = "my name is sai, 20 years old";
print "all words in the string first letter to uppercase - \n function ucwords($str) is ".ucwords($str)."\n";
print "\n\n";

$ss = "Tuesday,June,3rd,john,smith";
$new_ss = str_replace(","," ",$ss);
print "Reaplacing a substring by another, str_replace(\",\",\" \",$ss) is $new_ss \n";
$sss = "sdss";
print "Reverse a string $sss, by strrev($sss) is ".strrev($sss)."\n";
$aa = "181225";
print "finding a substring usign substr, string is $aa, substr($aa,4,2) is ".substr($aa,4,2)."\n";
$date = "Tuesday**March**23rd";
print "we can find the characters position in the string by using strpos(), string is $date, position of ** is strpos($date,\"**\")\n\n";
$pos = strpos($date, "**");
$weekday = substr($date,0,$pos);
print "We can use substr(), substr($date,0,strpos($date,\"**\") will give $weekday \n\n";
print "We can find the length of the sting by strlen() \n\n";
$pos1 = strrpos($date,"**");
$day = substr($date,$pos1+2,strlen($date)-$pos1-2);
print "string is $date, then using substr($date, strpos($date,\"**\")+2,strlen($date)-strpos($date,\"**\")-2) is ".$day."\n\n";



?>