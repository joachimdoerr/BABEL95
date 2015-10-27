<?php
/**
 * Author: Christophe Nick
 * Date: 26.10.2015
 * Time: 21:34
 * (auto-genrated by PhpStorm)
 */

namespace Moltocity\BABEL95;


class MessageSender
{
    //$_POST['chat_info'];

    private $appKey;
    private $appSecret;
    private $appID;

    /**
     * MessageSender constructor.
     * @param $appKey
     * @param $appSecret
     * @param $appID
     */
    public function __construct($appKey, $appSecret, $appID)
    {
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
        $this->appID = $appID;
    }

    /*
     * chatInfo Example
    {
        "event" : "chat_message",
        "data" : {
            "id" : "562e8a542e1fe",
            "body" : "Hello",
            "published" : "Mon, 26 Oct 2015 20:17:24 +0000",
            "type" : "chat-message",
            "actor" : {
                "displayName" : "Gingonic",
                "objectType" : "person",
                "image" : {
                    "url" : "http://www.gravatar.com/avatar/0f98aeca560b41ed900078df8c1bb87b?s=80&d=mm&r=g",
                    "width" : 48,
                    "height" : 48
                }
            }
        },
        "channel" : "http-olympia-project-chat-client-"
    }
    */

    /**
     *
     * @param $message
     * @param $channel
     * @return bool|string
     * @author Christophe Nick
     */
    public function sendMessage($message, $channel="babel95"){
        date_default_timezone_set('UTC');

        $pusher = new \Pusher($this->appKey, $this->appSecret, $this->appID);
        $response = $pusher->trigger($channel, 'chat_message', $message['data'], null, true);
        return $response;
    }

    function sanitise_input($chat_info) {
        $email = isset($chat_info['email'])?$chat_info['email']:'';

        $options = array();
        $options['displayName'] = substr(htmlspecialchars($chat_info['nickname']), 0, 30);
        $options['text'] = substr(htmlspecialchars($chat_info['text']), 0, 300);
        $options['email'] = substr(htmlspecialchars($email), 0, 100);
        $options['get_gravatar'] = true;
        return $options;
    }

}