<?php
print "You are accesing the secretes contained with in file1.php<br />";
$secret="I love turtles\n";
$secret1="I love birds";

//include and require are two import features offered by php
print "include and require differs in one action, if the included file is not present this gives warning and remaing code is executed, if require is used, the program terminates itself";

include "strawhats.php";
require "strawhat.php";

?>