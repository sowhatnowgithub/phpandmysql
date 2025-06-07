<?php

$ch = curl_init();
$url = "https://www.myntra.com/tshirts/powerlook/powerlook-men-regular-fit-self-design-round-neck-t-shirt/32442559/buy";
curl_setopt($ch,  CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');

$output = curl_exec($ch);

curl_close($ch);
echo $output;
