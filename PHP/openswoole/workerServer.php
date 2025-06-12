<?php

use OpenSwoole\Http\Server;

$host = '127.0.0.1';
$port = 9501;
$core = OpenSwoole\Util::getCPUNum();
	$server = new Server($host, $port);
$i=0;
$setting = [
	"worker_num"=>$core*2,
//	"task_worker_num"=>$core*2,
	"reactor_num" => $core+2,
	"enable_coroutine"=>true
];
$server->set($setting);

$server->on('WorkerStart',function($server, $workerId){
	echo "The worker id is $workerId and started with ".getmypid()."\n";
});
$server->on('Start',function($server){	
	echo "Manager PID : ".$server->manager_pid."\n";
	echo "Master PID : ".$server->master_pid."\n";
});
	$server->on("Request",function( $request, $response) use(&$i, $server){
	$response->header('content-type','text/html');
	$response->end("<h1>Hi I guess</h1>");
	$i++;
//	OpenSwoole\Coroutine::sleep(1);
	echo "Bro Something happened with PID".getmypid()."\n";
	echo "$i\n";
	//if($i >= 3) $server->shutdown();
	
});
$server->on('Shutdown',function($server){
	echo "I am somwhow shutting this down ".getmypid()."\n";	
});
$server->start();
