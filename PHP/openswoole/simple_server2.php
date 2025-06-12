<?php

use OpenSwoole\Http\Server;
use OpenSwoole\Http\Request;
use OpenSwoole\Http\Response;

$core = OpenSwoole\Util::getCPUNum();

$ip = '127.0.0.1';
$port = 8080;
$server = new Server($ip,$port, OpenSwoole\Server::POOL_MODE);
$worker_num = $core*2;
$reactor_num = $core+2;
$task_worker_num = 1;
$server->set([
	"worker_num" => $worker_num,
	"reactor_num" => $reactor_num,
//	"task_worker_num"=>$task_worker_num
]);

class Start{
		public $ip;
		public $port;
		function __construct($ip,$port){
			$this->ip = $ip;
			$this->port = $port;
		}
		 static function callbackStart($server){
		echo	 "The callback has been Registered \n";

		}
	 function callbackRequest($request, $response){

			echo "Icoming request ... \n";
		$this->headerForRequest($response);
			$this->contentForRequest($response);
			
		}
		 function headerForRequest($response){
		//	$response->header('content-type','text/plain');
		}
		 function contentForRequest($response){
			$response->end('<h1>Hello From Server</h1>');
		}

	}

$callback = new Start($ip,$port);
$server->on("WorkerStart", function($server, $workerId)
{
	    echo "Worker Started: $workerId\n";
});
$server->on("Start", array($callback, 'callbackStart'));
$server->on("Request", array($callback, "callbackRequest"));
$server->on("Shutdown", function($server, $workerId)
{
	    echo "Server shutting down...\n";
});
$server->on("WorkerStop", function($server, $workerId)
{
	    echo "Worker Stopped: $workerId\n";
});

$server->start();


