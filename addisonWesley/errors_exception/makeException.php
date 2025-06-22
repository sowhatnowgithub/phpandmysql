<?php

class myException {
	
	public function __construct(string $message="",int $code = 0) {
		if(func_num_args()) $this->message = $message;
		$this->code = $code;
		$this->file = __FILE__;
		$this->line = __LINE__;
		$this->trace = debug_backtrace();
		$this->string = self::StringFormat($this);
	}
	protected $message = "Unkown Exce[topm" ;
	protected $code = 0;
	protected $file;
	protected $line;
	private $trace;
	private $string;

	final function getMessage() {
		return $this->message;
	}
	final function getCode() {
		return $this->code;
	}
	final function getFile() {
		return $this->file;
	}
	final function getLine() {
		return $this->line;
	}
	final function getTrace() {
		return $this->trace;
	}
	final function getTraceAsString() {
		return self::TraceFormat($this);
	}
	final function __toString() {
		return $this->string; 
	}
	static private function StringFormat(myException $exception) {
	return $exception->getMessage();
	}
		static private function TraceFormat(myException $exception) {return "shit";}
	
}

$a = new myException;
echo $a->getCode().$a->getFile().$a->getLine();
?>
