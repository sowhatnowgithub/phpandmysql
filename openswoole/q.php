<?php

for($i=0;$i < 100; $i++){
OpenSwoole\Coroutine::run(function(){
		for($a = 0; $a < 100; $a++){
		go(function() use ($a){
			$client = stream_socket_client("tcp://127.0.0.1:9501",$errno,$errstr,1);

			if(!$client) echo "Error: $errstr ($errno)\n";
			else {
				$response = fgets($client, 1024);
				//echo "Response: $response\n";
				fwrite($client, "Hi From Client\n");
				$response = fgets($client, 1024);
				//echo "Server Response: $response\n";
				fclose($client);
			}
		});
	}
});
}
echo "10000 requests took";
