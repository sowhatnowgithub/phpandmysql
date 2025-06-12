<?php

use OpenSwoole\WebSocket\Server;
use OpenSwoole\http\Request;
use OpenSwoole\WebSocket\Frame;

$host = '127.0.0.1';
$port = 9501;

$table = new OpenSwoole\Table(100);
$table->column('fd', OpenSwoole\Table::TYPE_INT);
$table->create();
$server = new Server($host, $port);


$server->on('Start', function($server){
	echo "Server Started \n";
});

$server->on('Open', function(Server $server, Request $request) use($table){
	echo "Server: handshake was success {$request->fd}\n";
	$fd = $request->fd;
	$table->set((string)$fd, ['fd'=>$fd]);
});

$server->on('Message',function($server, $frame)use($table) {
	foreach($table as $row)
	$server->push($row['fd'], "User {$frame->fd}:{$frame->data}");
});
$server->on('Request', function($request, $response){
	$response->header('content-type','text/html');
	$response->end("<h1>hell</h1>");

});
$server->on('Close', function($server, $fd) use($table){
	echo "Client {$fd} closed\n";
	$table->del((string)$fd);
});

$server->start();
