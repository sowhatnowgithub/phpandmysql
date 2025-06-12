<?php

use OpenSwoole\WebSocket\Server;
use OpenSwoole\http\Request;
use OpenSwoole\WebSocket\Frame;

$host = '0.0.0.0';
$port = 9501;

$table = new OpenSwoole\Table(100);
$table->column('fd', OpenSwoole\Table::TYPE_INT);

$table->create();
$server = new Server($host, $port);


$server->on('Start', function($server) use($port){
	echo "Server Started at $port\n";
});

$server->on('Open', function(Server $server, Request $request) use($table){
	echo "Server: handshake was success {$request->fd}\n";
	$fd = $request->fd;
	$table->set((string)$fd, ['fd'=>$fd]);
});

$server->on('Message',function($server, $frame)use($table) {
	$data = json_decode($frame->data, true);
	//var_dump($data);
	if($data['is_message']) {
		foreach($table as $row){
			$server->push($row['fd'], json_encode([
			'thrdId' => $data['thrdId'],
			'userName' => $data['userName'],
			'message' => $data['message'],
			'messageDate' => date('d/m/Y h:i:s A'),
			'is_thrd' => false
			]));
		}
	}else {
		$thrdId = "thrdId_".rand(100,100000);
		foreach($table as $row) {

			$server->push($row['fd'], json_encode(
		[
			'divThrdId'=> $thrdId,
			'divClassName' => $data['thrd_title'],
			'divCreatedBy' => $data['thrd_user'],
			'divCreatedAt' => date('d/m/Y h:i:s A'),
			'is_thrd' => true
		]
			));
		}	
	} 
});

$server->on('Close', function($server, $fd) use($table){
	echo "Client {$fd} closed\n";
	$table->del((string)$fd);
});
/* this is under production, for better resource utilizaiton
$server->tick(30000, function($server, $request){
	foreach($request->connections as )
})
 */
/*
		We can use redis for horizontal scaling
 */

/*
 * Develop persistent data
 * */
/*
 *Have to add feature, like count of the connected users, and thread-user active users, for sorting the thrds in order of active users
 * */
$server->start();
