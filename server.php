<?php
use OpenSwoole\Http\Server;
use OpenSwoole\Http\Request;
use OpenSwoole\Http\Response;

$port = getenv("PORT") ?: 9501;  

$server = new OpenSwoole\HTTP\Server("0.0.0.0", $port);

$server->on("request", function ($request, $response) {
    $response->end("Hello from OpenSwoole on Render!");
});

$server->start();
