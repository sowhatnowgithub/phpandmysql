<?php
class classname {
	public $attribute;
public	function __get ($name) {
		return $this->$name;
	}
public	function __set ($name, $value) {
		$this->$name = $value;
		echo "i anm here";
		try {
			throw new Exception("Hello",4);
		}
		catch (Exception $e) {
			echo $e->getLine();
		}
	}
}

$a = new classname();
$a->attribute = "hello";

class operations {
	private function operation1() {
		echo "private is called";
	}
	public function operation2() {
		echo "public is called";
	}
	protected function operation3() {
		echo "protected is called";
	}

}

class ops extends operations {
	public function __construct (){
	$this->operation3();
	}	

}

$b = new ops;

