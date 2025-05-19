<?php

$year = date("Y");
$month = date("F");
$day = date("d");

// echo "$year $month $day \n";
function selectDateRange( $name, $start, $end, $default ) {
	print '<select name="'.$name.'"'.">\n";
	for($i = $start; $i <= $end ; $i++) {
	print '<option value="'.$i.'"';
	if($i == $default) print 'selected="selected"';
	print ">";
	print $i;
	print '</option>'."\n";
	}
	print '</select>'.PHP_EOL;
}
$months = array(
	1 => "January", 2 => "February", 3 => "March", 4 => "April", 5 => "May", 6 => "June", 7 => "July", 8 => "August", 9 => "September", 10 => "October", 11 => "November", 12 => "December",
);
function selectMonth($name, $months,$default) {
	print '<select name="'.$name.'"'.">"."\n"; 
	foreach( $months as $key => $value) {
		print '<option name="'.$key.'"';
		if($value === $default) print 'selected="selected"';
		print '>'.$value;
		print "</option>"."\n";

	}	
	print "</select>\n";
}
print '<form action="action.php" method="GET">';
print "<p>Date Of Birth :</p> ";
selectDateRange("day", 1,31, $day );
selectMonth("month",$months, $month);
selectDateRange("year", 1950,2025, $year );
print "\n<br> <br>".'<input value="submit" type="submit"></input> <br>';
print '</form>';
?>
