<?php

//key in the foreach is the index of the array-value, not the increasing of a number 1
$days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
print "Total days in a given week is ".count($days)."\n";
foreach($days as $a => $day ){ // This is like the index, and $a is called key, and $day is the value 
    print $a." - ".$day."\n";
}
for($d=0;$d<10;$d++){
    $integers[$d]=$d*35;
}
print "\n\n";

foreach($integers as $num => $integer ){
    print $num." - ".$integer."\n";
}
print "\n\n";

$months=array("January","Febraury","March","April","May","June","July","August","September","October","November","December");
foreach($months as $key => $month){
    print ($key+1)." - ".$month."\n";
}
print "\n\n";

?>