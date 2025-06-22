<?php

$curlHandles = [];

$urls = [
	'https://example.com/1',
    'https://example.com/2',
	'https://example.com/1000'
];
$mh = curl_multi_init();
$mh_fiber = curl_multi_init();

$halfOfList = floor(count($urls)/2);
foreach($urls as $index=>$url) {
	$ch = curl_init($url);
	$curlHandles[] = $ch;
	$index>$halfOfList ? curl_multi_add_handle($mh_fiber, $ch) : curl_multi_add_handle($mh,$ch);
}

$fiber = new Fiber(function (CurlMultiHandle $mh){
	$still_running = null;
	do{
		curl_multi_exec($mh, $still_running);
		Fiber::suspend();
		echo "Aloha\n";
	} while($still_running);
});

$fiber->start($mh_fiber);
$still_running = null;
do {
	$status = curl_multi_exec($mh, $still_running);

} while($still_running);

do{
	$status_fiber = $fiber->resume();
} while(!$fiber->isTerminated());

foreach ($curlHandles as $index => $ch) {
    $index > $halfOfList ? curl_multi_remove_handle($mh_fiber, $ch) : curl_multi_remove_handle($mh, $ch);
}
curl_multi_close($mh);
curl_multi_close($mh_fiber);

