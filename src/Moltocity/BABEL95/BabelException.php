<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 25.10.15
 * Time: 18:48
 */

namespace Moltocity\BABEL95;


use Exception;

class BabelException extends \Exception {

    private $errorCode;

    public function __construct($errorCode, $message = "", $code = 0, Exception $previous = null)
    {
        $this->errorCode=$errorCode;
        parent::__construct($message, $code, $previous); // TODO: Change the autogenerated stub
    }

    public function getErrorArray(){
        return array('error_code'=>$this->errorCode, 'message'=>$this->getMessage());
    }


}