<?php

/* Create new queue object */
$queue = new ZMQSocket(
    new ZMQContext(), 
    ZMQ::SOCKET_REQ
);
$queue->connect("tcp://127.0.0.1:5555");
while (true) {
    $data = [
        'time' => time(),
    ];
    
    echo "Sending data:";
    print_r($data);
    
    
    $dataUnpacked = msgpack_pack($data);
    
    $start = microtime(true);
    
    $queue->send($dataUnpacked);
    $msgReceived =  $queue->recv();
    
    $end = microtime(true);
    
    echo $msgReceived;
    
    echo PHP_EOL;
    
    echo "time: " . ($end - $start);
    
    echo PHP_EOL;
    
    
    sleep(1);
}
