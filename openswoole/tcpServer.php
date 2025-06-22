<?php

use OpenSwoole\Server as Server;

$ip = '127.0.0.1';
$port = 9501;

$tcpServer = new Server($ip, $port);

$tcpServer->on("Start", function(){
	echo "The tcpSever Started at 127.0.0.1 at 9501\n";
});

$tcpServer->on("Connect", function ($tcpServer, $fd){
	echo "Client: Connected, File Descriptor Id: $fd \n";
	$tcpServer->send($fd,"Hi, Connection Made \n");
});
$tcpServer->on('Receive', function ($tcpServer, $fd, $refactor_id, $data){
	$tcpServer->send($fd,"Server: {$data}");
});
$tcpServer->on('Close', function($tcpServer, $fd){
	echo "Client: Closed Fd ID:$fd\n";
});



$tcpServer->start();

