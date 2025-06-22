
<?php
include "index.php";
echo "<br>-----------------------<br>";
echo "<br>-------Results---------<br>";
echo "<br>-----------------------<br>";
foreach ($_GET as $key => $value){
	$GLOBALS[$key] = strtolower(trim($value));
	echo "$key : $GLOBALS[$key] <br>";
} 
echo "Quering the Mysql Database";
@ $db = new mysqli("localhost", "bookorama", "bookorama123","db_book");
$result = $db->query("show tables;");
$ref = new ReflectionClass('mysqli');
$methods = $ref->getMethods();
$properties = $ref->getProperties();

echo "<br><br>  The methods for querry method of mysqli class<br><br>";

print_r(get_class_methods($result));
$row = $result->fetch_assoc();
echo "<br><br>";
var_dump($row);
echo $row["book_reviews"];
echo "<br><br>";


echo "<br><br>";
echo "<br>METHODS";
foreach($methods as $method) {
	echo "<br>".$method->getName();
}
echo "<br>PROPERTIES";
foreach($properties as $property) {
	echo "<br>".$property->getName();
}
?>
