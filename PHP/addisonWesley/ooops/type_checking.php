<?php
interface I {
function type_check();	
}

class B implements I {
	function type_check( B $classname) {
		echo "You can do type_checking by  passing it directly to function";;
	}
}

$b = new B;
echo ($b instanceof B) ;
?>
