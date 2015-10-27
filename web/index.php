<?php

require __DIR__."/../vendor/autoload.php";

$core=new \Moltocity\BABEL95\Core();


try{
    //TODO no validation here...
    $message=json_decode(file_get_contents("php://input"), true);
    sendResponse(
        200,
        $core->receiveMessage($message),
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
    $header=array_merge($header, array('Content-Type'=>'application/json', 'status' => $code));
    foreach($header as $key => $value){
        header("$key: $value");
    }
    echo json_encode($message);
}


