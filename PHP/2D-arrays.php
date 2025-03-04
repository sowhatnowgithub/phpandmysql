<?php
$arr1 = [100, 200, 300];
$arr2 = [400, 500, 600];
$arr3 = [700, 800, 900];
$arr = [$arr1, $arr2, $arr3];
print $arr[2][1] . "<p></p>";
$sum = 0;
foreach ($arr[0] as $ar) {
    $sum += $ar;
}
$avg = $sum / 3;
print "Avg marks of class one is " . $avg . "\n";

?>
