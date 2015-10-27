<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 25.10.15
 * Time: 18:41
 */

namespace Moltocity\BABEL95\Modules;


class AvatarService
{
    public $userName;
    public $imageUrl;

    /**
     * AvatarService constructor.
     * @param $userName
     */
    public function __construct($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }
}