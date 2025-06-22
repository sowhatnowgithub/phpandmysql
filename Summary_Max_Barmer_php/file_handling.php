<?php
// Its obvious that the files that the browser renders is all files stored on an external server

$fp = fopen("sup/file.txt", "a"); // remember we cannot open the file in both read and write one mode only, and fwrite will act according to the mode
fwrite($fp, "THis is a good language" . PHP_EOL);
fclose($fp);
$fp = fopen("sup/file.txt", "r");
$s = fread($fp, filesize("sup/file.txt")); // this means that i can pass an integer to get the number of characters
fclose($fp);

$fp = fopen("sup/file.txt", "a");
echo "A much more good way to print a string to a file, is using fprintf()";
$a = 20;
$b = "sai";
fprintf($fp, "I am %d and my nickname is %s" . PHP_EOL, $a, $b);
fclose($fp);

echo "<p>A very good function in php or powerful one is <q>file</q></p>";
print "<p>The uniqueness of this file is that it will read an line from the file and stores as an element in an array</p>";
$arrs = file("sup/file.txt");
$fp = fopen("sup/file1.txt", "w");
foreach ($arrs as $index => $arr) {
    fwrite($fp, $arr);
}
fclose($fp);

echo "<h2>Using the Explode and Implode Functions</h2>";

$arrs = file("sup/file2.txt");
echo "<p>implode takes two argument glue and pieces, glue is the string which will be attach the individual array elemetns and pieces are the elements of the array </p>";
echo "<p>explode takes three argument, delimeter, string, limit, limit is the optional if you specify it you can, it takes an integer value and this tells how many times we should break the string</p> ";
$fp = fopen("sup/file3.txt", "a");
foreach ($arrs as $arr) {
    $new = explode(",", $arr);
    $newRecord = $new[0] . " " . $new[1] . "," . $arr;
    fwrite($fp, $newRecord);
    empty($new);
}

echo "<h2>File and Directoruy Protections</h2>";
echo "<p>The files have three access mode, read or write and read/write, and execute and combos of these</p>";
echo "<pre>

These are called protection mode, to prevent access to others:-

 0: nothing at all
 1: execute
 2: write
 3: 2 + 1, i.e. write and execute
 4: read
 5: 4 + 1, i.e. read and execute
 6: 4 + 2, i.e. read and write
 7: 4 + 2 + 1, i.e. read, write and execute (everything)

Each file has digits like 0777, the first three defines what the root, group, user can do with the file, the last one is most important, so we have to make sure the permissions are good
</pre>";

?>
