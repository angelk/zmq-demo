<?php

/*
  The server waits for messages from the client
  and echoes back the received message
 */
$server = new ZMQSocket(
    new ZMQContext(), 
    ZMQ::SOCKET_REP
);
$server->bind("tcp://*:5555");
/* Loop receiving and echoing back */
while (1) {
    $message = $server->recv();
    echo "Got message\n";
    
    $dataUnpacked = msgpack_unpack($message);
    /* echo back the message */
    $server->send(json_encode($dataUnpacked));
}
