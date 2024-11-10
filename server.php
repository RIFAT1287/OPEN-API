<?php
use OpenSwoole\Http\Server;
use OpenSwoole\Http\Request;
use OpenSwoole\Http\Response;

$server = new OpenSwoole\Http\Server("0.0.0.0");

$server->on("start", function (Server $server) {
    echo "OpenSwoole http server is started at http://127.0.0.1:9501\n";
});

$server->on("request", function (Request $request, Response $response) {
    $response->header("Content-Type", "application/json");
    
    if ($request->server['request_uri'] === '/balance') {
        $balanceData = [
            'balance' => 1000, // Example balance
            'currency' => 'USD'
        ];
        $response->end(json_encode($balanceData));
    } else {
        $response->end(json_encode(["message" => "Hello World"]));
    }
});

$server->start();
