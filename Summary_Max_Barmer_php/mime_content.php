<html>
<body>
<form name="Form" method="POST" enctype="multipart/form-data">
Input File
<input type="file" name="fileName"> <br>
<input type="submit" name="Submit" value="Submitted">
</form>
</body>
</html>

<?php

if(!empty($_FILES)) {
	$fileLocName = $_FILES['fileName']['tmp_name'];
	if(move_uploaded_file($fileLocName, "sup/".$_FILES["fileName"]["name"])) print "The File has been succesfully uploaded<br>";

}

?>
