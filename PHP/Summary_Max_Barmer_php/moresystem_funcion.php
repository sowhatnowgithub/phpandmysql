<?php
$str = "The time has come, the Walrus said, to talk of many things";
$str1 = wordwrap($str, 15, "<br>");
$str2 = wordwrap($str, 20, "<br>");
$str3 = wordwrap($str, 25, "<br>");
$str4 = wordwrap($str, 30, "<br>");
print "<p>The wordwrap() function in php, is used to break the string after a certain length has reached, it takes four  parameters one is string, width, break, and cut, now break is the string that will be added when the width is reached and cut means if this is true just check in google.com </p>";
print "<table border=2, cellspacing=3,bgcolor=\"silver\">";
print "<tr>";
print "<td>$str1</td>";
print "<td>$str2</td>";
print "<td>$str3</td>";
print "<td>$str4</td>";
print "</tr>";
print "</table>";

print "<h3>rand function</h3>";
$aloha = "abcdefghijklmnopqrstuvwxyz";
$possibility =
    substr($aloha, rand(0, 25), 1) .
    substr($aloha, rand(0, 25), 1) .
    substr($aloha, rand(0, 25), 1) .
    substr($aloha, rand(0, 25), 1);
print "substr($aloha, rand(0,25),1).substr($aloha,rand(0,25),1).substr($aloha,rand(0,25),1).substr($aloha,rand(0,25),1) <br>";
print "<p>The above line will output the <q> $possibility </q> <br></p>";
print "<h3>max() and min() function</h3>";
print "<p>array(23,2,1,-234,0.3)</p>";
print "<p>max(array(23,2,1,-234,0.3)) and min(array(23,2,1,-234,0.3))<p>";
print "<p>The above will give the output - max is " .
    max([23, 2, 1, -234, 0.3]) .
    " and min is " .
    min([23, 2, 1, -234, 0.3]) .
    "</p>";
print "<h3>date function</h3>";
print "<p>date(\"d\") - this will give the date like 25 </p> - " . date("d");
print "<p>date(\"F\") - this will give the name of the month </p> - " .
    date("F");
print "<p>date(\"Y\") - this will give the year </p> - " . date("Y");
print "<p>date(\"l\") - this will give the weekday </p> - " . date("l");
print "<p>date(\"d F Y\") - date format day month year </p> -" . date("d F Y");
print "<p>date(\"l F jS\") - jS will give the date with the suffix </p> - " .
    date("l F jS");
print "<p>date(\"g:i a .... D M j Y\") - time and date " .
    date("g:i a .... D M j Y");
print "<p>date(\"ymd\") - this is a common way to store date - " . date("ymd");
print "<p>date(\"L\") - this will teel us whether the year is leap year or not - one means leap year " .
    date("L");
switch (date("L")) {
    case 1:
        print "<p>Leap Year </p>";
        break;
    default:
        print "<p>Not Leap Year </p>";
        break;
}

print "<p><i>Common ways to use date function</i></p>";
print "
<table border=2 cellspacing=5 cellpadding=4 bgcolor=\"pink\" margin=150>
<tr>
<th>S.No</th>
<th>Character</th>
<th>Description</th>
</tr> ";
$chars = [
    "d",
    "D",
    "l(lower case L)",
    "L",
    "jS",
    "S",
    "y",
    "Y",
    "m",
    "M",
    "F",
    "g",
    "i",
    "s",
    "a",
];
$desc = [
    "day of the month - two digits ",
    "Mon through Sat - weekday",
    "weekday entire name",
    "Leap year, returns 1 if leap year",
    "Day(two digit) with the suffix",
    "Suffix",
    "year in two-digits",
    "year in four-digits",
    "01 to 12 month",
    "Jan through Dec month",
    "Entire Month name",
    "hours",
    "minutes",
    "seconds",
    "AM or PM",
];
foreach ($chars as $num => $char) {
    print "<tr>";
    print "<td>" . ($num + 1) . "</td>";
    print "<td>" . $char . "</td>";
    print "<td>" . $desc[$num] . "</td>";
    print "</tr>";
}
print "
</table>
";

print "<h3>The header function</h3>";
print "<p>The header funcition is used to send a HTTP header to the web browser, for example </p>";
print "header(\"HTTP/1.0 404 Not Found\")";
print "<p>The above function maynot be that used, but the following is very well used</p>";
print "header(\"Location:http://www.newsssite.com\") <br> -- this is used to redirect the webpage to a new page <br>";

print "<h3>the <i>die</i> function</h3>";
print "<p>die(\"Unable to connect to database\")</p> - this function will output the statement and execution of the script will stop</p> ";

print "<h3>The <i>echo</i> funcition </h3>";
print "echo(\"The answer is yes\")<br>";
echo "The entire difference between echo and print is very slight <br>";

echo "<h3>The <i>phpinfo</i> function </h3>";
echo "<p>This produces a long script of configuration of the php</p>";
phpinfo();

?>
