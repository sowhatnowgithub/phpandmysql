<?php
$convert = array("chien"=>"dog", "homme"=>"man","cuisine"=>"kitchen","femme"=>"women","liver"=>"book");
echo "In associative array, the key-value pairs will be sorted by value (alphabetically by English)\n";
asort($convert);
print "This dictionary is based on english alphabet order\n";
foreach($convert as $french => $english){
    print $french." - ".$english."\n";
}
ksort($convert);
print "This dictionary is based on french alphabetical order\n";
foreach($convert as $french => $english){
    print $french." - ".$english."\n";
}

$names = array("frances", "john", "gavin", "max", "mary", "frances", "bryony",
"gavin","max","dawn","john","frances","mary","max","frances","mary","max","frances","bryony","frances"
);
$namecount = array();
foreach($names as $newnames) {
    $namecount[$newnames] = 0;
}
foreach($names as $newnames) {
    $namecount[$newnames]++;
}
print "\n\n";
foreach($namecount as $name => $count) print $name." - ".$count."\n";

echo "\n\nAfter ksort\n\n";
ksort($namecount);
foreach($namecount as $name => $count){
    echo $name." - ".$count."\n";
}

echo "\n\n after asort \n\n";
asort($namecount);
foreach($namecount as $name => $count){
    print $name." - ".$count."\n";
}

echo "\n\nUsing associative arrays with arrays\n\n";
$monthnames = array("January","Febraury","March","April","May","June","July","August","September","November","October","December");
$month=3;
print $monthnames[$month];
?>