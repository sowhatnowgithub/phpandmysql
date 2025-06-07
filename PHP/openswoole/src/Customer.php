<?php
 namespace Store;
class Customer {
	public $name;
	function __construct($name){
		$this->name = $name;
	}
	public function __set($name,$value){
		$this->name = $value;
	}
	public	function __get($name){
		return $this->name;
	}
}	

$a = new Customer("sai");
