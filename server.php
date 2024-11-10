<?php

$port = getenv("PORT") ?: 9501;  

$server = new OpenSwoole\HTTP\Server("0.0.0.0", $port);

// Set server options for better logging and graceful shutdown
$server->set([
    'log_level' => SWOOLE_LOG_ERROR,
    'max_wait_time' => 10,  // Allow 10 seconds for workers to finish tasks on shutdown
]);

$server->on("request", function ($request, $response) {
    $response->end("Hello from OpenSwoole on Render!");
});

// Handle shutdown signals
$server->on('WorkerStop', function ($server, $workerId) {
    echo "Worker #{$workerId} is stopping...\n";
});

$server->on('Shutdown', function () {
    echo "Server is shutting down gracefully.\n";
});

$server->start();
