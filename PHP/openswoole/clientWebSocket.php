<?php

$host = '127.0.0.1';
$port = 9501;

$socket = socket_create(AF_INET, SOCK_STREAM,SOL_TCP);
socket_connect($socket, $host, $port);
if(!$socket) die('Failed');
$response = socket_read($socket,1024);
echo $response;

