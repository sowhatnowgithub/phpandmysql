<?php
$dbusername = "root";
$dbpassword = "Jp05101974";
$dblocalhost = "localhost";
$dbname = "db1";


$Link = mysqli_connect($dblocalhost,$dbusername,$dbpassword,$dbname) OR die("connection failed"); 

$query = "show tables";
$result = mysqli_query($Link, $query);
$rows = [];
while ( $row = mysqli_fetch_assoc($result)){
	array_push($rows, $row);
};
echo var_dump($rows);
mysqli_close($Link);

?>
