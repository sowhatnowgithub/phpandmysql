<?php
$alpha = [];
$alpha[0] = 1100;
$alpha[1] = 200;
$alpha[2] = 200;
$alpha[-1] = 1400;
$alpha[3] = 500;
$alpha[4] = 600;
$alpha[8] = 1900;
$alpha[-11] = 1400;
$alpha[13] = 500;

print "Actual Elements of the variable \n";
foreach ($alpha as $int => $alph) {
    print $alph . "..." . $int . "\n";
}

print "After asort we can see that key values of the original array won't change.\n";
asort($alpha);
foreach ($alpha as $key => $alph) {
    print $key . " - " . $alph . "\n";
}
print "This ksort we can see that the array is sorted based on the key value pairs\n";
ksort($alpha); // It sorts based on the keys of the array
foreach ($alpha as $key => $alph) {
    print $key . " - " . $alph . "\n";
}
print "This sort will not only change the values but the keys also change based on the values in ascending range\n";
sort($alpha);
foreach ($alpha as $key => $alph) {
    print $key . " - " . $alph . "\n";
}

print "there are other sorts as well, like rsort, arsort and krsort, these functions sort do reverse sorting that is descending order\n";
?>
