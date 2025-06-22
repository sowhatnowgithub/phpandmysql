<?php
class A extends Exception{
	const message = "I like like";
	public function __toString():string {
		return "Hi";
	}
}
try {
	//throw new Exception ("Something that was supposed to happen", 42);
	throw new A;

}
catch (A $e) {
	echo $e::message;
	echo $e;
//	echo "Exception " . $e->getCode() .": ". $e->getMessage() . "\n in ";
//	echo $e->getFile() . " in line " . $e->getLine() ."\n";
}
?>
