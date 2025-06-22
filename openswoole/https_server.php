<?php
$host = '127.0.0.1';
$port = 1234;
$path = './ssl/';
$htmlBody = <<<'HTML'
<!DOCTYPE html>

<body>
<form >
<input type="text"  name="text">Text
<button type="submit" onsubmit="submitHandle">💩</button>
<div class="message">
</div>

<script>
var endPoint = 'wss://127.0.0.1:9501';
const socket = new WebSocket(endPoint);
const form = document.querySelector('form');
const inputField = document.querySelector('input[name="text"]');
const messageBody = document.getElementsByClassName('message')[0];
socket.onopen = function(event){
	socket.send("Hi i am shit");
}
socket.onmessage = function(event) {
	messageBody.innerHTML += `<p>${event.data}</p>`;	
}
function sendMessage(socket,message){
	socket.send(message+"\n");
}

form.addEventListener('submit', (event)=>{
event.preventDefault();
	const text =inputField.value.trim();	
	sendMessage(socket, text);	
	inputField.value = "";
});
</script>
</form>
</body>
</html>
HTML;
$transport = 'tls';
$ssl = ['ssl'=>[
	'local_cert' => $path.'localhost.pem',
	'local_pk' => $path.'localhost-key.pem',
	'disable_compression'=>true,
	'verify_peer'=>false,
	'allow_self_signed'=>true,
]];

$ssl_context = stream_context_create($ssl);
$server = stream_socket_server($transport.'://'.$host.':'.$port,$errno, $errstr, STREAM_SERVER_BIND | STREAM_SERVER_LISTEN, $ssl_context);


if(!$server) ("Failed to setup the server\n");

while( $conn = stream_socket_accept($server) ){
	$request = fread($conn, 1024);
	echo $request.PHP_EOL;
	$responseBody = "Hello from custom PHP HTTPS server!";
	$responseBody .= $htmlBody;
    $response = "HTTP/1.1 200 OK\r\n";
    $response .= "Content-Type: text/html\r\n";
    $response .= "Content-Length: " . strlen($responseBody) . "\r\n";
    $response .= "Connection: close\r\n\r\n";
    $response .= $responseBody;
	
    fwrite($conn, $response);
    fclose($conn);
}
