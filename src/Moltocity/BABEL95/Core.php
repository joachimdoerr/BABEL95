<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 25.10.15
 * Time: 18:39
 */

namespace Moltocity\BABEL95;


class Core {

    const APP_KEY="d481e13343c7bb89d0d1";
    const APP_SECRET="0709650bffaa8bfb18fc";
    const APP_ID="150285";

    private $username='anonym';
    private $message='';

    public function receiveMessage($message){

        //TODO Hack here! For now we simply echo around
        $sender=new MessageSender(self::APP_KEY, self::APP_SECRET, self::APP_ID);
        $sender->sendMessage($message);
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