<?php

echo <<<'HTML'
<html>
	<h4>Multiple Select</h4>
	<form>
	<select name="mulSel[]" size=4 multiple>
	<option value="doc"> Doctor</option>
	<option value="eng">Engineer</option>
	<option value="law">Lawyer</option>
	<option value="bank">Bank</option>
	<option value="mus">Musician</option>
	</select>
	<input type="submit" value="submit"></input>
	</form>
</html>
HTML;

$country_info = file("countryNames.txt");
foreach ($country_info as $key => $country_details) {
$country_info_single= explode('	',$country_details);
$country[$key] = trim($country_info_single[0] ?? '');
$country_alpha_code[$key]  = trim($country_info_single[1] ?? '');
$country_code[$key] = trim($country_info_single[3] ?? '');
// echo  var_dump($country);
}

function selectCountry($name,$country, $countryCode, $default) {
	print '<select name="'.$name.'size=5>';
	foreach ($country as $key => $value) {
		print '<option value="'.$countryCode[$key].'"';
		if($value == $default) print 'selected';
		print '>';
		print $value."($countryCode[$key])";
		print '</option>';
	}
	print "</select>";
}

selectCountry("country", $country, $country_code,"India");
?>
