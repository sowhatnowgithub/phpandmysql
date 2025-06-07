<?php

class Math {
	const pi=3.141;
	static function square($number){
	return $number*$number; 
	}
}

echo "Math::pi :".Math::pi.PHP_EOL;
echo  "Math::square(8) :".Math::square(8).PHP_EOL;

?>
