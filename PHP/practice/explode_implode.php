<?php
$s = "malcolm,johnson,male,1997,associate,2012,married,2,melbourne";
$newarray = explode(",",$s); // this tells the string to breakdown at comma
foreach ($newarray as $array) print $array."\n"; 

$updatearray = implode(" - ",$newarray);
print $updatearray."\n";
?>