<?php
$str = "ababkdaa";
$newstr = str_replace("a","**",$str);
echo ("String : $str, replacing a with ** by str_replace() : $newstr <br>");
$str1 = "  akdhnSdNN  ";
$newstr1 = strtolower(ltrim($str1));
echo ("String: .$str1. , removing the leading spaces and convering to lower case: .$newstr1.<br>");
$str2 = "Tuesday**March**23rd";
$newstr2 = str_replace(substr($str2,strpos($str2,"**")+2,5),"December",$str2);
echo ("string: $str2, string after replacing march with december $newstr2 <br>");
print date("d/m/y")."<br>";
?>