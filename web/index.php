<?php

require __DIR__."/../vendor/autoload.php";

$core=new \Moltocity\BABEL95\Core();

try{
    $username=isset($_GET['username'])?$_GET['username']:'anonym';
    $message=isset($_GET['message'])?$_GET['message']:'';
    sendResponse(
        200,
        $core->receiveMessage($username, $message),
        array()
    );
}catch(\Moltocity\BABEL95\BabelException $e){
    sendResponse(
        $e->getCode(),
        $e,
        array()
    );
}

function sendResponse($code, $message, $header){
    $header=array_merge($header, array('Content-Type'=>'application/json'));
    foreach($header as $key => $value){
        header("$key: $value");
    }
    http_response_code($code);
    echo json_encode($message);
}


