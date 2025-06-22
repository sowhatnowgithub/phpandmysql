<?php

use OpenSwoole\Coroutine\Socket;

OpenSwoole\Coroutine::run(function(){
	$serverSocket = new Socket(AF_INET, SOCK_STREAM,0);
	$serverSocket->bind('127.0.0.1',9501);
	$serverSocket->listen(128);
	echo "Server Started at 127.0.0.1:9501\n";
	$fd = 1;
	while($fd){
		$clientSocket = $serverSocket->accept();

		OpenSwoole\Coroutine::create(function() use ($fd,$clientSocket){
			//echo "Client Connected : $fd\n";
			$clientSocket->send("The Local Time is ".date('n\j\Y g:i a')."\n");
			$data = $clientSocket->recv();
			$clientSocket->send("Server Says: ". $data);
			$clientSocket->close();
		//	echo "Cliend Disconnected: $fd\n";
		});

			$fd++;
	}
});

?>
