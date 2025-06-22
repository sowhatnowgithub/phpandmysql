<?php

$content =  <<<HIT
<h1>Book O Rama Catalog Search</h1>
<form action="bookorama.php">
<select name="searchtype">
<option value="author">Author</value>
<option value="title">Title</value>
<option value="isbn">ISBN</value>
</select>
<input type="search" name="searchterm"/>
</form>
HIT ;

echo $content;
?>


<?php
try {
 $searchtype = htmlspecialchars($_GET["searchtype"]);
$searchterm = trim(htmlspecialchars($_GET["searchterm"]));
} catch (Exception $e) { }
if(!$searchtype && !$searchterm) {
	echo "<p>you have not enetered the fields </p>";
	exit;
}

@ $db = new mysqli('localhost', 'bookorama', 'bookorama123','db_book');

if(mysqli_connect_errno()) {
	echo "Error: could not connect";
	exit;
}

$query = "SELECT * FROM books where $searchtype like '%$searchterm%'";
/* We can use prepared statements to create queries
 * with variables
 * */

$query_prepared = "select * from books where ? like ?";

$stmt = $db->prepare($query_prepared);
$searchterm = "'%".$searchterm."%'";
$stmt->bind_param("ss",$searchtype,$searchterm); // here "ss" represents string string 
$stmt->bind_result($isbn, $author, $title,$price);
// every time a call like $stmt->fetch(), they column values are stored into these
//$stmt->execute();

$result = $db->query($query);

$num_results = $result->num_rows;

echo "<p> Number of books found: $num_results </p>";
for ($i=0; $i <$num_results; $i++) {
$row = $result->fetch_assoc();
echo "<p><strong>".($i+1).". Title: ";
echo htmlspecialchars(stripslashes($row['title']));
echo "</strong><br />Author: ";
echo stripslashes($row['author']);
echo "<br />ISBN: ";
echo stripslashes($row['isbn']);
echo "<br />Price: ";
echo stripslashes($row['price']);
echo "</p>";
}
$result->free();

$db->close();
