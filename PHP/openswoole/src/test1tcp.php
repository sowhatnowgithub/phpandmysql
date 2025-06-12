<?php
	$client = stream_socket_client("tcp://127.0.0.1:9500");
	if(!$client) die("Client connection failed");
	do {
		$pkt = stream_socket_recvfrom($client, 1,0,$peer);
		echo "$pkt";
	} while($pkt !== "\n");
	stream_socket_sendto($client,"Hi from the client\n" ,0,$peer);
	// echo "Sent to the client\n";
	do {
		$pkt = stream_socket_recvfrom($client, 1,0,$peer);
		echo "$pkt";
	} while ($pkt!=="\n");
	fclose($client);
?>
