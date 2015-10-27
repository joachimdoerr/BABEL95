<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 25.10.15
 * Time: 18:40
 */

namespace Moltocity\BABEL95\Modules;


class LanguageTranslater
{
    private $message;
    private $translated_message;
    private $translator_url;

    /**
     * LanguageTranslater constructor.
     * @param $translator_url
     * @param $message
     */
    public function __construct($translator_url, $message)
    {
        $this->translator_url = $translator_url;
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getTranslatedMessage()
    {
        return $this->translated_message;
    }
}