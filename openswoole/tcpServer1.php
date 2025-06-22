<?php
$server  = stream_socket_server("tcp://127.0.0.1:9501",$errno, $errstr);

echo "The Server has started at 127.0.0.1:9501\n";
if(!$server) echo "Error: $errstr ($errno)\n";
else {
	while($conn = stream_socket_accept($server)) {
		echo "Client Connected\n";
		fwrite($conn, 'The Local time is'.date('n/j/Y g:i a')."\n");
		$response = fgets($conn);
		fwrite($conn, 'Server says: '.$response);
		fclose($conn);
		echo "Client Disconnected\n";
		
	}
}

