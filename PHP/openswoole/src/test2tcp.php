<?php

OpenSwoole\Coroutine::run(function(){
	for($i =0 ;$i< 1000;$i++){

		go(function () use ($i){
		$client = stream_socket_client('tcp://127.0.0.1:9501');
		if(!$client) 
				die( "Client Connection Failed\n");
			do {
				$pkt = stream_socket_recvfrom($client,1,0,$peer);
				echo "$pkt";
			}	while($pkt!=="\n");
			stream_socket_sendto($client, "Hi hello from client\n",0,$peer);
			do {
				$pkt = stream_socket_recvfrom($client, 1,0,$peer);
				echo "$pkt";
			} while($pkt !== "\n");
			fclose($client);	
		});
	}
});
