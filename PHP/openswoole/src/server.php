<?php

// building a concurrency 

Use OpenSwoole\Server;

$server  = new Server('127.0.0.1',9501);

$server->on('Start',function(){
	go(function(){
		echo "Started the server at 127.0.0.1:9501\n";
	});
});

$server->on('Connect', function($server, $fd){
	echo "Client Connected\n";
	$server->send($fd,"Connected to server Successfully \n" );
});

$server->on('Receive', function ($server,$fd,$reactor_id, $data){
	$server->send($fd, "Server Says: {$data}");
});

$server->on('Close', function($server, $fd){
	echo "Client Disconnected\n";
});
$server->start();


