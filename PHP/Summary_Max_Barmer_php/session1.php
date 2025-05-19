<?php
session_start();
print "<b>Information about Session Variables</b>";
$_SESSION['staffname'] = "John Smith";
$_SESSION['staffage'] = 47;
$_SESSION['stafftitle'] = "Lecturer";

if(!empty($_SESSION)) foreach($_SESSION as $var => $val) print $var."=>".$val."<br>";

print "Click <a href=\"session2.php\" target=\"_blank\" >To Move To session2.php </a>"; 
?>
