<?php

use OpenSwoole\Http\Server as Server;
use OpenSwoole\Http\Request as Request;
use OpenSwoole\Http\Response as Response;

$server = new Server("127.0.0.1",9501);
$server->on ("Start", function(Server $server){
	echo "OpenSwoole http server is started at http://127.0.01:9501\n";
});

$server->on("Request",function(Request $request, Response $response){
	$response->header("Content-Type","text/plain");
	$response->send("<h1>Hello World</h1>");
	$response->end("Hello World");
});

$server->start();
