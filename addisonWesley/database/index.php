<!DOCTYPE html>
<head>
	<title>Mysql</title>
</head>
<body>
	<form action="result.php">
		<select name="searchItem">
			<option value="title">Title</option>
			<option value="author">Author</option>
			<option value="ISBN">ISBN</option>
		</select>
		<input type="text" name="searchterm" placeholder="Enter the search term">
		<button type="submit" name="submit" value="submitted">Submit</button>
	</form>
</body>
</html>
