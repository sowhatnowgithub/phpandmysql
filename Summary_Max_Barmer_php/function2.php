<?php

$a = 100;
$b = 50;

function globalTest() {
	global $a,$b,$c;
	$a = 200;
	$b = 150;
	$c = 30;
}

echo $a."\n";
globalTest();
echo $a."\n".$b."\n".$c."\n";


echo "Passing By Reference \n";

$adr = &$a;
echo $adr."\n";

function passByRef(&$a, &$b1) {

	global $a1;
	$a1 = $a;

	$b1 = 40;
	$b2 = &$b1;
	$b2 = 30;
}
echo "b$b\n";
passByRef($a,$b);
echo $a1."\n";
echo "b1 - ".$b."\n";
?>
