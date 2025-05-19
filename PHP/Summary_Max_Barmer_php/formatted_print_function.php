<?php
$a = "sai";
$b = 23.2;
$c = 21.2;

printf("The first value is %.2f and second is %d. There are no more answers.",$b,$c);
print "printf() - this is a formatted print statement <br>";
print "<h3>Type Specifiers</h3>";
print "<p><i>e-notation</i> - 123.222*10<sup>3</sup> can be written as 123.222e+3, for the php language</p>";
print "<p>123.234*10<sup>-3</sup> can be represented using <i>e-notation</i> is 123.234e-3</p>";

print "<table border=2 bgcolor=\"pink\">";
print "<tr>
<th>Value</th>
<th>format specifier</th>
<th>output</th>
</tr>
";
$values = array(123,123.456,1.23456e+2,123,123.456,1.23456e+2,123,123.456,1.23456e+2);
$formats = array("%d","%d","%d","%e","%e","%e","%.6f","%f","%f");
$outputs = array("123","123","123","1.230000e+2","1.234560e+2","1.234560e+2","123.000000","123.456000","123.456000");
foreach($values as $num => $value){
    print "<tr>";
    print "<td>$value</td>";
    print "<td>".$formats[$num]."</td>";
    print "<td>".$outputs[$num]."</td>";
    print "</tr>";

}
print "</table>";

print "<h3>The <i>sign</i> Specifier </h3>";
print "%+e - the plus sign here will ouput the sign of the integer <br>";
print "<pre>
\$number = 123.34;
printf(\"%+e\",\$number);
</pre>
";
$a = 123.34;
printf("This will output: %+e",$a);
// about Precisioin
print "<h3><i>Precision</i> Specifiers</h3>";
print "%6f, the number 6 here is used for precision of the output<br>";
// padding
print "<h3><i>Padding</i> Strings</h3>";
print "%10s - this will create total of 10 characters filled with space to fill the extra characters at the begining <br>";
print "%-10s - this will create total of  characters filled with space to fill the extra characters at the end <br> ";
print "$'*10s - this is custom padding with special characters using '* at the begining <br>";
$str = "Tuesday";
printf("The string($str) after padding is with ^ is %'^-15s. we use %%'^-15s",$str);
// Outputing a Percent sign
print "<h3>Outputting a <i>Percent</i> Sign</h3>";
print "By using double percentage %% we can get percentages in the outputs in the printf formatted function<br>";
?>