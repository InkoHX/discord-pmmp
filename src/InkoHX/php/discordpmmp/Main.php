<?php
/**
 * Created by PhpStorm.
 * User: InkoHX
 * Date: 2018/09/12
 * Time: 11:23
 */

namespace InkoHX\php\discordpmmp;


use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    /* @var Main */
    public static $instance;

    public function onLoad()
    {
        self::$instance = $this;
        $this->saveDefaultConfig();
    }

    public function onEnable()
    {
        Discord::SendOnlineEmbed();
    }

    public function onDisable()
    {
        Discord::SendOfflineEmbed();
    }
}