<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 25.10.15
 * Time: 18:39
 */

namespace Moltocity\BABEL95;


class Core {


    private $username='anonym';
    private $message='';

    public function receiveMessage($username, $message){
        if(isset($username))
            $this->setUsername($username);
        if(isset($message))
            $this->setMessage($message);

        //TODO Hack here! For now we simply echo around
        return $message;
    }

    /**
     * @param mixed $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $username
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }



} 