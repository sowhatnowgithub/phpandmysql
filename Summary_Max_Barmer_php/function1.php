<?php

// echo "hello";

function name($thing) {
	return match ($thing) {
		"sai" => "The name is sai $thing",
		"rani" => "The name is rani $thing",
		default => "the name is $thing",
	};
}

echo name("sai")."\n";
echo name("so")."\n";

$text = 'Bienvenue chez nous';

function mane($text) {
	return match (true) {
		str_contains( $text, 'Welcome' ) => "en",
	   str_contains($text, 'Bienvenue' ) => "fr",	
	   default => "en",
	};
} 

echo mane($text)."\n";

?>
