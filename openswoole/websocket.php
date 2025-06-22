<?php

use OpenSwoole\WebSocket\Server;
use OpenSwoole\Http\Request;
use OpenSwoole\Http\Frame;

$host = '127.0.0.1';
$port = 1234;
$server = new Server($host,$port);

$server->on('Start', function($server)use($port) {
	echo "The web socket is listening on localhost at port $port \n";
});

$server->on('Open',function($server, $request){
	echo "Server: handshake got it by {$request->fd}\n";
});
$server->on('Message',function($server,Frame $frame){
		echo "received message {$frame->data}";
		$server->push($frame->fd, "HI, {$frame->data}");
});
$server->start();
