<html>
<body>
<b>Enter Your Details Here</b>
<form name="form1" action="dest1.php">
<label for="forename">Forename</label>
<input type="text" name="forename" value="Jagarlamudi" required>

<label for="lastname">Lastname</label>
<input type="text" name="surname" required> <br> <br>
<label for="address">Address</label>
<textarea name="address" rows=2 column=15 required>
</textarea>
<br><br>
Age Group :
Under 20
<input type="radio" name="agegroup" value="under20">
20 to 40
<input type="radio" name="agegroup" value="20to40">
40 to 60
<input type="radio" name="agegroup" value="40to60" disabled>
60+
<input type="radio" name="agegroup" value="60plus" disabled><br>
<br> Nationality
<select name="nationality">
<option value="British">British</option>
<option value="American">American</option>
<option value="Canadian">Canadian</option>
<option value="Indian" selected>Indian</option>
<option value="Nepalese">Nepalese</option>
</select> <br> <br> I agree to the terms and conditions
<input type="checkbox" name="termsandcondn" value="termsAccepted"><br><br>
<input type="submit" name="Submit"> <input type="reset" name="Reset">
<br><br>
Press the Submit button to send us your form.
</form>


<form name="form2" action="dest1.php" method="POST" enctype="multipart/form-data">
File input
<input type="file" name="file"> <br>
<input type="submit" name="submit2" value="Submit2">
</form>
</body>
</html>


<?php
if(!empty($_POST)) {
	echo "<p> There is a varible passed by the POST method </p>";
	if(!empty($_FILES)) {
		echo "SOme file is here";

	echo var_dump($_FILES);
	
	}
	else echo "No file here";
}
else {
	foreach( $_GET as $key => $value ) {
		if($key == "address") $value = str_replace("\r\n","<br>", $value);
		echo "$key as $value <br>";
	}


}
?>

